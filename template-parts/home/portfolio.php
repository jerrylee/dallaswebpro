<?php
/**
 * Homepage — Portfolio Section
 *
 * Queries the dwp_project CPT where proj_featured_home = 1.
 * Falls back to the 6 most recent projects if none are featured.
 * Each project card renders a browser chrome strip using ACF fields:
 *   proj_url_label, proj_screenshot, proj_client, taxonomy dwp_service_type
 */

$delays = [ '', 'rev-d1', 'rev-d2', '', 'rev-d1', 'rev-d2' ];

// Primary query — featured on homepage
$projects = new WP_Query( [
	'post_type'      => 'dwp_project',
	'posts_per_page' => 6,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
	'meta_query'     => [
		[
			'key'     => 'proj_featured_home',
			'value'   => '1',
			'compare' => '=',
		],
	],
] );

// Fallback — most recent projects
if ( ! $projects->have_posts() ) {
	$projects = new WP_Query( [
		'post_type'      => 'dwp_project',
		'posts_per_page' => 6,
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
	] );
}

$has_projects = $projects->have_posts();
?>

<section class="portfolio-section" id="work">
  <div class="wrap">

    <header class="portfolio-header">
      <div>
        <span class="eyebrow">Our Work</span>
        <h2 class="sec-heading">Work that<br><em>speaks for itself.</em></h2>
      </div>
      <a href="<?php echo esc_url( home_url( '/work' ) ); ?>" class="btn-primary">
        <?php esc_html_e( 'View All Projects', 'dallaswebpro' ); ?>
      </a>
    </header>

    <div class="portfolio-grid">

      <?php if ( $has_projects ) :
        $i = 0;
        while ( $projects->have_posts() ) :
          $projects->the_post();
          $screenshot = get_field( 'proj_screenshot' );
          $url_label  = get_field( 'proj_url_label' ) ?: get_the_title();
          $live_url   = get_field( 'proj_url' );
          $result     = get_field( 'proj_result' );
          $terms      = get_the_terms( get_the_ID(), 'dwp_service_type' );
          $term_label = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : '';
          $img_src    = $screenshot['sizes']['dwp-portfolio'] ?? ( $screenshot['url'] ?? '' );
          $img_alt    = $screenshot['alt'] ?? get_the_title();
          $card_url   = get_permalink();
      ?>
      <article class="port-item reveal <?php echo esc_attr( $delays[ $i ] ?? '' ); ?>">
        <a href="<?php echo esc_url( $card_url ); ?>"
           aria-label="<?php echo esc_attr( get_the_title() ); ?>">

          <!-- Browser chrome -->
          <div class="port-chrome" aria-hidden="true">
            <div class="b-dots">
              <div class="b-dot b-dot-r"></div>
              <div class="b-dot b-dot-y"></div>
              <div class="b-dot b-dot-g"></div>
            </div>
            <div class="port-url"><?php echo esc_html( $url_label ); ?></div>
          </div>

          <!-- Screenshot -->
          <div class="port-img-wrap">
            <?php if ( $img_src ) : ?>
              <img
                class="port-img"
                src="<?php echo esc_url( $img_src ); ?>"
                alt="<?php echo esc_attr( $img_alt ); ?>"
                loading="lazy"
              >
            <?php else : ?>
              <div class="port-img" style="background: linear-gradient(135deg, var(--dw-cream), var(--dw-bg)); display:flex; align-items:center; justify-content:center;">
                <span style="font-size:11px; color: var(--dw-warm-gray); text-transform: uppercase; letter-spacing: 0.15em;">Screenshot Pending</span>
              </div>
            <?php endif; ?>
          </div>

          <!-- Meta -->
          <div class="port-meta">
            <?php if ( $term_label ) : ?>
              <div class="port-label"><?php echo esc_html( $term_label ); ?></div>
            <?php endif; ?>
            <h4><?php the_title(); ?></h4>
            <?php if ( $result ) : ?>
              <p class="port-result"><?php echo esc_html( $result ); ?></p>
            <?php endif; ?>
          </div>

        </a>
      </article>
      <?php
          $i++;
        endwhile;
        wp_reset_postdata();

      else : ?>
        <!-- Placeholder cards — remove once real projects are added -->
        <?php
        $placeholders = [
          [ 'type' => 'Home Services',         'url' => 'client-placeholder.com' ],
          [ 'type' => 'Med Spa',               'url' => 'client-placeholder.com' ],
          [ 'type' => 'Restaurant',            'url' => 'client-placeholder.com' ],
          [ 'type' => 'Professional Services', 'url' => 'client-placeholder.com' ],
          [ 'type' => 'E-Commerce',            'url' => 'client-placeholder.com' ],
          [ 'type' => 'Contractor',            'url' => 'client-placeholder.com' ],
        ];
        foreach ( $placeholders as $j => $ph ) : ?>
        <div class="port-item reveal <?php echo esc_attr( $delays[ $j ] ?? '' ); ?>">
          <div class="port-chrome" aria-hidden="true">
            <div class="b-dots">
              <div class="b-dot b-dot-r"></div>
              <div class="b-dot b-dot-y"></div>
              <div class="b-dot b-dot-g"></div>
            </div>
            <div class="port-url"><?php echo esc_html( $ph['url'] ); ?></div>
          </div>
          <div class="port-img-wrap">
            <div class="port-img" style="background: linear-gradient(135deg, var(--dw-cream), var(--dw-bg)); height: 218px; display:flex; align-items:center; justify-content:center;">
              <span style="font-size:11px; color: var(--dw-warm-gray); text-transform: uppercase; letter-spacing: 0.15em;">Screenshot Placeholder</span>
            </div>
          </div>
          <div class="port-meta">
            <div class="port-label"><?php echo esc_html( $ph['type'] ); ?></div>
            <h4><?php esc_html_e( 'Client Website — Placeholder', 'dallaswebpro' ); ?></h4>
          </div>
        </div>
        <?php endforeach;
      endif; ?>

    </div><!-- /.portfolio-grid -->

  </div><!-- /.wrap -->
</section>
