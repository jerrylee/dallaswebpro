<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="sr-only" href="#main-content"><?php esc_html_e( 'Skip to content', 'dallaswebpro' ); ?></a>

<header class="site-header" id="site-header" role="banner">

  <!-- Logo -->
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="<?php bloginfo( 'name' ); ?> — Home">
    <img
      class="site-logo-img"
      src="<?php echo esc_url( get_template_directory_uri() . '/images/dallas-web-pro-logo-web-clear.png' ); ?>"
      alt="<?php bloginfo( 'name' ); ?>"
      width="180"
      height="67"
    >
  </a>

  <!-- Primary Navigation -->
  <nav role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'dallaswebpro' ); ?>">
    <?php
    wp_nav_menu( [
      'theme_location' => 'primary',
      'menu_id'        => 'primary-nav',
      'container'      => false,
      'menu_class'     => 'primary-nav',
      'fallback_cb'    => 'dwp_fallback_nav',
    ] );
    ?>
  </nav>

  <!-- Mobile toggle (visible via CSS at <768px) -->
  <button
    id="nav-toggle"
    class="nav-toggle"
    aria-controls="primary-nav"
    aria-expanded="false"
    aria-label="<?php esc_attr_e( 'Toggle navigation', 'dallaswebpro' ); ?>"
  >
    <svg width="22" height="16" viewBox="0 0 22 16" fill="none" aria-hidden="true">
      <path d="M1 1h20M1 8h20M1 15h20" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
    </svg>
  </button>

</header><!-- /.site-header -->

<main id="main-content" role="main">
<?php
/**
 * Fallback navigation — shown when no menu is assigned.
 * Renders a minimal set of links so the nav isn't empty on a fresh install.
 */
function dwp_fallback_nav() {
	?>
	<ul class="primary-nav" id="primary-nav">
		<li class="nav-has-drop">
			<a href="/services">Services</a>
			<div class="nav-drop">
				<a href="/services/web-development">Web Development</a>
				<a href="/services/seo">Search Engine Optimization</a>
				<a href="/services/branding">Branding &amp; Identity</a>
				<a href="/services/social-media">Social Media &amp; Content</a>
				<a href="/services/analytics">Analytics &amp; Reporting</a>
				<a href="/services/consultation">Strategy &amp; Consultation</a>
			</div>
		</li>
		<li><a href="/work">Work</a></li>
		<li><a href="/about">About</a></li>
		<li><a href="/blog">Blog</a></li>
		<li class="nav-cta"><a href="#contact">Start a Project</a></li>
	</ul>
	<?php
}
