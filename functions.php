<?php
/**
 * Dallas Web Pro — functions.php
 * Theme setup, asset enqueuing, ACF options, nav menus, helpers.
 */

defined( 'ABSPATH' ) || exit;

/* ═══════════════════════════════════════════════════
   1. THEME SETUP
═══════════════════════════════════════════════════ */
function dwp_theme_setup() {
	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Enable featured images on posts/pages
	add_theme_support( 'post-thumbnails' );

	// HTML5 markup
	add_theme_support( 'html5', [
		'search-form', 'comment-form', 'comment-list',
		'gallery', 'caption', 'style', 'script',
	] );

	// Wide/full alignment support (Gutenberg)
	add_theme_support( 'align-wide' );

	// Custom logo
	add_theme_support( 'custom-logo', [
		'height'      => 40,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	] );

	// Nav menus
	register_nav_menus( [
		'primary' => __( 'Primary Navigation', 'dallaswebpro' ),
		'footer'  => __( 'Footer Navigation', 'dallaswebpro' ),
	] );

	// Image sizes
	add_image_size( 'dwp-portfolio',    800, 480, true );
	add_image_size( 'dwp-portfolio-lg', 1200, 720, true );
	add_image_size( 'dwp-team',         600, 750, true );
	add_image_size( 'dwp-hero',         1920, 1080, true );
}
add_action( 'after_setup_theme', 'dwp_theme_setup' );


/* ═══════════════════════════════════════════════════
   2. ENQUEUE STYLES & SCRIPTS
═══════════════════════════════════════════════════ */
function dwp_enqueue_assets() {
	$ver = wp_get_theme()->get( 'Version' );
	$uri = get_template_directory_uri();

	// Google Fonts — Fraunces (variable) + Outfit
	wp_enqueue_style(
		'dwp-fonts',
		'https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;1,9..144,300;1,9..144,400&family=Outfit:wght@300;400;500;600&family=JetBrains+Mono:wght@400;500&display=swap',
		[],
		null
	);

	// Design tokens — must load first
	wp_enqueue_style( 'dwp-tokens',     $uri . '/assets/css/tokens.css',     [ 'dwp-fonts' ], $ver );

	// Global reset + base typography
	wp_enqueue_style( 'dwp-global',     $uri . '/assets/css/global.css',     [ 'dwp-tokens' ], $ver );

	// Buttons, cards, forms
	wp_enqueue_style( 'dwp-components', $uri . '/assets/css/components.css', [ 'dwp-global' ], $ver );

	// Layout: nav, hero, sections, footer
	wp_enqueue_style( 'dwp-layout',     $uri . '/assets/css/layout.css',     [ 'dwp-components' ], $ver );

	// Interior pages — enqueue on all non-front pages
	if ( ! is_front_page() ) {
		wp_enqueue_style( 'dwp-pages', $uri . '/assets/css/pages.css', [ 'dwp-layout' ], $ver );
	}

	// Main theme stylesheet (empty — header only)
	wp_enqueue_style( 'dwp-theme',      get_stylesheet_uri(),                [ 'dwp-layout' ], $ver );

	// Main JS — scroll reveal, nav scroll, hero entrance
	wp_enqueue_script(
		'dwp-main',
		$uri . '/assets/js/main.js',
		[],
		$ver,
		true  // load in footer
	);

	// Pass useful data to JS
	wp_localize_script( 'dwp-main', 'dwpData', [
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'dwp_nonce' ),
		'homeUrl' => home_url(),
	] );

	// Comments reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dwp_enqueue_assets' );


/* ═══════════════════════════════════════════════════
   3. ACF OPTIONS PAGES
═══════════════════════════════════════════════════ */
function dwp_register_acf_options() {
	if ( ! function_exists( 'acf_add_options_page' ) ) return;

	// Top-level options page
	acf_add_options_page( [
		'page_title' => 'Site Settings',
		'menu_title' => 'Site Settings',
		'menu_slug'  => 'dwp-settings',
		'capability' => 'edit_theme_options',
		'icon_url'   => 'dashicons-admin-settings',
		'redirect'   => false,
	] );

	// Sub-pages
	$sub_pages = [
		[ 'Homepage',    'dwp-homepage',    'dwp-settings' ],
		[ 'Trust Bar',   'dwp-trust-bar',   'dwp-settings' ],
		[ 'Services',    'dwp-services',    'dwp-settings' ],
		[ 'Portfolio',   'dwp-portfolio',   'dwp-settings' ],
		[ 'About',       'dwp-about',       'dwp-settings' ],
		[ 'Process',     'dwp-process',     'dwp-settings' ],
		[ 'Testimonials','dwp-testimonials', 'dwp-settings' ],
		[ 'Contact',     'dwp-contact',     'dwp-settings' ],
	];

	foreach ( $sub_pages as [ $title, $slug, $parent ] ) {
		acf_add_options_sub_page( [
			'page_title'  => $title,
			'menu_title'  => $title,
			'menu_slug'   => $slug,
			'parent_slug' => $parent,
			'capability'  => 'edit_theme_options',
		] );
	}
}
add_action( 'acf/init', 'dwp_register_acf_options' );


/* ═══════════════════════════════════════════════════
   4. CUSTOM POST TYPES
═══════════════════════════════════════════════════ */
function dwp_register_post_types() {

	// Portfolio / Work
	register_post_type( 'dwp_project', [
		'labels' => [
			'name'               => 'Projects',
			'singular_name'      => 'Project',
			'add_new_item'       => 'Add New Project',
			'edit_item'          => 'Edit Project',
			'view_item'          => 'View Project',
			'not_found'          => 'No projects found.',
			'not_found_in_trash' => 'No projects in trash.',
		],
		'public'              => true,
		'has_archive'         => true,
		'show_in_rest'        => true,
		'supports'            => [ 'title', 'thumbnail', 'excerpt', 'page-attributes' ],
		'menu_icon'           => 'dashicons-portfolio',
		'rewrite'             => [ 'slug' => 'work' ],
		'menu_position'       => 5,
	] );

	// Testimonials
	register_post_type( 'dwp_testimonial', [
		'labels' => [
			'name'          => 'Testimonials',
			'singular_name' => 'Testimonial',
			'add_new_item'  => 'Add New Testimonial',
			'edit_item'     => 'Edit Testimonial',
		],
		'public'        => false,
		'show_ui'       => true,
		'show_in_rest'  => false,
		'supports'      => [ 'title' ],
		'menu_icon'     => 'dashicons-format-quote',
		'menu_position' => 6,
	] );

	// Team Members
	register_post_type( 'dwp_team', [
		'labels' => [
			'name'          => 'Team',
			'singular_name' => 'Team Member',
			'add_new_item'  => 'Add Team Member',
			'edit_item'     => 'Edit Team Member',
		],
		'public'        => false,
		'show_ui'       => true,
		'show_in_rest'  => false,
		'supports'      => [ 'title', 'thumbnail', 'editor' ],
		'menu_icon'     => 'dashicons-groups',
		'menu_position' => 7,
	] );
}
add_action( 'init', 'dwp_register_post_types' );


