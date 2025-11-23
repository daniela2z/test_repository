<?php

/**
 * gemini-api.php
 * Proxy מאובטח ל-Gemini.
 * שומר את ה-API Key בצד השרת בלבד, מאמת טוקן, ומחזיר JSON נקי עם תמונה ב-Base64.
 * Updated: 2025-11-23 20:15
 */

ini_set('display_errors', '0');
error_reporting(E_ALL);

/* ---------- CORS ---------- */
$allowed_origins = [
    'http://localhost:5173',
    'http://127.0.0.1:5173',
    'https://react.a-2-z.co.il',
];

$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if (in_array($origin, $allowed_origins, true)) {
    header("Access-Control-Allow-Origin: $origin");
    header('Vary: Origin');
}

header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, X-APP-TOKEN');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    echo json_encode(['ok' => true]);
    exit;
}

// חובה POST בלבד
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Only POST allowed']);
    exit;
}

/* ---------- אימות טוקן מקומי ---------- */
const LOCAL_APP_TOKEN = 'my-local-token'; // אותו טוקן כמו ב-App.tsx
$clientToken = $_SERVER['HTTP_X_APP_TOKEN'] ?? '';

if ($clientToken !== LOCAL_APP_TOKEN) {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'Invalid app token']);
    exit;
}

/* ---------- קריאת גוף הבקשה ---------- */
$rawBody = file_get_contents('php://input');
file_put_contents('debug_log.txt', "Raw Body: " . $rawBody . "\n", FILE_APPEND);

if ($rawBody === false || $rawBody === '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Empty request body']);
    exit;
}

$input = json_decode($rawBody, true);
file_put_contents('debug_log.txt', "Parsed Input: " . print_r($input, true) . "\n", FILE_APPEND);

if (!is_array($input)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Invalid JSON']);
    exit;
}

$prompt = trim((string)($input['prompt'] ?? ''));
$images = $input['images'] ?? []; // Expecting an array of images
$singleImage = $input['image'] ?? null; // Backward compatibility

// Normalize to array
if ($singleImage) {
    $images = [$singleImage];
}

if ($prompt === '' && empty($images)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Missing prompt or images']);
    exit;
}

/* ---------- הגדרות Gemini ---------- */
$GEMINI_API_KEY  = 'AIzaSyC6hHcFlwnI9hajLuh_rDf16hfFbidxWF0'; // API Key verified from .env.local
$GEMINI_ENDPOINT = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-3-pro-image-preview:generateContent';

if ($GEMINI_API_KEY === '' || $GEMINI_API_KEY === 'PASTE_YOUR_REAL_API_KEY_HERE') {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Server is not configured with a valid API key']);
    exit;
}

/* ---------- בניית ה-payload ---------- */
$parts = [];

// Add images first
foreach ($images as $img) {
    if (isset($img['base64'])) {
        $parts[] = [
            'inline_data' => [
                'mime_type' => $img['mimeType'] ?? 'image/jpeg',
                'data'      => $img['base64'],
            ],
        ];
    }
}

// Add prompt last
if ($prompt !== '') {
    $parts[] = ['text' => $prompt];
}

$payload = [
    'contents' => [
        [
            'parts' => $parts,
        ],
    ],
];

$jsonPayload = json_encode($payload);
if ($jsonPayload === false) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Failed to encode payload']);
    exit;
}

/* ---------- שליחת הבקשה ל-Gemini ---------- */
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL            => $GEMINI_ENDPOINT . '?key=' . urlencode($GEMINI_API_KEY),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_HTTPHEADER     => [
        'Content-Type: application/json',
    ],
    CURLOPT_POSTFIELDS     => $jsonPayload,
    CURLOPT_TIMEOUT        => 60,
]);

$result   = curl_exec($ch);
$curlErr  = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($curlErr) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Curl error: ' . $curlErr]);
    exit;
}

if ($result === false || $result === '') {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Empty response from Gemini']);
    exit;
}

error_log('Gemini raw response: ' . substr($result, 0, 2000));

$responseData = json_decode($result, true);
if (!is_array($responseData)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Invalid JSON from Gemini']);
    exit;
}

if (isset($responseData['error'])) {
    http_response_code($httpCode >= 400 ? $httpCode : 500);
    echo json_encode([
        'success' => false,
        'error'   => $responseData['error']['message'] ?? 'Gemini API error',
    ]);
    exit;
}

/* ---------- שליפת התמונה מהתשובה ---------- */
$imageBase64   = null;
$outputMime    = 'image/png';
$finishReason  = null;
$textFromModel = '';

if (!empty($responseData['candidates']) && is_array($responseData['candidates'])) {
    $firstCandidate = $responseData['candidates'][0];
    $finishReason   = $firstCandidate['finishReason'] ?? null;

    $partsFromResponse = [];

    if (isset($firstCandidate['content']['parts']) && is_array($firstCandidate['content']['parts'])) {
        $partsFromResponse = $firstCandidate['content']['parts'];
    } elseif (isset($firstCandidate['content'][0]['parts']) && is_array($firstCandidate['content'][0]['parts'])) {
        $partsFromResponse = $firstCandidate['content'][0]['parts'];
    } elseif (isset($firstCandidate['parts']) && is_array($firstCandidate['parts'])) {
        $partsFromResponse = $firstCandidate['parts'];
    }

    foreach ($partsFromResponse as $part) {
        // snake_case
        if (isset($part['inline_data']['data'])) {
            $imageBase64 = $part['inline_data']['data'];
            if (!empty($part['inline_data']['mime_type'])) {
                $outputMime = $part['inline_data']['mime_type'];
            }
            break;
        }
        // camelCase
        if (isset($part['inlineData']['data'])) {
            $imageBase64 = $part['inlineData']['data'];
            if (!empty($part['inlineData']['mimeType'])) {
                $outputMime = $part['inlineData']['mimeType'];
            }
            break;
        }
        if (isset($part['text']) && $textFromModel === '') {
            $textFromModel = $part['text'];
        }
    }
}

/* ---------- תשובה לקליינט ---------- */
if ($imageBase64) {
    echo json_encode([
        'success'     => true,
        'imageBase64' => $imageBase64,
        'mimeType'    => $outputMime,
    ]);
    exit;
}

$message = $textFromModel !== '' ? $textFromModel : 'No image data returned from Gemini.';

echo json_encode([
    'success'      => false,
    'finishReason' => $finishReason,
    'error'        => $message,
]);
exit;
