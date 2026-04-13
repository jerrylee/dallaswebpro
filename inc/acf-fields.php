<?php
/**
 * Dallas Web Pro — ACF Field Group Registration
 *
 * All fields use Options page locations.
 * Add field groups via ACF UI first to generate the export,
 * or register programmatically here for portability.
 *
 * Field keys follow the pattern: field_dwp_{section}_{name}
 */

defined( 'ABSPATH' ) || exit;

add_action( 'acf/init', 'dwp_register_acf_fields' );

function dwp_register_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

	/* ─── HOMEPAGE HERO ─────────────────────────── */
	acf_add_local_field_group( [
		'key'      => 'group_dwp_hero',
		'title'    => 'Homepage — Hero',
		'fields'   => [
			[
				'key'           => 'field_dwp_hero_eyebrow',
				'label'         => 'Eyebrow Tag',
				'name'          => 'hero_eyebrow',
				'type'          => 'text',
				'default_value' => 'Web Development &amp; Digital Strategy',
			],
			[
				'key'           => 'field_dwp_hero_headline_line1',
				'label'         => 'Headline — Line 1',
				'name'          => 'hero_headline_line1',
				'type'          => 'text',
				'default_value' => 'Websites that',
				'instructions'  => 'First line of the three-line hero headline.',
			],
			[
				'key'           => 'field_dwp_hero_headline_line2',
				'label'         => 'Headline — Line 2',
				'name'          => 'hero_headline_line2',
				'type'          => 'text',
				'default_value' => 'actually',
			],
			[
				'key'           => 'field_dwp_hero_headline_line3',
				'label'         => 'Headline — Line 3 (italic accent)',
				'name'          => 'hero_headline_line3',
				'type'          => 'text',
				'default_value' => 'earn their keep.',
				'instructions'  => 'This line renders in italic amber. Do not include the period if you prefer a clean line.',
			],
			[
				'key'           => 'field_dwp_hero_sub',
				'label'         => 'Subtext',
				'name'          => 'hero_sub',
				'type'          => 'textarea',
				'rows'          => 3,
				'default_value' => 'A full-service digital agency building custom websites, brand identities, and growth strategies for small businesses that are serious about their online presence.',
			],
			[
				'key'           => 'field_dwp_hero_cta_primary_text',
				'label'         => 'Primary CTA Text',
				'name'          => 'hero_cta_primary_text',
				'type'          => 'text',
				'default_value' => 'Start a Project',
			],
			[
				'key'           => 'field_dwp_hero_cta_primary_url',
				'label'         => 'Primary CTA URL',
				'name'          => 'hero_cta_primary_url',
				'type'          => 'text',
				'default_value' => '#contact',
			],
			[
				'key'           => 'field_dwp_hero_cta_ghost_text',
				'label'         => 'Ghost CTA Text',
				'name'          => 'hero_cta_ghost_text',
				'type'          => 'text',
				'default_value' => 'See our work',
			],
			[
				'key'           => 'field_dwp_hero_cta_ghost_url',
				'label'         => 'Ghost CTA URL',
				'name'          => 'hero_cta_ghost_url',
				'type'          => 'text',
				'default_value' => '/work',
			],
			[
				'key'           => 'field_dwp_hero_trust_pills',
				'label'         => 'Trust Pills',
				'name'          => 'hero_trust_pills',
				'type'          => 'repeater',
				'min'           => 0,
				'max'           => 5,
				'layout'        => 'table',
				'sub_fields'    => [
					[
						'key'   => 'field_dwp_hero_trust_pill_label',
						'label' => 'Label',
						'name'  => 'label',
						'type'  => 'text',
					],
				],
			],
			[
				'key'           => 'field_dwp_hero_browser_img_1',
				'label'         => 'Browser Card — Back Image',
				'name'          => 'hero_browser_img_1',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
			],
			[
				'key'           => 'field_dwp_hero_browser_url_1',
				'label'         => 'Browser Card — Back URL Label',
				'name'          => 'hero_browser_url_1',
				'type'          => 'text',
				'default_value' => 'clientwebsite.com',
			],
			[
				'key'           => 'field_dwp_hero_browser_img_2',
				'label'         => 'Browser Card — Front Image',
				'name'          => 'hero_browser_img_2',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
			],
			[
				'key'           => 'field_dwp_hero_browser_url_2',
				'label'         => 'Browser Card — Front URL Label',
				'name'          => 'hero_browser_url_2',
				'type'          => 'text',
				'default_value' => 'yourdomainhere.com',
			],
			[
				'key'           => 'field_dwp_hero_stat_number',
				'label'         => 'Floating Badge — Number',
				'name'          => 'hero_stat_number',
				'type'          => 'text',
				'default_value' => '50+',
			],
			[
				'key'           => 'field_dwp_hero_stat_label',
				'label'         => 'Floating Badge — Label',
				'name'          => 'hero_stat_label',
				'type'          => 'text',
				'default_value' => 'Sites Launched',
			],
		],
		'location' => [ [ [ 'param' => 'options_page', 'operator' => '==', 'value' => 'dwp-homepage' ] ] ],
	] );

	/* ─── TRUST BAR ─────────────────────────────── */
	acf_add_local_field_group( [
		'key'    => 'group_dwp_trust_bar',
		'title'  => 'Trust Bar',
		'fields' => [
			[
				'key'        => 'field_dwp_trust_items',
				'label'      => 'Trust Items',
				'name'       => 'trust_items',
				'type'       => 'repeater',
				'min'        => 1,
				'max'        => 6,
				'layout'     => 'block',
				'sub_fields' => [
					[
						'key'   => 'field_dwp_trust_item_stat',
						'label' => 'Stat / Number',
						'name'  => 'stat',
						'type'  => 'text',
					],
					[
						'key'   => 'field_dwp_trust_item_label',
						'label' => 'Label',
						'name'  => 'label',
						'type'  => 'text',
					],
					[
						'key'          => 'field_dwp_trust_item_icon',
						'label'        => 'SVG Icon',
						'name'         => 'icon',
						'type'         => 'textarea',
						'rows'         => 4,
						'instructions' => 'Paste raw SVG path/shape code (just the inner elements, no <svg> wrapper). The wrapper is added by the template.',
					],
				],
			],
		],
		'location' => [ [ [ 'param' => 'options_page', 'operator' => '==', 'value' => 'dwp-trust-bar' ] ] ],
	] );

	/* ─── SERVICES ──────────────────────────────── */
	acf_add_local_field_group( [
		'key'    => 'group_dwp_services',
		'title'  => 'Services Section',
		'fields' => [
			[
				'key'           => 'field_dwp_svc_eyebrow',
				'label'         => 'Eyebrow',
				'name'          => 'svc_eyebrow',
				'type'          => 'text',
				'default_value' => 'What We Do',
			],
			[
				'key'           => 'field_dwp_svc_heading',
				'label'         => 'Heading (use *word* for italic accent)',
				'name'          => 'svc_heading',
				'type'          => 'text',
				'default_value' => 'The work that *moves the needle.*',
				'instructions'  => 'Wrap italic accent words in *asterisks*. Output renders them as <em>.',
			],
			[
				'key'           => 'field_dwp_svc_sub',
				'label'         => 'Subtext (right-aligned)',
				'name'          => 'svc_sub',
				'type'          => 'textarea',
				'rows'          => 2,
				'default_value' => 'Six focused disciplines. Each one a dedicated practice — no generalists, no hand-offs, no deliverables that disappear into a drive folder.',
			],
			[
				'key'        => 'field_dwp_services',
				'label'      => 'Services',
				'name'       => 'services',
				'type'       => 'repeater',
				'min'        => 1,
				'max'        => 6,
				'layout'     => 'block',
				'sub_fields' => [
					[
						'key'   => 'field_dwp_svc_number',
						'label' => 'Number (e.g. 01)',
						'name'  => 'number',
						'type'  => 'text',
					],
					[
						'key'           => 'field_dwp_svc_featured',
						'label'         => 'Featured Card (dark)',
						'name'          => 'featured',
						'type'          => 'true_false',
						'default_value' => 0,
						'ui'            => 1,
						'instructions'  => 'Only one service should be featured at a time.',
					],
					[
						'key'          => 'field_dwp_svc_icon_svg',
						'label'        => 'Icon SVG',
						'name'         => 'icon_svg',
						'type'         => 'textarea',
						'rows'         => 5,
						'instructions' => 'Paste full <svg> element. Use stroke="#C97B2A" for light cards; rgba(255,255,255,0.5) for featured dark card.',
					],
					[
						'key'   => 'field_dwp_svc_title',
						'label' => 'Service Title',
						'name'  => 'title',
						'type'  => 'text',
					],
					[
						'key'   => 'field_dwp_svc_body',
						'label' => 'Description',
						'name'  => 'body',
						'type'  => 'textarea',
						'rows'  => 3,
					],
					[
						'key'           => 'field_dwp_svc_link_text',
						'label'         => 'Link Text',
						'name'          => 'link_text',
						'type'          => 'text',
						'default_value' => 'Learn more',
					],
					[
						'key'   => 'field_dwp_svc_link_url',
						'label' => 'Link URL',
						'name'  => 'link_url',
						'type'  => 'text',
					],
				],
			],
		],
		'location' => [ [ [ 'param' => 'options_page', 'operator' => '==', 'value' => 'dwp-services' ] ] ],
	] );

	/* ─── CONTACT SECTION ───────────────────────── */
	acf_add_local_field_group( [
		'key'    => 'group_dwp_contact',
		'title'  => 'Contact Section',
		'fields' => [
			[
				'key'           => 'field_dwp_contact_heading',
				'label'         => 'Heading (use *word* for italic)',
				'name'          => 'contact_heading',
				'type'          => 'text',
				'default_value' => 'Tell us about your *business.*',
			],
			[
				'key'           => 'field_dwp_contact_sub',
				'label'         => 'Subtext',
				'name'          => 'contact_sub',
				'type'          => 'textarea',
				'rows'          => 3,
				'default_value' => 'Book a free 30-minute discovery call with our team — no pitch, no pressure. We\'ll talk through what you need, what\'s not working, and whether we\'re the right fit for the job.',
			],
			[
				'key'           => 'field_dwp_contact_email',
				'label'         => 'Contact Email',
				'name'          => 'contact_email',
				'type'          => 'email',
				'default_value' => 'contact@dallaswebpro.com',
			],
			[
				'key'           => 'field_dwp_contact_location',
				'label'         => 'Location Label',
				'name'          => 'contact_location',
				'type'          => 'text',
				'default_value' => 'Allen, TX — Serving all of DFW',
			],
			[
				'key'           => 'field_dwp_contact_response_time',
				'label'         => 'Response Time Label',
				'name'          => 'contact_response_time',
				'type'          => 'text',
				'default_value' => 'Within one business day',
			],
			[
				'key'           => 'field_dwp_contact_form_id',
				'label'         => 'Forminator Form ID',
				'name'          => 'contact_form_id',
				'type'          => 'number',
				'instructions'  => 'Enter the numeric ID of your Forminator Pro form. Find it in Forminator > Forms.',
				'min'           => 1,
			],
			[
				'key'           => 'field_dwp_contact_form_note',
				'label'         => 'Form Fine Print',
				'name'          => 'contact_form_note',
				'type'          => 'text',
				'default_value' => 'No pitch. No pressure. Just a real conversation about your business.',
			],
		],
		'location' => [ [ [ 'param' => 'options_page', 'operator' => '==', 'value' => 'dwp-contact' ] ] ],
	] );

	/* ─── ABOUT SECTION ─────────────────────────── */
	acf_add_local_field_group( [
		'key'    => 'group_dwp_about',
		'title'  => 'About Section',
		'fields' => [
			[
				'key'           => 'field_dwp_about_eyebrow',
				'label'         => 'Eyebrow',
				'name'          => 'about_eyebrow',
				'type'          => 'text',
				'default_value' => 'About Us',
			],
			[
				'key'           => 'field_dwp_about_heading',
				'label'         => 'Heading (use *word* for italic)',
				'name'          => 'about_heading',
				'type'          => 'text',
				'default_value' => 'A Dallas agency that actually *knows your market.*',
			],
			[
				'key'        => 'field_dwp_about_body_blocks',
				'label'      => 'Body Paragraphs',
				'name'       => 'about_body_blocks',
				'type'       => 'repeater',
				'layout'     => 'block',
				'sub_fields' => [
					[
						'key'   => 'field_dwp_about_body_p',
						'label' => 'Paragraph',
						'name'  => 'paragraph',
						'type'  => 'textarea',
						'rows'  => 3,
					],
				],
			],
			[
				'key'           => 'field_dwp_about_sig_name',
				'label'         => 'Signature Name',
				'name'          => 'about_sig_name',
				'type'          => 'text',
				'default_value' => 'Jerry Schrader',
			],
			[
				'key'           => 'field_dwp_about_sig_title',
				'label'         => 'Signature Title',
				'name'          => 'about_sig_title',
				'type'          => 'text',
				'default_value' => 'Founder &amp; Principal — Dallas Web Pro',
			],
			[
				'key'           => 'field_dwp_about_photo',
				'label'         => 'Photo',
				'name'          => 'about_photo',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
			],
			[
				'key'           => 'field_dwp_about_badge_number',
				'label'         => 'Badge — Number',
				'name'          => 'about_badge_number',
				'type'          => 'text',
				'default_value' => '10+',
			],
			[
				'key'           => 'field_dwp_about_badge_label',
				'label'         => 'Badge — Label',
				'name'          => 'about_badge_label',
				'type'          => 'text',
				'default_value' => 'Years in Business',
			],
		],
		'location' => [ [ [ 'param' => 'options_page', 'operator' => '==', 'value' => 'dwp-about' ] ] ],
	] );

	/* ─── PROCESS SECTION ───────────────────────── */
	acf_add_local_field_group( [
		'key'    => 'group_dwp_process',
		'title'  => 'Process Section',
		'fields' => [
			[
				'key'           => 'field_dwp_proc_eyebrow',
				'label'         => 'Eyebrow',
				'name'          => 'proc_eyebrow',
				'type'          => 'text',
				'default_value' => 'How It Works',
			],
			[
				'key'           => 'field_dwp_proc_heading',
				'label'         => 'Heading (use *word* for italic)',
				'name'          => 'proc_heading',
				'type'          => 'text',
				'default_value' => 'Simple process. *Real results.*',
			],
			[
				'key'           => 'field_dwp_proc_sub',
				'label'         => 'Right-aligned subtext',
				'name'          => 'proc_sub',
				'type'          => 'textarea',
				'rows'          => 2,
				'default_value' => 'From first conversation to live site — a clear path with no surprises, no scope creep, and no disappearing acts.',
			],
			[
				'key'        => 'field_dwp_process_steps',
				'label'      => 'Steps',
				'name'       => 'process_steps',
				'type'       => 'repeater',
				'min'        => 2,
				'max'        => 6,
				'layout'     => 'block',
				'sub_fields' => [
					[
						'key'   => 'field_dwp_proc_step_num',
						'label' => 'Step Number Label (e.g. 01)',
						'name'  => 'number',
						'type'  => 'text',
					],
					[
						'key'   => 'field_dwp_proc_step_title',
						'label' => 'Step Title',
						'name'  => 'title',
						'type'  => 'text',
					],
					[
						'key'   => 'field_dwp_proc_step_body',
						'label' => 'Step Description',
						'name'  => 'body',
						'type'  => 'textarea',
						'rows'  => 3,
					],
				],
			],
		],
		'location' => [ [ [ 'param' => 'options_page', 'operator' => '==', 'value' => 'dwp-process' ] ] ],
	] );

	/* ─── TESTIMONIALS ──────────────────────────── */
	acf_add_local_field_group( [
		'key'    => 'group_dwp_testimonial_cpt',
		'title'  => 'Testimonial Details',
		'fields' => [
			[
				'key'   => 'field_dwp_testi_quote',
				'label' => 'Quote',
				'name'  => 'testi_quote',
				'type'  => 'textarea',
				'rows'  => 4,
			],
			[
				'key'           => 'field_dwp_testi_author_name',
				'label'         => 'Author Name',
				'name'          => 'testi_author_name',
				'type'          => 'text',
			],
			[
				'key'   => 'field_dwp_testi_author_company',
				'label' => 'Company / Business Type',
				'name'  => 'testi_author_company',
				'type'  => 'text',
			],
			[
				'key'           => 'field_dwp_testi_author_photo',
				'label'         => 'Author Photo',
				'name'          => 'testi_author_photo',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'thumbnail',
			],
			[
				'key'           => 'field_dwp_testi_rating',
				'label'         => 'Star Rating',
				'name'          => 'testi_rating',
				'type'          => 'number',
				'default_value' => 5,
				'min'           => 1,
				'max'           => 5,
			],
		],
		'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'dwp_testimonial' ] ] ],
	] );

	/* ─── PROJECT CPT ───────────────────────────── */
	acf_add_local_field_group( [
		'key'    => 'group_dwp_project_cpt',
		'title'  => 'Project Details',
		'fields' => [
			[
				'key'   => 'field_dwp_proj_client',
				'label' => 'Client Name',
				'name'  => 'proj_client',
				'type'  => 'text',
			],
			[
				'key'   => 'field_dwp_proj_url',
				'label' => 'Live Site URL',
				'name'  => 'proj_url',
				'type'  => 'url',
			],
			[
				'key'           => 'field_dwp_proj_url_label',
				'label'         => 'URL Display Label (shown in browser chrome)',
				'name'          => 'proj_url_label',
				'type'          => 'text',
				'instructions'  => 'e.g. lumemaidservice.com — shown as the browser address bar text on the portfolio card.',
			],
			[
				'key'           => 'field_dwp_proj_screenshot',
				'label'         => 'Screenshot',
				'name'          => 'proj_screenshot',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'dwp-portfolio',
			],
			[
				'key'           => 'field_dwp_proj_result',
				'label'         => 'Result / Impact (one line)',
				'name'          => 'proj_result',
				'type'          => 'text',
				'instructions'  => 'e.g. "#1 on Google for \'Allen TX plumber\' in 4 months"',
			],
			[
				'key'           => 'field_dwp_proj_featured_home',
				'label'         => 'Show on Homepage',
				'name'          => 'proj_featured_home',
				'type'          => 'true_false',
				'default_value' => 0,
				'ui'            => 1,
				'instructions'  => 'Enable to include in the homepage portfolio grid (max 6 recommended).',
			],
			/* ─── Single page fields ─── */
			[
				'key'           => 'field_dwp_proj_description',
				'label'         => 'Project Description (legacy — use Overview below)',
				'name'          => 'proj_description',
				'type'          => 'textarea',
				'rows'          => 4,
				'instructions'  => 'Legacy plain-text fallback. Prefer the Overview (WYSIWYG) field below for new/updated projects.',
			],
			[
				'key'           => 'field_dwp_proj_overview',
				'label'         => 'Project Overview',
				'name'          => 'proj_overview',
				'type'          => 'wysiwyg',
				'tabs'          => 'all',
				'toolbar'       => 'basic',
				'media_upload'  => 0,
				'delay'         => 0,
				'instructions'  => 'Rich-text project story — 2 to 4 paragraphs. Describe the client, the challenge, and the solution. Shown left-column on the case study page.',
			],
			[
				'key'        => 'field_dwp_proj_services_detail',
				'label'      => 'Services Breakdown',
				'name'       => 'proj_services_detail',
				'type'       => 'repeater',
				'min'        => 0,
				'max'        => 8,
				'layout'     => 'block',
				'instructions' => 'One entry per service delivered. The icon is chosen automatically from the service name — use standard names like: Branding, Graphic Design, Web Design, Development, SEO, Digital Marketing, Copywriting, Photography.',
				'sub_fields' => [
					[
						'key'          => 'field_dwp_proj_svc_name',
						'label'        => 'Service Name',
						'name'         => 'svc_name',
						'type'         => 'text',
						'instructions' => 'e.g. Branding, Web Design, SEO, Digital Marketing',
					],
					[
						'key'   => 'field_dwp_proj_svc_body',
						'label' => 'Description',
						'name'  => 'svc_body',
						'type'  => 'textarea',
						'rows'  => 3,
						'instructions' => '2–3 sentences describing what was done for this service on this project.',
					],
				],
			],
			[
				'key'           => 'field_dwp_proj_industry',
				'label'         => 'Industry',
				'name'          => 'proj_industry',
				'type'          => 'text',
				'instructions'  => 'e.g. Home Services, Legal, Medical, Restaurant',
			],
			[
				'key'           => 'field_dwp_proj_services',
				'label'         => 'Services Delivered',
				'name'          => 'proj_services',
				'type'          => 'textarea',
				'rows'          => 2,
				'instructions'  => 'Comma-separated list of services. e.g. Custom Design, Copywriting, SEO, On-Page Optimization',
			],
			[
				'key'           => 'field_dwp_proj_img_desktop',
				'label'         => 'Desktop Screenshot (full page)',
				'name'          => 'proj_img_desktop',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'dwp-portfolio-lg',
				'instructions'  => 'Wide landscape screenshot of the full desktop layout. Ideal: 1440×900 or wider.',
			],
			[
				'key'           => 'field_dwp_proj_img_ipad',
				'label'         => 'iPad / Tablet Screenshot',
				'name'          => 'proj_img_ipad',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'instructions'  => 'Portrait screenshot showing the tablet view of the page. Ideal: 834×1194 or similar tablet size.',
			],
			[
				'key'           => 'field_dwp_proj_img_mobile',
				'label'         => 'Mobile Screenshot',
				'name'          => 'proj_img_mobile',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'instructions'  => 'Portrait screenshot showing the mobile view of the page. Ideal: 390×844 or similar phone size.',
			],
			[
				'key'           => 'field_dwp_proj_accent_color',
				'label'         => 'Project Accent Color',
				'name'          => 'proj_accent_color',
				'type'          => 'color_picker',
				'default_value' => '#C97B2A',
				'instructions'  => 'Used as the accent color on the single project page hero. Use the brand color of the project if applicable.',
			],
			[
				'key'           => 'field_dwp_proj_city',
				'label'         => 'Client City',
				'name'          => 'proj_city',
				'type'          => 'text',
				'instructions'  => 'City where the client is located. Shown as the large watermark text on the CTA band at the bottom of the project page. e.g. Dallas, Plano, Frisco',
				'default_value' => 'Dallas',
			],
		],
		'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'dwp_project' ] ] ],
	] );

	/* ─── SERVICE DETAIL PAGE ───────────────────── */
	acf_add_local_field_group( [
		'key'    => 'group_dwp_service_detail',
		'title'  => 'Service Detail Fields',
		'fields' => [
			[
				'key'          => 'field_sd_tagline',
				'label'        => 'Hero Tagline',
				'name'         => 'sd_tagline',
				'type'         => 'text',
				'instructions' => 'One-line sub-headline shown below the page title.',
			],
			[
				'key'   => 'field_sd_intro_heading',
				'label' => 'Intro Heading',
				'name'  => 'sd_intro_heading',
				'type'  => 'text',
			],
			[
				'key'          => 'field_sd_intro_body',
				'label'        => 'Intro Body',
				'name'         => 'sd_intro_body',
				'type'         => 'textarea',
				'rows'         => 6,
				'instructions' => 'Separate paragraphs with a blank line.',
			],
			[
				'key'           => 'field_sd_approach_eyebrow',
				'label'         => 'Approach Eyebrow',
				'name'          => 'sd_approach_eyebrow',
				'type'          => 'text',
				'default_value' => 'Our Approach',
			],
			[
				'key'           => 'field_sd_approach_heading',
				'label'         => 'Approach Heading',
				'name'          => 'sd_approach_heading',
				'type'          => 'text',
				'default_value' => 'Insight. Creativity. Technology.',
			],
			[
				'key'   => 'field_sd_approach_sub',
				'label' => 'Approach Subtext',
				'name'  => 'sd_approach_sub',
				'type'  => 'text',
			],
			[
				'key'        => 'field_sd_steps',
				'label'      => 'Process Steps',
				'name'       => 'sd_steps',
				'type'       => 'repeater',
				'min'        => 2,
				'max'        => 4,
				'layout'     => 'block',
				'sub_fields' => [
					[ 'key' => 'field_sd_step_title', 'label' => 'Step Title', 'name' => 'step_title', 'type' => 'text' ],
					[ 'key' => 'field_sd_step_body',  'label' => 'Description', 'name' => 'step_body', 'type' => 'textarea', 'rows' => 3 ],
				],
			],
			[ 'key' => 'field_sd_testi_quote',   'label' => 'Testimonial Quote',   'name' => 'sd_testimonial_quote',   'type' => 'textarea', 'rows' => 3 ],
			[ 'key' => 'field_sd_testi_name',    'label' => 'Author Name',          'name' => 'sd_testimonial_name',    'type' => 'text' ],
			[ 'key' => 'field_sd_testi_company', 'label' => 'Company',              'name' => 'sd_testimonial_company', 'type' => 'text' ],
			[ 'key' => 'field_sd_testi_url',     'label' => 'Company URL',          'name' => 'sd_testimonial_url',     'type' => 'url' ],
		],
		'location' => [ [ [ 'param' => 'page_template', 'operator' => '==', 'value' => 'page-service-detail.php' ] ] ],
	] );
}