/* ═══════════════════════════════════════════════════
   5. TAXONOMIES
═══════════════════════════════════════════════════ */
function dwp_register_taxonomies() {
	// Project categories (Service Type)
	register_taxonomy( 'dwp_service_type', [ 'dwp_project' ], [
		'labels' => [
			'name'          => 'Service Types',
			'singular_name' => 'Service Type',
		],
		'hierarchical'      => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'rewrite'           => [ 'slug' => 'service-type' ],
	] );
}
add_action( 'init', 'dwp_register_taxonomies' );


/* ═══════════════════════════════════════════════════
   6. EXCERPT LENGTH
═══════════════════════════════════════════════════ */
function dwp_excerpt_length( $length ) {
	return is_admin() ? $length : 22;
}
add_filter( 'excerpt_length', 'dwp_excerpt_length' );

function dwp_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'dwp_excerpt_more' );


/* ═══════════════════════════════════════════════════
   7. HELPER FUNCTIONS
═══════════════════════════════════════════════════ */

/**
 * Get ACF option with fallback.
 *
 * @param string $key     ACF field key.
 * @param mixed  $default Fallback value.
 * @return mixed
 */
function dwp_opt( string $key, $default = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$val = get_field( $key, 'option' );
		return ( $val !== '' && $val !== null && $val !== false ) ? $val : $default;
	}
	return $default;
}

/**
 * Output an ACF option with fallback, safely escaped.
 *
 * @param string $key     ACF field key.
 * @param mixed  $default Fallback value.
 * @param string $type    'text' | 'html' | 'url' | 'attr'
 */
function dwp_opt_e( string $key, $default = '', string $type = 'text' ) {
	$val = dwp_opt( $key, $default );
	switch ( $type ) {
		case 'html': echo wp_kses_post( $val ); break;
		case 'url':  echo esc_url( $val ); break;
		case 'attr': echo esc_attr( $val ); break;
		default:     echo esc_html( $val ); break;
	}
}

/**
 * Render inline SVG from /assets/images/ safely.
 *
 * @param string $filename  File name without extension, e.g. 'arrow-right'
 * @param string $class     Optional CSS class.
 */
function dwp_svg( string $filename, string $class = '' ) {
	$path = get_template_directory() . '/assets/images/' . $filename . '.svg';
	if ( ! file_exists( $path ) ) return;
	$svg = file_get_contents( $path );
	if ( $class ) {
		$svg = str_replace( '<svg', '<svg class="' . esc_attr( $class ) . '"', $svg );
	}
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo $svg;
}

/**
 * Get the Forminator form shortcode by form ID stored in ACF options.
 *
 * @param  string $key     ACF option key holding the form ID.
 * @param  int    $default Fallback form ID.
 * @return string          Shortcode string or empty.
 */
function dwp_forminator( string $key, int $default = 0 ) {
	$id = (int) dwp_opt( $key, $default );
	if ( ! $id ) return '';
	return do_shortcode( '[forminator_form id="' . $id . '"]' );
}

/**
 * Eyebrow tag markup.
 *
 * @param string $text   Label text.
 * @param string $class  Additional CSS class (e.g. 'eyebrow-lt').
 */
function dwp_eyebrow( string $text, string $class = '' ) {
	$classes = trim( 'eyebrow ' . $class );
	printf( '<span class="%s">%s</span>', esc_attr( $classes ), esc_html( $text ) );
}

/**
 * Returns the star SVG repeated $count times.
 *
 * @param int $count Number of stars (default 5).
 */
function dwp_stars( int $count = 5 ) {
	$star = '<svg class="testi-star" viewBox="0 0 14 14" aria-hidden="true"><path d="M7 1l1.55 3.14L12 4.64l-2.5 2.44.59 3.44L7 8.85 3.91 10.52l.59-3.44L2 4.64l3.45-.5L7 1z"/></svg>';
	echo str_repeat( $star, absint( $count ) ); // phpcs:ignore
}


/* ═══════════════════════════════════════════════════
   8. BODY CLASSES
═══════════════════════════════════════════════════ */
function dwp_body_classes( $classes ) {
	if ( is_front_page() ) $classes[] = 'is-front-page';
	if ( is_singular( 'dwp_project' ) ) $classes[] = 'is-project';
	return $classes;
}
add_filter( 'body_class', 'dwp_body_classes' );


/* ═══════════════════════════════════════════════════
   9. REMOVE EMOJI (PERFORMANCE)
═══════════════════════════════════════════════════ */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


/* ═══════════════════════════════════════════════════
   10. CLEAN UP WP HEAD
═══════════════════════════════════════════════════ */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );


/* ═══════════════════════════════════════════════════
   11. ONE-TIME PORTFOLIO SEEDER
   Visit WP Admin with ?dwp_seed=lume-maid to create
   the Lume Maid Service portfolio entry. Remove this
   section after the post has been created.
═══════════════════════════════════════════════════ */
add_action( 'admin_init', 'dwp_seed_lume_maid_portfolio' );

