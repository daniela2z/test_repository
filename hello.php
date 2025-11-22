<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Input Example</title>
</head>
<body>
    <h1><?php echo "Hello World"; ?></h1>

    <form method="post">
        <input type="text" name="myInput" placeholder="Type something...">
        <button type="submit">Submit</button>
    </form>
    <?php
    echo $_POST["myInput"];
echo "hello";
    ?>
</body>
</html>
