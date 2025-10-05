<?php
/**
 * The main template file for the Shalom Darom theme.
 */

get_header();
?>
<main id="primary">
  <section class="hero" aria-labelledby="hero-title">
    <div class="hero__content">
      <h1 id="hero-title" class="hero__heading"><?php bloginfo( 'name' ); ?></h1>
      <p class="hero__tagline"><?php bloginfo( 'description' ); ?></p>
      <a class="button-primary" href="#brand-values"><?php esc_html_e( 'הכירו את סיפור הסבון שלנו', 'shalom-darom' ); ?></a>
    </div>
  </section>

  <div class="sections-wrapper">
    <section id="brand-values" class="section" aria-labelledby="brand-values-title">
      <h2 id="brand-values-title" class="section__title"><?php esc_html_e( 'ערכי המותג', 'shalom-darom' ); ?></h2>
      <div class="features-grid">
        <article class="feature-card">
          <h3 class="feature-card__title"><?php esc_html_e( 'מגע מן הדרום', 'shalom-darom' ); ?></h3>
          <p><?php esc_html_e( 'אנו שואבים השראה מן הנופים הדרומיים ליצירת מרקמים וניחוחות מרגיעים.', 'shalom-darom' ); ?></p>
        </article>
        <article class="feature-card">
          <h3 class="feature-card__title"><?php esc_html_e( 'מרכיבים טבעיים', 'shalom-darom' ); ?></h3>
          <p><?php esc_html_e( 'כל סבון מיוצר מרכיבים טבעיים בלבד, ללא כימיקלים מיותרים וללא ניסויים בבעלי חיים.', 'shalom-darom' ); ?></p>
        </article>
        <article class="feature-card">
          <h3 class="feature-card__title"><?php esc_html_e( 'אומנות מקומית', 'shalom-darom' ); ?></h3>
          <p><?php esc_html_e( 'אנו תומכים באומנים מקומיים ומשלבים מלאכות יד בעיצוב כל מוצר.', 'shalom-darom' ); ?></p>
        </article>
      </div>
    </section>

    <section class="section" aria-labelledby="latest-posts-title">
      <h2 id="latest-posts-title" class="section__title"><?php esc_html_e( 'מה חדש אצלנו בבלוג', 'shalom-darom' ); ?></h2>
      <?php if ( have_posts() ) : ?>
        <div class="content-grid">
          <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'content-card' ); ?>>
              <h3 class="content-card__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
              <div class="content-card__excerpt">
                <?php the_excerpt(); ?>
              </div>
            </article>
          <?php endwhile; ?>
        </div>
        <?php the_posts_navigation(); ?>
      <?php else : ?>
        <p class="content-empty"><?php esc_html_e( 'עדיין לא פורסמו מאמרים, חזרו לבקר בקרוב.', 'shalom-darom' ); ?></p>
      <?php endif; ?>
    </section>

    <section class="section" aria-labelledby="testimonial-title">
      <h2 id="testimonial-title" class="section__title"><?php esc_html_e( 'לקוחות מספרים', 'shalom-darom' ); ?></h2>
      <p class="testimonial">&ldquo;<?php esc_html_e( 'הסבונים של שלום דרום הפכו את שגרת הבוקר שלי לרגע של שקט ועושר.', 'shalom-darom' ); ?>&rdquo;</p>
      <p><?php esc_html_e( 'נעמה אלמוג, יזמת רווחה', 'shalom-darom' ); ?></p>
    </section>

    <section class="section" aria-labelledby="contact-title">
      <h2 id="contact-title" class="section__title"><?php esc_html_e( 'דברו איתנו', 'shalom-darom' ); ?></h2>
      <p><?php esc_html_e( 'נשמח ליצור עמכם קשר לסדנאות, חנויות קונספט ושיתופי פעולה.', 'shalom-darom' ); ?></p>
      <p><a href="mailto:hello@shalomdarom.co" class="button-primary"><?php esc_html_e( 'hello@shalomdarom.co', 'shalom-darom' ); ?></a></p>
    </section>
  </div>
</main>
<?php get_footer(); ?>