function dwp_seed_lume_maid_portfolio() {
	// Only run for admins who explicitly trigger it
	if ( ! current_user_can( 'manage_options' ) ) return;
	if ( ! isset( $_GET['dwp_seed'] ) || $_GET['dwp_seed'] !== 'lume-maid' ) return;

	// Guard — skip if post already exists
	$existing = get_page_by_path( 'lume-maid-service', OBJECT, 'dwp_project' );
	if ( $existing ) {
		wp_die( '✅ Lume Maid portfolio post already exists (ID ' . $existing->ID . '). No action needed. <a href="' . admin_url() . '">← Back to admin</a>' );
	}

	// Create the project post
	$post_id = wp_insert_post( [
		'post_type'   => 'dwp_project',
		'post_title'  => 'Lume Maid Service',
		'post_name'   => 'lume-maid-service',
		'post_status' => 'publish',
		'menu_order'  => 10,
	], true );

	if ( is_wp_error( $post_id ) ) {
		wp_die( '❌ Failed to create post: ' . $post_id->get_error_message() );
	}

	// Helper — copy a theme image into the media library
	$sideload = function( $theme_rel_path, $post_id, $alt ) {
		require_once ABSPATH . 'wp-admin/includes/image.php';
		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/media.php';

		$abs = get_template_directory() . '/' . ltrim( $theme_rel_path, '/' );
		if ( ! file_exists( $abs ) ) return 0;

		$tmp = wp_tempnam( basename( $abs ) );
		copy( $abs, $tmp );

		$att_id = media_handle_sideload(
			[ 'name' => basename( $abs ), 'tmp_name' => $tmp ],
			$post_id,
			$alt
		);
		if ( is_wp_error( $att_id ) ) return 0;

		update_post_meta( $att_id, '_wp_attachment_image_alt', sanitize_text_field( $alt ) );
		return $att_id;
	};

	$desktop_id = $sideload( 'images/portfolio/maid-website-1-screenshots/maid-desktop.jpg', $post_id, 'Lume Maid Service — desktop screenshot' );
	$ipad_id    = $sideload( 'images/portfolio/maid-website-2-screenshots/ipad.png',            $post_id, 'Lume Maid Service — iPad screenshot' );
	$mobile_id  = $sideload( 'images/portfolio/maid-website-1-screenshots/maid-mobile.jpg',  $post_id, 'Lume Maid Service — mobile screenshot' );

	// Set ACF fields
	if ( function_exists( 'update_field' ) ) {
		if ( $desktop_id ) {
			update_field( 'proj_screenshot',  $desktop_id, $post_id );
			update_field( 'proj_img_desktop', $desktop_id, $post_id );
		}
		if ( $ipad_id ) {
			update_field( 'proj_img_ipad', $ipad_id, $post_id );
		}
		if ( $mobile_id ) {
			update_field( 'proj_img_mobile',  $mobile_id,  $post_id );
		}
		update_field( 'proj_client',       'Lume Maid Service',                                          $post_id );
		update_field( 'proj_url_label',    'lumemaidservice.com',                                         $post_id );
		update_field( 'proj_industry',     'Home Services',                                               $post_id );
		update_field( 'proj_accent_color', '#4DA8A8',                                                     $post_id );
		update_field( 'proj_result',       'Professional cleaning service site built to rank and convert.', $post_id );
		update_field( 'proj_description',
			"Lume Maid Service needed a website that felt as clean and polished as the homes they clean. " .
			"We built a custom site focused on trust signals, easy booking, and local SEO for the Dallas/Fort Worth market. " .
			"The result is a mobile-first design that turns first-time visitors into booked appointments.",
			$post_id
		);
		update_field( 'proj_services',
			'Custom Design, Copywriting, Local SEO, On-Page Optimization, Mobile-First Development',
			$post_id
		);
		update_field( 'proj_featured_home', 1, $post_id );
	}

	// Assign "Web Design" service-type taxonomy term
	$term = get_term_by( 'slug', 'web-design', 'dwp_service_type' );
	if ( ! $term ) {
		$ins  = wp_insert_term( 'Web Design', 'dwp_service_type', [ 'slug' => 'web-design' ] );
		$tid  = is_wp_error( $ins ) ? 0 : $ins['term_id'];
	} else {
		$tid = $term->term_id;
	}
	if ( $tid ) wp_set_post_terms( $post_id, [ $tid ], 'dwp_service_type' );

	$msg  = '<h2 style="font-family:sans-serif">✅ Lume Maid Service portfolio entry created!</h2>';
	$msg .= '<ul style="font-family:sans-serif;line-height:2">';
	$msg .= '<li>Post ID: <strong>' . $post_id . '</strong></li>';
	$msg .= '<li>Desktop attachment ID: <strong>' . ( $desktop_id ?: 'FAILED — check image path' ) . '</strong></li>';
	$msg .= '<li>iPad attachment ID: <strong>'    . ( $ipad_id    ?: 'FAILED — check image path' ) . '</strong></li>';
	$msg .= '<li>Mobile attachment ID: <strong>'  . ( $mobile_id  ?: 'FAILED — check image path' ) . '</strong></li>';
	$msg .= '</ul>';
	$msg .= '<p style="font-family:sans-serif"><a href="' . get_permalink( $post_id ) . '">View portfolio entry →</a> &nbsp; <a href="' . admin_url( 'edit.php?post_type=dwp_project' ) . '">All projects →</a></p>';
	$msg .= '<p style="font-family:sans-serif;color:#666;font-size:12px">You can now remove the <code>dwp_seed_lume_maid_portfolio</code> block from functions.php.</p>';

	wp_die( $msg );
}


/* ═══════════════════════════════════════════════════
   12. NAV MENU FIXUP — Portfolio → /work/
   Rewrites any menu item pointing to /portfolio/ so it
   resolves to the dwp_project CPT archive at /work/.
═══════════════════════════════════════════════════ */
function dwp_fix_portfolio_menu_url( $items ) {
	$archive_url = get_post_type_archive_link( 'dwp_project' );
	if ( ! $archive_url ) return $items;

	foreach ( $items as $item ) {
		// Match items explicitly set to /portfolio/ (or /portfolio)
		if ( preg_match( '#/portfolio/?$#', $item->url ) ) {
			$item->url = $archive_url;
		}
	}
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'dwp_fix_portfolio_menu_url' );


