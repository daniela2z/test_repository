<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>טליה סבון טבעי | דף תדמית</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@300;400;600;700&display=swap');

        :root {
            --primary: #8bc6bd;
            --primary-dark: #5d9b91;
            --accent: #f4d3b2;
            --text-dark: #2f3b3a;
            --text-light: #f9f9f9;
            --bg: #f7faf9;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Assistant', Arial, sans-serif;
            background: var(--bg);
            color: var(--text-dark);
            line-height: 1.6;
        }

        header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: var(--text-light);
            padding: 3.5rem 1.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        header::after {
            content: "";
            position: absolute;
            bottom: -60px;
            left: 50%;
            transform: translateX(-50%);
            width: 120%;
            height: 120px;
            background: var(--bg);
            border-radius: 50% 50% 0 0;
        }

        .hero-content {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            font-weight: 300;
        }

        .hero-cta {
            display: inline-block;
            padding: 0.9rem 2.5rem;
            background: var(--accent);
            color: var(--text-dark);
            border-radius: 999px;
            font-weight: 600;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hero-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        main {
            max-width: 1100px;
            margin: 0 auto;
            padding: 3rem 1.5rem 4rem;
        }

        section {
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.2rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .about {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            align-items: center;
        }

        .about-text p {
            margin-bottom: 1rem;
        }

        .about-card {
            background: white;
            padding: 2rem;
            border-radius: 18px;
            box-shadow: 0 18px 45px rgba(93, 155, 145, 0.15);
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 1.5rem;
        }

        .product-card {
            background: white;
            border-radius: 16px;
            padding: 1.8rem;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.12);
        }

        .product-card h3 {
            margin-top: 0;
            margin-bottom: 0.75rem;
        }

        .product-card p {
            margin-bottom: 0.5rem;
        }

        .product-price {
            color: var(--primary-dark);
            font-weight: 600;
        }

        .values-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
        }

        .value-item {
            background: rgba(139, 198, 189, 0.12);
            border-radius: 16px;
            padding: 1.5rem;
        }

        .value-item h3 {
            margin-top: 0;
            margin-bottom: 0.75rem;
        }

        .testimonials {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .testimonial-card {
            background: white;
            padding: 1.8rem;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            font-style: italic;
        }

        .testimonial-card span {
            display: block;
            margin-top: 1rem;
            font-weight: 600;
            font-style: normal;
            color: var(--primary-dark);
        }

        .contact {
            background: var(--primary-dark);
            color: var(--text-light);
            border-radius: 20px;
            padding: 2.5rem;
            text-align: center;
        }

        .contact a {
            color: var(--text-light);
            font-weight: 600;
            text-decoration: underline;
        }

        footer {
            background: #213432;
            color: var(--text-light);
            text-align: center;
            padding: 1.5rem;
        }

        @media (max-width: 600px) {
            .hero-title {
                font-size: 2.2rem;
            }

            header {
                padding: 2.5rem 1.2rem 4rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="hero-content">
            <h1 class="hero-title">טליה סבון טבעי</h1>
            <p class="hero-subtitle">סדנה משפחתית המייצרת סבונים טבעיים בעבודת יד, עם ניחוחות נעימים ומרקם מפנק לכל העור.</p>
            <a href="#contact" class="hero-cta">ליצירת קשר</a>
        </div>
    </header>

    <main>
        <section class="about">
            <div class="about-card about-text">
                <h2 class="section-title">מי אנחנו</h2>
                <p>טליה סבון טבעי נולדה מתוך אהבה לטבע ולבריאות העור. אנו מאמינים שהמגע הראשון של היום מתחיל במקלחת, ולכן חשוב לנו להעניק חוויה נקייה, מרגיעה ומלאת חיוניות.</p>
                <p>הסבונים שלנו מיוצרים בתהליך קר עתיק, המבוסס על שמנים צמחיים איכותיים, תמציות צמחי מרפא ושמנים אתריים טהורים. כל סדרה מיוצרת בכמויות קטנות כדי לשמור על טריות ורמת איכות גבוהה במיוחד.</p>
            </div>
            <div class="about-card">
                <h3>הבטחה שלנו</h3>
                <ul>
                    <li>100% רכיבים טבעיים ומקור בר-קיימא</li>
                    <li>ללא SLS, פראבנים או צבעים מלאכותיים</li>
                    <li>מותאם לכל סוגי העור, כולל עור רגיש</li>
                    <li>אריזות ידידותיות לסביבה וניתנות למיחזור</li>
                </ul>
            </div>
        </section>

        <section>
            <h2 class="section-title">מבחר הסבונים שלנו</h2>
            <div class="products">
                <article class="product-card">
                    <h3>לבנדר שלווה</h3>
                    <p>תערובת מרגיעה של שמן זית, חמאת שיאה ושמן אתרי לבנדר להרגעה עמוקה של העור והנפש.</p>
                    <p class="product-price">₪38</p>
                </article>
                <article class="product-card">
                    <h3>הדרים מתעוררים</h3>
                    <p>סבון אנרגטי עם שמן קוקוס, קליפות תפוז וטיפת שמן אתרי אשכולית לרענון מיידי.</p>
                    <p class="product-price">₪35</p>
                </article>
                <article class="product-card">
                    <h3>תמצית היער</h3>
                    <p>שילוב של שמן קנולה אורגני, אקליפטוס וארז עם גרגירי פרג לפילינג עדין.</p>
                    <p class="product-price">₪42</p>
                </article>
                <article class="product-card">
                    <h3>חליטת קמומיל</h3>
                    <p>עושר של שמן שקדים מתוק, חליטת קמומיל ושיבולת שועל טחונה להרגעת עור עדין.</p>
                    <p class="product-price">₪40</p>
                </article>
            </div>
        </section>

        <section>
            <h2 class="section-title">ערכי המותג</h2>
            <div class="values-list">
                <div class="value-item">
                    <h3>טבעיות ללא פשרות</h3>
                    <p>כל מוצר נבדק בקפידה ומיוצר מחומרי גלם טריים ואיכותיים, ללא תוספות מלאכותיות.</p>
                </div>
                <div class="value-item">
                    <h3>קהילה מקומית</h3>
                    <p>אנו עובדים בשיתוף פעולה עם חקלאים ויצרנים מקומיים כדי לתמוך בכלכלה האזורית.</p>
                </div>
                <div class="value-item">
                    <h3>שקיפות מלאה</h3>
                    <p>מפרסמים את כל מרכיבי המוצרים ומזמינים אתכם לבקר בסדנה ולהכיר את תהליך הייצור.</p>
                </div>
            </div>
        </section>

        <section>
            <h2 class="section-title">לקוחות מספרים</h2>
            <div class="testimonials">
                <blockquote class="testimonial-card">
                    “מאז שהתחלתי להשתמש בסבונים של טליה העור שלי רגוע ובריא יותר. הריחות מדהימים!”
                    <span>נועה, תל אביב</span>
                </blockquote>
                <blockquote class="testimonial-card">
                    “מתנה מושלמת לכל אירוע. אריזה יפה, מוצר איכותי ותחושה מפנקת במיוחד.”
                    <span>יואב, חיפה</span>
                </blockquote>
                <blockquote class="testimonial-card">
                    “סוף סוף מצאתי סבון שמתאים לעור הרגיש שלי. שירות אישי וחם כל פעם מחדש.”
                    <span>מיכל, ירושלים</span>
                </blockquote>
            </div>
        </section>

        <section id="contact" class="contact">
            <h2>בואו נכיר</h2>
            <p>נשמח לשתף פעולה עם חנויות בוטיק, מלונות וספא. צרו קשר לקבלת קטלוג, מחירי סיטונאות ומארזי מתנה מותאמים אישית.</p>
            <p>טלפון: <a href="tel:+972526789123">052-678-9123</a> | דוא"ל: <a href="mailto:hello@taliasoap.co.il">hello@taliasoap.co.il</a></p>
            <p>בקרו אותנו בסדנה: דרך הגפן 12, פרדס חנה-כרכור</p>
        </section>
    </main>

    <footer>
        <p>© 2024 טליה סבון טבעי. כל הזכויות שמורות.</p>
    </footer>
</body>
</html>
