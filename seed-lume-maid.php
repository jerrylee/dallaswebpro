<?php
/**
 * Seed — Lume Maid Service Portfolio Entry
 *
 * Run once via WP-CLI:
 *   wp eval-file wp-content/themes/dallaswebpro/seed-lume-maid.php
 *
 * Creates the `dwp_project` post for Lume Maid Service, sideloads
 * the desktop + mobile screenshots into the media library, and sets
 * all ACF fields.  Safe to re-run — it skips creation if a post with
 * the same slug already exists.
 */

defined( 'ABSPATH' ) || exit;

// ── 1. Guard against double-creation ────────────────────────────────
$existing = get_page_by_path( 'lume-maid-service', OBJECT, 'dwp_project' );
if ( $existing ) {
	WP_CLI::success( 'Post already exists (ID ' . $existing->ID . '). Nothing to do.' );
	return;
}

// ── 2. Create the post ───────────────────────────────────────────────
$post_id = wp_insert_post( [
	'post_type'   => 'dwp_project',
	'post_title'  => 'Lume Maid Service',
	'post_name'   => 'lume-maid-service',
	'post_status' => 'publish',
	'menu_order'  => 10,
], true );

if ( is_wp_error( $post_id ) ) {
	WP_CLI::error( 'Failed to create post: ' . $post_id->get_error_message() );
	return;
}

WP_CLI::log( 'Created post ID ' . $post_id );

// ── 3. Helper — sideload a theme image into the media library ────────
function dwp_sideload_theme_image( $theme_relative_path, $post_id, $alt_text ) {
	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';

	$theme_dir = get_template_directory();
	$abs_path  = $theme_dir . '/' . ltrim( $theme_relative_path, '/' );

	if ( ! file_exists( $abs_path ) ) {
		WP_CLI::warning( 'Image not found: ' . $abs_path );
		return 0;
	}

	// Copy to a temp file so media_handle_sideload can manage it
	$tmp = wp_tempnam( basename( $abs_path ) );
	copy( $abs_path, $tmp );

	$file_array = [
		'name'     => basename( $abs_path ),
		'tmp_name' => $tmp,
	];

	$attachment_id = media_handle_sideload( $file_array, $post_id, $alt_text );

	if ( is_wp_error( $attachment_id ) ) {
		WP_CLI::warning( 'Sideload failed: ' . $attachment_id->get_error_message() );
		return 0;
	}

	// Set the alt text
	update_post_meta( $attachment_id, '_wp_attachment_image_alt', $alt_text );

	return $attachment_id;
}

// ── 4. Sideload images ───────────────────────────────────────────────
WP_CLI::log( 'Sideloading desktop screenshot…' );
$desktop_id = dwp_sideload_theme_image(
	'images/portfolio/maid-desktop.jpg',
	$post_id,
	'Lume Maid Service — desktop screenshot'
);

WP_CLI::log( 'Sideloading mobile screenshot…' );
$mobile_id = dwp_sideload_theme_image(
	'images/portfolio/maid-mobile.jpg',
	$post_id,
	'Lume Maid Service — mobile screenshot'
);

// ── 5. Set ACF fields ────────────────────────────────────────────────
// proj_screenshot  → used as the archive card thumbnail (same as desktop for now)
if ( $desktop_id ) {
	update_field( 'proj_screenshot',   $desktop_id, $post_id );
	update_field( 'proj_img_desktop',  $desktop_id, $post_id );
}
if ( $mobile_id ) {
	update_field( 'proj_img_mobile',   $mobile_id,  $post_id );
}

update_field( 'proj_client',       'Lume Maid Service',   $post_id );
update_field( 'proj_url_label',    'lumemaidservice.com',  $post_id );
update_field( 'proj_industry',     'Home Services',        $post_id );
update_field( 'proj_accent_color', '#4DA8A8',              $post_id ); // teal — clean/fresh brand feel

update_field( 'proj_result',
	'Professional cleaning service site built to rank and convert.',
	$post_id
);

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

update_field( 'proj_featured_home', 1, $post_id ); // show on homepage

// ── 6. Assign service-type taxonomy term ────────────────────────────
// Ensure the "Web Design" term exists (slug: web-design)
$term = get_term_by( 'slug', 'web-design', 'dwp_service_type' );
if ( ! $term ) {
	$inserted = wp_insert_term( 'Web Design', 'dwp_service_type', [ 'slug' => 'web-design' ] );
	$term_id  = is_wp_error( $inserted ) ? 0 : $inserted['term_id'];
} else {
	$term_id = $term->term_id;
}

if ( $term_id ) {
	wp_set_post_terms( $post_id, [ $term_id ], 'dwp_service_type' );
}

WP_CLI::success( 'Lume Maid Service portfolio entry created! Post ID: ' . $post_id );
WP_CLI::log( '  Desktop attachment ID : ' . ( $desktop_id ?: 'FAILED' ) );
WP_CLI::log( '  Mobile attachment ID  : ' . ( $mobile_id  ?: 'FAILED' ) );
WP_CLI::log( 'Visit /work/ to preview the portfolio grid.' );