/* ═══════════════════════════════════════════════════
   13. INCLUDE ADDITIONAL FILES
═══════════════════════════════════════════════════ */
require_once get_template_directory() . '/inc/acf-fields.php';


/* ═══════════════════════════════════════════════════
   14. SEED — BarberCuts Portfolio Entry
   Trigger: /wp-admin/?dwp_seed=barbercuts
   Remove this block after running once.
═══════════════════════════════════════════════════ */
add_action( 'admin_init', 'dwp_seed_barbercuts_portfolio' );

function dwp_seed_barbercuts_portfolio() {
	if ( ! current_user_can( 'manage_options' ) ) return;
	if ( ! isset( $_GET['dwp_seed'] ) || $_GET['dwp_seed'] !== 'barbercuts' ) return;

	// Guard — skip if post already exists
	$existing = get_page_by_path( 'barbercuts', OBJECT, 'dwp_project' );
	if ( $existing ) {
		wp_die( '✅ BarberCuts portfolio post already exists (ID ' . $existing->ID . '). No action needed. <a href="' . admin_url() . '">← Back to admin</a>' );
	}

	// Create the project post
	$post_id = wp_insert_post( [
		'post_type'   => 'dwp_project',
		'post_title'  => 'Marcus Cole Barbershop',
		'post_name'   => 'barbercuts',
		'post_status' => 'publish',
		'menu_order'  => 20,
	], true );

	if ( is_wp_error( $post_id ) ) {
		wp_die( '❌ Failed to create post: ' . $post_id->get_error_message() );
	}

	// Helper — sideload a theme image into the media library
	$sideload = function( $theme_rel_path, $post_id, $alt ) {
		require_once ABSPATH . 'wp-admin/includes/image.php';
		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/media.php';

		$abs = get_template_directory() . '/' . ltrim( $theme_rel_path, '/' );
		if ( ! file_exists( $abs ) ) return 0;

		$tmp = wp_tempnam( basename( $abs ) );
		copy( $abs, $tmp );

		$att_id = media_handle_sideload(
			[ 'name' => basename( $abs ), 'tmp_name' => $tmp ],
			$post_id,
			$alt
		);
		if ( is_wp_error( $att_id ) ) return 0;

		update_post_meta( $att_id, '_wp_attachment_image_alt', sanitize_text_field( $alt ) );
		return $att_id;
	};

	$desktop_id = $sideload( 'images/portfolio/barbercuts-screenshots/barbercuts-desktop.png', $post_id, 'Marcus Cole Barbershop — desktop screenshot' );
	$mobile_id  = $sideload( 'images/portfolio/barbercuts-screenshots/barbercuts-mobile.png',  $post_id, 'Marcus Cole Barbershop — mobile screenshot' );

	// Set ACF fields
	if ( function_exists( 'update_field' ) ) {
		if ( $desktop_id ) {
			update_field( 'proj_screenshot',  $desktop_id, $post_id );
			update_field( 'proj_img_desktop', $desktop_id, $post_id );
		}
		if ( $mobile_id ) {
			update_field( 'proj_img_mobile', $mobile_id, $post_id );
		}
		update_field( 'proj_client',       'Marcus Cole Barbershop',                                        $post_id );
		update_field( 'proj_url_label',    'barbercuts-mqgbvkua.manus.space',                               $post_id );
		update_field( 'proj_url',          'https://barbercuts-mqgbvkua.manus.space/',                      $post_id );
		update_field( 'proj_industry',     'Health & Beauty',                                               $post_id );
		update_field( 'proj_accent_color', '#B1945C',                                                       $post_id );
		update_field( 'proj_result',       'Premium barbershop site built to convert walk-ins and bookings.', $post_id );
		update_field( 'proj_description',
			"Marcus Cole has spent over a decade mastering the craft of barbering. He needed a site that matched his premium reputation — dark, sophisticated, and built to convert. " .
			"We designed a custom barbershop site featuring a pricing menu, client testimonials, and a clear booking call-to-action. " .
			"The result is a high-end digital presence that reflects the quality of every cut.",
			$post_id
		);
		update_field( 'proj_services',
			'Custom Design, Copywriting, Local SEO, Mobile-First Development, Booking Integration',
			$post_id
		);
		update_field( 'proj_featured_home', 1, $post_id );
	}

	// Assign "Web Design" service-type taxonomy term
	$term = get_term_by( 'slug', 'web-design', 'dwp_service_type' );
	if ( ! $term ) {
		$ins = wp_insert_term( 'Web Design', 'dwp_service_type', [ 'slug' => 'web-design' ] );
		$tid = is_wp_error( $ins ) ? 0 : $ins['term_id'];
	} else {
		$tid = $term->term_id;
	}
	if ( $tid ) wp_set_post_terms( $post_id, [ $tid ], 'dwp_service_type' );

	$msg  = '<h2 style="font-family:sans-serif">✅ Marcus Cole Barbershop portfolio entry created!</h2>';
	$msg .= '<ul style="font-family:sans-serif;line-height:2">';
	$msg .= '<li>Post ID: <strong>' . $post_id . '</strong></li>';
	$msg .= '<li>Desktop attachment ID: <strong>' . ( $desktop_id ?: 'FAILED — check image path' ) . '</strong></li>';
	$msg .= '<li>Mobile attachment ID: <strong>'  . ( $mobile_id  ?: 'FAILED — check image path' ) . '</strong></li>';
	$msg .= '</ul>';
	$msg .= '<p style="font-family:sans-serif"><a href="' . get_permalink( $post_id ) . '">View portfolio entry →</a> &nbsp; <a href="' . admin_url( 'edit.php?post_type=dwp_project' ) . '">All projects →</a></p>';
	$msg .= '<p style="font-family:sans-serif;color:#666;font-size:12px">You can now remove the <code>dwp_seed_barbercuts_portfolio</code> block from functions.php.</p>';

	wp_die( $msg );
}


