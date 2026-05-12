<?php
/**
 * Archive — Portfolio (dwp_project)
 *
 * URL: /work/
 * Lists all portfolio projects in a grid with browser-chrome cards.
 * Filter bar lets visitors filter by dwp_service_type taxonomy.
 */

get_header();

$terms = get_terms( [ 'taxonomy' => 'dwp_industry', 'hide_empty' => true, 'orderby' => 'name' ] );
$delays  = [ '', 'rev-d1', 'rev-d2', '', 'rev-d1', 'rev-d2' ];
?>

<!-- ─── PAGE HERO ─────────────────────────────── -->
<div class="port-archive-hero">
  <div class="wrap">
    <span class="eyebrow eyebrow-lt">Our Work</span>
    <h1 class="port-archive-h1">Work that<br><em>earns its keep.</em></h1>
    <p class="port-archive-sub">Every project below is a custom-built landing page designed to convert. No templates, no shortcuts — built from scratch for a specific market.</p>
  </div>
</div>

<!-- ─── FILTER BAR ───────────────────────────── -->
<?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
<div class="port-filter-wrap">
  <div class="wrap">
    <div class="port-filter-bar" role="tablist" aria-label="Filter projects by industry">
      <button class="port-filter-pill is-active" data-filter="all" role="tab" aria-selected="true">All Projects</button>
      <?php foreach ( $terms as $term ) : ?>
        <button class="port-filter-pill"
                data-filter="<?php echo esc_attr( $term->slug ); ?>"
                role="tab" aria-selected="false">
          <?php echo esc_html( $term->name ); ?>
        </button>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>

<!-- ─── PORTFOLIO GRID ───────────────────────── -->
<div class="port-archive-section">
  <div class="wrap">
    <div class="portfolio-archive-grid" id="portfolio-grid">

      <?php
      $projects = new WP_Query( [
        'post_type'      => 'dwp_project',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order date',
        'order'          => 'ASC',
      ] );

      $i = 0;
      if ( $projects->have_posts() ) :
        while ( $projects->have_posts() ) :
          $projects->the_post();
          $screenshot = get_field( 'proj_screenshot' );
          $url_label  = get_field( 'proj_url_label' ) ?: get_the_title();
          $result     = get_field( 'proj_result' );
          $industry   = get_field( 'proj_industry' );
          $img_src    = $screenshot['sizes']['dwp-portfolio'] ?? ( $screenshot['url'] ?? '' );
          $img_alt    = $screenshot['alt'] ?? get_the_title();
          $post_terms = get_the_terms( get_the_ID(), 'dwp_service_type' );
          $term_slugs = ( $post_terms && ! is_wp_error( $post_terms ) )
            ? implode( ' ', wp_list_pluck( $post_terms, 'slug' ) )
            : '';
          $post_terms  = get_the_terms( get_the_ID(), 'dwp_industry' );
          $term_slugs  = ( $post_terms && ! is_wp_error( $post_terms ) )
              ? implode( ' ', wp_list_pluck( $post_terms, 'slug' ) )
              : '';

          $term_labels = [];
          if ( $post_terms && ! is_wp_error( $post_terms ) ) {
              foreach ( $post_terms as $t ) {
                  $term_labels[] = $t->name;
              }
          } elseif ( $industry ) {
              $term_labels[] = $industry;
          }
      ?>

      <article class="port-item reveal <?php echo esc_attr( $delays[ $i % 3 ] ?? '' ); ?>"
               data-category="<?php echo esc_attr( $term_slugs ); ?>">
        <a href="<?php the_permalink(); ?>" aria-label="View <?php the_title_attribute(); ?> project">

          <!-- Browser chrome -->
          <div class="port-chrome" aria-hidden="true">
            <div class="b-dots">
              <div class="b-dot b-dot-r"></div>
              <div class="b-dot b-dot-y"></div>
              <div class="b-dot b-dot-g"></div>
            </div>
            <div class="port-url"><?php echo esc_html( $url_label ); ?></div>
            <svg class="port-chrome-arrow" width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true">
              <path d="M3 8h10M8 3l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>

          <!-- Screenshot -->
          <div class="port-img-wrap">
            <?php if ( $img_src ) : ?>
              <img class="port-img" src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" loading="lazy">
            <?php else : ?>
              <div class="port-img port-img-placeholder">
                <span>Screenshot Coming Soon</span>
              </div>
            <?php endif; ?>
            <div class="port-img-overlay"></div>
          </div>

          <!-- Card meta -->
          <div class="port-meta">
            <?php if ( $term_labels ) : ?>
              <div class="port-labels">
                <?php foreach ( $term_labels as $label ) : ?>
                  <span class="port-label"><?php echo esc_html( $label ); ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <h2 class="port-title"><?php the_title(); ?></h2>
            <?php if ( $result ) : ?>
              <p class="port-result"><?php echo esc_html( $result ); ?></p>
            <?php endif; ?>
            <span class="port-view-link">View Project →</span>
          </div>

        </a>
      </article>


      <?php
          $i++;
        endwhile;
        wp_reset_postdata();
      else : ?>

      <div class="port-empty">
        <p>Projects coming soon. Check back shortly!</p>
      </div>

      <?php endif; ?>

    </div><!-- /.portfolio-archive-grid -->
  </div><!-- /.wrap -->
</div><!-- /.port-archive-section -->

<!-- ─── UNIVERSAL CTA BAND ───────────────────────────── -->
<div class="cta-band">

  <div class="cta-watermark" aria-hidden="true">Dallas</div>

  <div class="cta-band-inner">
    <h2 class="cta-h2">
      Like what you see?
      <em>Let's build yours.</em>
    </h2>
    <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn-cta-gold">Start a Project</a>
  </div>

</div>

<script>
/* Portfolio filter — vanilla JS, no deps */
(function() {
  const pills = document.querySelectorAll('.port-filter-pill');
  const cards = document.querySelectorAll('.port-item');
  pills.forEach(function(pill) {
    pill.addEventListener('click', function() {
      pills.forEach(function(p) { p.classList.remove('is-active'); p.setAttribute('aria-selected','false'); });
      pill.classList.add('is-active');
      pill.setAttribute('aria-selected','true');
      var filter = pill.dataset.filter;
      cards.forEach(function(card) {
        if (filter === 'all' || card.dataset.category.split(' ').indexOf(filter) > -1) {
          card.style.display = '';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
})();
</script>

<?php get_footer(); ?>