/* ── One-time rename: Marcus Cole → Tiberius Wolfgang ── */
add_action( 'admin_init', 'dwp_rename_barbercuts' );
function dwp_rename_barbercuts() {
	if ( ! current_user_can( 'manage_options' ) ) return;
	if ( ! isset( $_GET['dwp_rename'] ) || $_GET['dwp_rename'] !== 'barbercuts' ) return;

	$post = get_page_by_path( 'barbercuts', OBJECT, 'dwp_project' );
	if ( ! $post ) wp_die( '❌ Could not find barbercuts post.' );

	$id = $post->ID;

	// Update post title
	wp_update_post( [ 'ID' => $id, 'post_title' => 'Tiberius Wolfgang Barbershop' ] );

	// Update ACF fields
	if ( function_exists( 'update_field' ) ) {
		update_field( 'proj_client', 'Tiberius Wolfgang Barbershop', $id );
		update_field( 'proj_result', 'Premium barbershop site built to convert walk-ins and bookings.', $id );
		update_field( 'proj_description',
			"Tiberius Wolfgang has spent over a decade mastering the craft of barbering. He needed a site that matched his premium reputation — dark, sophisticated, and built to convert. " .
			"We designed a custom barbershop site featuring a pricing menu, client testimonials, and a clear booking call-to-action. " .
			"The result is a high-end digital presence that reflects the quality of every cut.",
			$id
		);
	}

	wp_die( '✅ Renamed to Tiberius Wolfgang Barbershop. <a href="' . get_permalink( $id ) . '">View entry →</a>' );
}


/* ═══════════════════════════════════════════════════
   15. SEED — Dallas Elite Clean Portfolio Entry
   Trigger: /wp-admin/?dwp_seed=dallas-elite-clean
   Remove this block after running once.
═══════════════════════════════════════════════════ */
add_action( 'admin_init', 'dwp_seed_dallas_elite_clean' );

function dwp_seed_dallas_elite_clean() {
	if ( ! current_user_can( 'manage_options' ) ) return;
	if ( ! isset( $_GET['dwp_seed'] ) || $_GET['dwp_seed'] !== 'dallas-elite-clean' ) return;

	$existing = get_page_by_path( 'dallas-elite-clean', OBJECT, 'dwp_project' );
	if ( $existing ) {
		wp_die( '✅ Dallas Elite Clean post already exists (ID ' . $existing->ID . '). <a href="' . admin_url() . '">← Back to admin</a>' );
	}

	$post_id = wp_insert_post( [
		'post_type'   => 'dwp_project',
		'post_title'  => 'Dallas Elite Clean',
		'post_name'   => 'dallas-elite-clean',
		'post_status' => 'publish',
		'menu_order'  => 30,
	], true );

	if ( is_wp_error( $post_id ) ) {
		wp_die( '❌ Failed: ' . $post_id->get_error_message() );
	}

	if ( function_exists( 'update_field' ) ) {
		update_field( 'proj_client',       'Dallas Elite Clean',                                                  $post_id );
		update_field( 'proj_url_label',    'dallaclean-cfxcqrtz.manus.space',                                    $post_id );
		update_field( 'proj_url',          'https://dallaclean-cfxcqrtz.manus.space/',                           $post_id );
		update_field( 'proj_industry',     'Home Services',                                                       $post_id );
		update_field( 'proj_accent_color', '#15803D',                                                             $post_id );
		update_field( 'proj_result',       'Premium maid service site built to book more Dallas homeowners.',     $post_id );
		update_field( 'proj_description',
			"Dallas Elite Clean needed a website that felt as polished and trustworthy as the homes they clean. " .
			"We built a custom site with clear service tiers, trust-building testimonials from Highland Park and Uptown clients, and an easy path to booking. " .
			"The result is a conversion-focused design that brings luxury cleaning services to the Dallas market.",
			$post_id
		);
		update_field( 'proj_services',
			'Custom Design, Copywriting, Local SEO, Mobile-First Development, Booking Integration',
			$post_id
		);
		update_field( 'proj_featured_home', 1, $post_id );
	}

	$term = get_term_by( 'slug', 'web-design', 'dwp_service_type' );
	if ( ! $term ) {
		$ins = wp_insert_term( 'Web Design', 'dwp_service_type', [ 'slug' => 'web-design' ] );
		$tid = is_wp_error( $ins ) ? 0 : $ins['term_id'];
	} else {
		$tid = $term->term_id;
	}
	if ( $tid ) wp_set_post_terms( $post_id, [ $tid ], 'dwp_service_type' );

	$msg  = '<h2 style="font-family:sans-serif">✅ Dallas Elite Clean portfolio entry created!</h2>';
	$msg .= '<p style="font-family:sans-serif">Post ID: <strong>' . $post_id . '</strong></p>';
	$msg .= '<p style="font-family:sans-serif"><strong>Next step:</strong> Go to <a href="' . admin_url( 'post.php?post=' . $post_id . '&action=edit' ) . '">edit this post in WP Admin</a> and upload your desktop, iPad, and mobile screenshots into the ACF image fields.</p>';
	$msg .= '<p style="font-family:sans-serif"><a href="' . get_permalink( $post_id ) . '">View portfolio entry →</a> &nbsp; <a href="' . admin_url( 'edit.php?post_type=dwp_project' ) . '">All projects →</a></p>';

	wp_die( $msg );
}


/* ═══════════════════════════════════════════════════
   16. SEED — Your Home Concierge Portfolio Entry
   Trigger: /wp-admin/?dwp_seed=your-home-concierge
   Remove this block after running once.
═══════════════════════════════════════════════════ */
add_action( 'admin_init', 'dwp_seed_your_home_concierge' );

function dwp_seed_your_home_concierge() {
	if ( ! current_user_can( 'manage_options' ) ) return;
	if ( ! isset( $_GET['dwp_seed'] ) || $_GET['dwp_seed'] !== 'your-home-concierge' ) return;

	$existing = get_page_by_path( 'your-home-concierge', OBJECT, 'dwp_project' );
	if ( $existing ) {
		wp_die( '✅ Your Home Concierge post already exists (ID ' . $existing->ID . '). <a href="' . admin_url() . '">← Back to admin</a>' );
	}

	$post_id = wp_insert_post( [
		'post_type'   => 'dwp_project',
		'post_title'  => 'Your Home Concierge',
		'post_name'   => 'your-home-concierge',
		'post_status' => 'publish',
		'menu_order'  => 40,
	], true );

	if ( is_wp_error( $post_id ) ) {
		wp_die( '❌ Failed: ' . $post_id->get_error_message() );
	}

	if ( function_exists( 'update_field' ) ) {
		update_field( 'proj_client',       'Your Home Concierge',                                              $post_id );
		update_field( 'proj_url_label',    'yourhomeconcierge.com',                                            $post_id );
		update_field( 'proj_industry',     'Home Services',                                                    $post_id );
		update_field( 'proj_accent_color', '#b59a6a',                                                          $post_id );
		update_field( 'proj_result',       'Trusted Dallas maid service site built to book and convert.',      $post_id );
		update_field( 'proj_description',
			"Your Home Concierge has served the Dallas–Fort Worth metroplex since 2010, cleaning over 12,000 homes. " .
			"They needed a site as polished and premium as their service — one that instantly built trust and made booking easy. " .
			"We designed a luxury-residential site with credentialed social proof, clear service tiers, and same-day booking CTAs. " .
			"The result is a conversion-focused presence that reflects 15 years of five-star reputation.",
			$post_id
		);
		update_field( 'proj_services',
			'Custom Design, Copywriting, Local SEO, Mobile-First Development, Lead Generation',
			$post_id
		);
		update_field( 'proj_featured_home', 1, $post_id );
	}

	$term = get_term_by( 'slug', 'web-design', 'dwp_service_type' );
	if ( ! $term ) {
		$ins = wp_insert_term( 'Web Design', 'dwp_service_type', [ 'slug' => 'web-design' ] );
		$tid = is_wp_error( $ins ) ? 0 : $ins['term_id'];
	} else {
		$tid = $term->term_id;
	}
	if ( $tid ) wp_set_post_terms( $post_id, [ $tid ], 'dwp_service_type' );

	$msg  = '<h2 style="font-family:sans-serif">✅ Your Home Concierge portfolio entry created!</h2>';
	$msg .= '<p style="font-family:sans-serif">Post ID: <strong>' . $post_id . '</strong></p>';
	$msg .= '<p style="font-family:sans-serif"><strong>Next step:</strong> Go to <a href="' . admin_url( 'post.php?post=' . $post_id . '&action=edit' ) . '">edit this post in WP Admin</a> and upload your desktop, iPad, and mobile screenshots into the ACF image fields.</p>';
	$msg .= '<p style="font-family:sans-serif"><a href="' . get_permalink( $post_id ) . '">View portfolio entry →</a> &nbsp; <a href="' . admin_url( 'edit.php?post_type=dwp_project' ) . '">All projects →</a></p>';

	wp_die( $msg );
}


/* ═══════════════════════════════════════════════════
   17. SEED — He Is Holy Portfolio Entry
   Trigger: /wp-admin/?dwp_seed=he-is-holy
   Remove this block after running once.
═══════════════════════════════════════════════════ */
add_action( 'admin_init', 'dwp_seed_he_is_holy' );

function dwp_seed_he_is_holy() {
	if ( ! current_user_can( 'manage_options' ) ) return;
	if ( ! isset( $_GET['dwp_seed'] ) || $_GET['dwp_seed'] !== 'he-is-holy' ) return;

	$existing = get_page_by_path( 'he-is-holy', OBJECT, 'dwp_project' );
	if ( $existing ) {
		wp_die( '✅ He Is Holy post already exists (ID ' . $existing->ID . '). <a href="' . admin_url() . '">← Back to admin</a>' );
	}

	$post_id = wp_insert_post( [
		'post_type'   => 'dwp_project',
		'post_title'  => 'He Is Holy',
		'post_name'   => 'he-is-holy',
		'post_status' => 'publish',
		'menu_order'  => 50,
	], true );

	if ( is_wp_error( $post_id ) ) {
		wp_die( '❌ Failed: ' . $post_id->get_error_message() );
	}

	if ( function_exists( 'update_field' ) ) {
		update_field( 'proj_client',       'He Is Holy Church',                                                         $post_id );
		update_field( 'proj_url_label',    'leafy-treacle-639826.netlify.app',                                          $post_id );
		update_field( 'proj_url',          'https://leafy-treacle-639826.netlify.app',                                  $post_id );
		update_field( 'proj_industry',     'Faith & Community',                                                         $post_id );
		update_field( 'proj_accent_color', '#7C3AED',                                                                   $post_id );
		update_field( 'proj_result',       'A welcoming church website built to connect, inspire, and grow community.',  $post_id );
		update_field( 'proj_description',
			"He Is Holy Church needed a digital home that felt as inviting and alive as their congregation. " .
			"We designed a warm, modern church website featuring Sunday service times (Contemporary & Traditional), " .
			"ministry programs for every stage of life, a children's ministry section, outreach mission details, and an easy way for first-time visitors to plan their visit. " .
			"The result is a site that reflects their heart — welcoming all to experience faith, family, and the love of Christ.",
			$post_id
		);
		update_field( 'proj_services',
			'Custom Design, Copywriting, Mobile-First Development, Event Integration, Online Giving Setup',
			$post_id
		);
		update_field( 'proj_featured_home', 1, $post_id );
	}

	$term = get_term_by( 'slug', 'web-design', 'dwp_service_type' );
	if ( ! $term ) {
		$ins = wp_insert_term( 'Web Design', 'dwp_service_type', [ 'slug' => 'web-design' ] );
		$tid = is_wp_error( $ins ) ? 0 : $ins['term_id'];
	} else {
		$tid = $term->term_id;
	}
	if ( $tid ) wp_set_post_terms( $post_id, [ $tid ], 'dwp_service_type' );

	$msg  = '<h2 style="font-family:sans-serif">✅ He Is Holy portfolio entry created!</h2>';
	$msg .= '<p style="font-family:sans-serif">Post ID: <strong>' . $post_id . '</strong></p>';
	$msg .= '<p style="font-family:sans-serif"><strong>Next step:</strong> Go to <a href="' . admin_url( 'post.php?post=' . $post_id . '&action=edit' ) . '">edit this post in WP Admin</a> and upload your desktop, iPad, and mobile screenshots into the ACF image fields.</p>';
	$msg .= '<p style="font-family:sans-serif"><a href="' . get_permalink( $post_id ) . '">View portfolio entry →</a> &nbsp; <a href="' . admin_url( 'edit.php?post_type=dwp_project' ) . '">All projects →</a></p>';

	wp_die( $msg );
}


/* ═══════════════════════════════════════════════════
   18. SEED — Mastered Plumbing Portfolio Entry
   Trigger: /wp-admin/?dwp_seed=mastered-plumbing
   Remove this block after running once.
═══════════════════════════════════════════════════ */
add_action( 'admin_init', 'dwp_seed_mastered_plumbing' );

function dwp_seed_mastered_plumbing() {
	if ( ! current_user_can( 'manage_options' ) ) return;
	if ( ! isset( $_GET['dwp_seed'] ) || $_GET['dwp_seed'] !== 'mastered-plumbing' ) return;

	$existing = get_page_by_path( 'mastered-plumbing', OBJECT, 'dwp_project' );
	if ( $existing ) {
		wp_die( '✅ Mastered Plumbing post already exists (ID ' . $existing->ID . '). <a href="' . admin_url() . '">← Back to admin</a>' );
	}

	$post_id = wp_insert_post( [
		'post_type'   => 'dwp_project',
		'post_title'  => 'Mastered Plumbing',
		'post_name'   => 'mastered-plumbing',
		'post_status' => 'publish',
		'menu_order'  => 60,
	], true );

	if ( is_wp_error( $post_id ) ) {
		wp_die( '❌ Failed: ' . $post_id->get_error_message() );
	}

	if ( function_exists( 'update_field' ) ) {
		update_field( 'proj_client',       'Mastered Plumbing',                                                                     $post_id );
		update_field( 'proj_url_label',    'masteredplum-eri3et3a.manus.space',                                                     $post_id );
		update_field( 'proj_url',          'https://masteredplum-eri3et3a.manus.space/',                                            $post_id );
		update_field( 'proj_industry',     'Plumbing & Trade Services',                                                              $post_id );
		update_field( 'proj_accent_color', '#B87333',                                                                               $post_id );
		update_field( 'proj_result',       'A premium plumbing website that earns trust and converts visitors into booked calls.',    $post_id );
		update_field( 'proj_description',
			"Mastered Plumbing needed a website that matched the quality of their craft — professional, trustworthy, and built to convert. " .
			"We designed a premium residential and commercial plumbing site featuring a Navy and Copper color palette, subtle animations, and a layout engineered to turn visitors into booked service calls. " .
			"From the hero section to the service breakdown and contact form, every element was crafted to communicate expertise, reliability, and premium service.",
			$post_id
		);
		update_field( 'proj_services',
			'Custom Design, Mobile-First Development, Service Page Architecture, Lead Generation Optimization, Copywriting',
			$post_id
		);
		update_field( 'proj_featured_home', 1, $post_id );
	}

	$term = get_term_by( 'slug', 'web-design', 'dwp_service_type' );
	if ( ! $term ) {
		$ins = wp_insert_term( 'Web Design', 'dwp_service_type', [ 'slug' => 'web-design' ] );
		$tid = is_wp_error( $ins ) ? 0 : $ins['term_id'];
	} else {
		$tid = $term->term_id;
	}
	if ( $tid ) wp_set_post_terms( $post_id, [ $tid ], 'dwp_service_type' );

	$msg  = '<h2 style="font-family:sans-serif">✅ Mastered Plumbing portfolio entry created!</h2>';
	$msg .= '<p style="font-family:sans-serif">Post ID: <strong>' . $post_id . '</strong></p>';
	$msg .= '<p style="font-family:sans-serif"><strong>Next step:</strong> Go to <a href="' . admin_url( 'post.php?post=' . $post_id . '&action=edit' ) . '">edit this post in WP Admin</a> and upload your desktop, iPad, and mobile screenshots into the ACF image fields.</p>';
	$msg .= '<p style="font-family:sans-serif"><a href="' . get_permalink( $post_id ) . '">View portfolio entry →</a> &nbsp; <a href="' . admin_url( 'edit.php?post_type=dwp_project' ) . '">All projects →</a></p>';

	wp_die( $msg );
}


/* ═══════════════════════════════════════════════════
   19. SEED — Green Leprechaun Plumbing Portfolio Entry
   Trigger: /wp-admin/?dwp_seed=green-leprechaun-plumbing
   Remove this block after running once.
═══════════════════════════════════════════════════ */
add_action( 'admin_init', 'dwp_seed_green_leprechaun_plumbing' );

function dwp_seed_green_leprechaun_plumbing() {
	if ( ! current_user_can( 'manage_options' ) ) return;
	if ( ! isset( $_GET['dwp_seed'] ) || $_GET['dwp_seed'] !== 'green-leprechaun-plumbing' ) return;

	$existing = get_page_by_path( 'green-leprechaun-plumbing', OBJECT, 'dwp_project' );
	if ( $existing ) {
		wp_die( '✅ Green Leprechaun Plumbing post already exists (ID ' . $existing->ID . '). <a href="' . admin_url() . '">← Back to admin</a>' );
	}

	$post_id = wp_insert_post( [
		'post_type'   => 'dwp_project',
		'post_title'  => 'Green Leprechaun Plumbing',
		'post_name'   => 'green-leprechaun-plumbing',
		'post_status' => 'publish',
		'menu_order'  => 70,
	], true );

	if ( is_wp_error( $post_id ) ) {
		wp_die( '❌ Failed: ' . $post_id->get_error_message() );
	}

	if ( function_exists( 'update_field' ) ) {
		update_field( 'proj_client',       'Green Leprechaun Plumbing',                                                                          $post_id );
		update_field( 'proj_url_label',    'greenplumb-8ze65lat.manus.space',                                                                    $post_id );
		update_field( 'proj_url',          'https://greenplumb-8ze65lat.manus.space/',                                                            $post_id );
		update_field( 'proj_industry',     'Plumbing & Trade Services',                                                                           $post_id );
		update_field( 'proj_accent_color', '#2D6A4F',                                                                                            $post_id );
		update_field( 'proj_result',       "San Diego's most trusted plumbing website — built to convert emergency calls and long-term customers.", $post_id );
		update_field( 'proj_description',
			"Green Leprechaun Plumbing serves the San Diego area with licensed, insured plumbing solutions around the clock. " .
			"We built a bold, trustworthy website centered around their 24/7 emergency service offering, with clear service categories, " .
			"a prominent call-to-action, and a design that builds confidence fast. " .
			"The result is a site that works as hard as their team — capturing leads day and night.",
			$post_id
		);
		update_field( 'proj_services',
			'Custom Design, Mobile-First Development, Emergency Service UX, Lead Generation Optimization, Copywriting',
			$post_id
		);
		update_field( 'proj_featured_home', 1, $post_id );
	}

	$term = get_term_by( 'slug', 'web-design', 'dwp_service_type' );
	if ( ! $term ) {
		$ins = wp_insert_term( 'Web Design', 'dwp_service_type', [ 'slug' => 'web-design' ] );
		$tid = is_wp_error( $ins ) ? 0 : $ins['term_id'];
	} else {
		$tid = $term->term_id;
	}
	if ( $tid ) wp_set_post_terms( $post_id, [ $tid ], 'dwp_service_type' );

	$msg  = '<h2 style="font-family:sans-serif">✅ Green Leprechaun Plumbing portfolio entry created!</h2>';
	$msg .= '<p style="font-family:sans-serif">Post ID: <strong>' . $post_id . '</strong></p>';
	$msg .= '<p style="font-family:sans-serif"><strong>Next step:</strong> Go to <a href="' . admin_url( 'post.php?post=' . $post_id . '&action=edit' ) . '">edit this post in WP Admin</a> and upload your desktop, iPad, and mobile screenshots into the ACF image fields.</p>';
	$msg .= '<p style="font-family:sans-serif"><a href="' . get_permalink( $post_id ) . '">View portfolio entry →</a> &nbsp; <a href="' . admin_url( 'edit.php?post_type=dwp_project' ) . '">All projects →</a></p>';

	wp_die( $msg );
}

/* ─── PIPEHOURS PLUMBING ─────────────────────────────── */
add_action( 'init', 'dwp_seed_pipehours_plumbing' );
function dwp_seed_pipehours_plumbing() {
	if ( ! current_user_can( 'manage_options' ) ) return;
	if ( ! isset( $_GET['dwp_seed'] ) || $_GET['dwp_seed'] !== 'pipehours-plumbing' ) return;

	$existing = get_page_by_path( 'pipehours-plumbing', OBJECT, 'dwp_project' );
	if ( $existing ) {
		wp_die( '✅ PipeHours Plumbing post already exists (ID ' . $existing->ID . '). <a href="' . admin_url() . '">← Back to admin</a>' );
	}

	$post_id = wp_insert_post( [
		'post_type'   => 'dwp_project',
		'post_title'  => 'PipeHours Plumbing',
		'post_name'   => 'pipehours-plumbing',
		'post_status' => 'publish',
		'menu_order'  => 80,
	], true );

	if ( is_wp_error( $post_id ) ) {
		wp_die( '❌ Failed: ' . $post_id->get_error_message() );
	}

	if ( function_exists( 'update_field' ) ) {
		update_field( 'proj_client',       'PipeHours Plumbing',                                                                                             $post_id );
		update_field( 'proj_url_label',    'pipehours.dallaswebpro.net',                                                                                     $post_id );
		update_field( 'proj_url',          'https://pipehours.dallaswebpro.net/',                                                                            $post_id );
		update_field( 'proj_industry',     'Plumbing & Trade Services',                                                                                      $post_id );
		update_field( 'proj_accent_color', '#1B4F8A',                                                                                                        $post_id );
		update_field( 'proj_city',         'San Francisco',                                                                                                  $post_id );
		update_field( 'proj_result',       "A premium, trust-first plumbing website built to convert San Francisco searchers into booked service calls.",     $post_id );
		update_field( 'proj_description',
			"PipeHours Plumbing is San Francisco's premier 24/7 plumbing service — licensed, insured, and ready for any job from drain cleaning to water heater replacement. " .
			"We built a clean, authoritative website with a deep navy and white palette inspired by premium service brands. " .
			"Every detail was designed to build trust fast: clear service listing, an always-visible call button, and a layout that guides visitors straight to booking. " .
			"The result is a site as reliable as the team behind it.",
			$post_id
		);
		update_field( 'proj_services',
			'Custom Design, Mobile-First Development, 24/7 Service UX, Trust Signal Optimization, Copywriting, Local SEO Structure',
			$post_id
		);
		update_field( 'proj_featured_home', 1, $post_id );
	}

	$term = get_term_by( 'slug', 'web-design', 'dwp_service_type' );
	if ( ! $term ) {
		$ins = wp_insert_term( 'Web Design', 'dwp_service_type', [ 'slug' => 'web-design' ] );
		$tid = is_wp_error( $ins ) ? 0 : $ins['term_id'];
	} else {
		$tid = $term->term_id;
	}
	if ( $tid ) wp_set_post_terms( $post_id, [ $tid ], 'dwp_service_type' );

	$msg  = '<h2 style="font-family:sans-serif">✅ PipeHours Plumbing portfolio entry created!</h2>';
	$msg .= '<p style="font-family:sans-serif">Post ID: <strong>' . $post_id . '</strong></p>';
	$msg .= '<p style="font-family:sans-serif"><strong>Next step:</strong> Go to <a href="' . admin_url( 'post.php?post=' . $post_id . '&action=edit' ) . '">edit this post in WP Admin</a> and upload your desktop, iPad, and mobile screenshots into the ACF image fields.</p>';
	$msg .= '<p style="font-family:sans-serif"><a href="' . get_permalink( $post_id ) . '">View portfolio entry →</a> &nbsp; <a href="' . admin_url( 'edit.php?post_type=dwp_project' ) . '">All projects →</a></p>';

	wp_die( $msg );
}

