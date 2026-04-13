<?php
/**
 * Seed — Blog Posts
 *
 * Creates 5 additional blog posts across Web Development, SEO,
 * Social Media, and Digital Marketing categories.
 *
 * HOW TO RUN:
 *   In Local, open your site and visit:
 *   http://dallas-web-pro.local/wp-content/themes/dallaswebpro-2/seed-blog-posts.php
 *
 *   Delete this file (or rename it) after running.
 *   Safe to re-run — skips slugs that already exist.
 */

// Bootstrap WordPress
$wp_root = dirname( dirname( dirname( dirname( __FILE__ ) ) ) );
require_once $wp_root . '/wp-load.php';

// Must be logged in as admin (or running from CLI)
if ( ! defined( 'WP_CLI' ) && ! current_user_can( 'manage_options' ) ) {
	wp_die( 'You must be logged in as an administrator to run this script.' );
}

// ── Helper ────────────────────────────────────────────────────────────
function dwp_post_exists_by_slug( string $slug ): bool {
	return (bool) get_page_by_path( $slug, OBJECT, 'post' );
}

// ── Category IDs (already exist in your install) ─────────────────────
$cat_webdev = 11;  // web-development
$cat_seo    = 16;  // seo
$cat_social = 4;   // social-media
$cat_mktg   = 3;   // digital-marketing

// ── Posts ─────────────────────────────────────────────────────────────
$posts = [

	[
		'slug'    => 'web-performance-impacts-revenue',
		'title'   => 'Speed Kills (Your Competitors): How Web Performance Directly Impacts Revenue',
		'cat'     => [ $cat_webdev ],
		'date'    => '2026-02-14 09:00:00',
		'excerpt' => 'A one-second delay in page load time can cost you 7% of conversions. Here is what we do to make our clients\' websites blazing fast — and why it matters more than ever.',
		'content' => '<p>A one-second delay in page load time can cost you 7% of conversions. For an e-commerce site doing $100,000 a month, that is $7,000 lost every single month from a single second of slowness. Web performance is not a nice-to-have — it is foundational to your revenue.</p>

<h2>Why Speed Matters More Than Ever</h2>
<p>Google uses Core Web Vitals as a direct ranking factor. That means a slow site does not just frustrate visitors — it actively costs you search visibility. Largest Contentful Paint (LCP), First Input Delay (FID), and Cumulative Layout Shift (CLS) are the three metrics Google watches closely. Every site we build at Dallas Web Pro is engineered to pass all three.</p>

<h2>What We Do Differently</h2>
<p>We start with a performance budget before we write a single line of code. Images are compressed and served in WebP format. We lazy-load everything below the fold. JavaScript is deferred so nothing blocks the critical rendering path. Our servers are configured with browser caching headers and CDN delivery.</p>

<h2>Real Numbers from Real Clients</h2>
<p>One of our home services clients went from a 68 Google PageSpeed score to a 97 after a full performance overhaul. Three months later, organic traffic was up 34% and the lead form conversion rate had climbed from 2.1% to 4.8%. Speed is not theoretical — it is money in your pocket.</p>

<h2>The Bottom Line</h2>
<p>If your website loads in more than 3 seconds on mobile, you are losing business every single day. Contact us to run a free performance audit and find out exactly how much it is costing you.</p>',
	],

	[
		'slug'    => 'local-seo-home-services-playbook',
		'title'   => 'Local SEO for Home Service Businesses: The Complete 2026 Playbook',
		'cat'     => [ $cat_seo ],
		'date'    => '2026-01-22 09:00:00',
		'excerpt' => 'If you are a plumber, HVAC tech, or electrician and you are not dominating local search, you are leaving money on the table every single day. Here is exactly how to fix that.',
		'content' => '<p>If you run a plumbing, HVAC, electrical, or any other home service business and you are not showing up at the top of local Google results, your competitors are getting the calls that should be yours. Local SEO is the highest-ROI marketing channel available to service businesses — and most are doing it wrong.</p>

<h2>Start With Your Google Business Profile</h2>
<p>Your Google Business Profile (formerly Google My Business) is the single most important local SEO asset you own. It needs to be completely filled out — every field, every category, every service. Add photos every week. Respond to every review within 24 hours. Post updates at least twice a month. Most businesses set it up once and forget it — that is a massive opportunity for you.</p>

<h2>Build Local Landing Pages That Actually Rank</h2>
<p>If you serve multiple cities, each city needs its own dedicated landing page — not a page with the city name swapped in, but a genuinely unique page with local content, local testimonials, and locally-relevant information. We build these for clients and have seen city-specific pages ranking on page one within 60 days.</p>

<h2>Get Your Citations Right</h2>
<p>Name, Address, and Phone (NAP) consistency across every directory matters. Yelp, Angi, HomeAdvisor, BBB, Thumbtack, and your Chamber of Commerce listing all need to match exactly what is on your website. Inconsistencies dilute your local authority and confuse Google.</p>

<h2>Reviews Are Currency</h2>
<p>A steady stream of new reviews signals to Google that your business is active and trusted. Build a simple follow-up system: text your customers 48 hours after a job with a direct link to your Google review page. Aim for at least 2 new reviews per week. Volume and recency both matter.</p>

<h2>Your Website Still Matters</h2>
<p>Local SEO does not replace your website — it amplifies it. Your site needs fast load times, clear service area pages, click-to-call buttons, and schema markup that tells Google what you do and where you do it. We handle all of this as part of every local SEO engagement.</p>',
	],

	[
		'slug'    => 'brand-identity-foundation-digital-strategy',
		'title'   => 'Why Your Brand Identity Is the Foundation of Every Digital Strategy',
		'cat'     => [ $cat_webdev ],
		'date'    => '2026-01-08 09:00:00',
		'excerpt' => 'Before you spend a dollar on ads or SEO, you need a brand that people trust on sight. Here is how we build identities that command authority and convert cold traffic.',
		'content' => '<p>Most small businesses skip straight to tactics — Facebook ads, Google SEO, email campaigns — without doing the foundational work first. Then they wonder why nothing converts. The answer is almost always branding. Without a clear, professional, consistent brand identity, every dollar you spend on marketing is working at half capacity.</p>

<h2>What Brand Identity Actually Means</h2>
<p>Brand identity is not just your logo. It is the visual language your business speaks across every touchpoint: your website, your social profiles, your proposal documents, your vehicle wraps. It includes your color palette, your typography, your photography style, and the tone of your copy. When all of these are aligned, people trust you faster.</p>

<h2>The Trust Equation</h2>
<p>Studies consistently show that it takes less than 50 milliseconds for a person to form an opinion about your website. That is before they read a single word. If your visual identity looks amateur, unprofessional, or inconsistent, you have already lost a significant portion of your potential customers — even if your service is excellent.</p>

<h2>How We Approach Brand Building</h2>
<p>We start every branding engagement with a discovery session: Who is your ideal customer? What do they fear? What do they want to feel when they choose you? From there, we build a brand that speaks directly to those emotional truths. Premium does not mean expensive-looking — it means clear, confident, and trustworthy.</p>

<h2>Brand Consistency Across Channels</h2>
<p>Once your brand is defined, consistency is everything. The same fonts, the same colors, the same voice — across your website, your social media, your emails, and your physical materials. We provide every client with a brand style guide so that consistency is easy to maintain, whether your team is posting on Instagram or writing a proposal.</p>

<h2>The Payoff</h2>
<p>When your brand is dialed in, everything else performs better. Your ads convert higher because people trust the landing page they arrive on. Your SEO content ranks better because it gets shared and linked to. Your close rate on proposals improves because clients already feel confident in you before the conversation starts.</p>',
	],

	[
		'slug'    => 'content-that-converts-writing-for-customers',
		'title'   => 'Content That Converts: How to Write for Your Customer, Not the Algorithm',
		'cat'     => [ $cat_social ],
		'date'    => '2025-12-18 09:00:00',
		'excerpt' => 'Most businesses write content for Google. The ones that win write content for their customers first — and let the rankings follow. Here is the framework we use for every client.',
		'content' => '<p>There is a fundamental misunderstanding in how most small businesses approach content marketing. They write for Google — stuffing in keywords, hitting word counts, optimizing meta descriptions — and then wonder why the traffic they do get never converts. Great content starts with your customer, not the algorithm.</p>

<h2>The Problem With Keyword-First Content</h2>
<p>When you write for a keyword first, you produce content that feels mechanical. It answers search queries but does not connect with human beings. People can tell immediately when content was written to rank rather than to help, and they leave. High bounce rates signal to Google that your content is not solving the problem, which ultimately hurts your rankings anyway.</p>

<h2>The Customer-First Framework</h2>
<p>Before we write a single word for a client, we map out their customer journey. What questions is someone asking before they need this service? What fears do they have? What objections are they carrying? What does making a good decision look like to them? Every piece of content we create is designed to answer one of those questions completely and authentically.</p>

<h2>Structure Matters as Much as Words</h2>
<p>Even the best content fails if people cannot read it. Short paragraphs. Bold key points. Subheadings every 200-300 words. Bullet lists for steps and features. A clear call to action at the end. Content designed for the way people actually consume information online — skimming first, reading deeply only when something catches their attention.</p>

<h2>The SEO Follows Naturally</h2>
<p>Here is the irony: content written genuinely for customers almost always ranks better than content written for algorithms. When people find it helpful, they share it, link to it, spend time on it, and come back. Those behavioral signals are exactly what Google is measuring. Solve real problems clearly, and the rankings follow.</p>

<h2>Consistency Over Perfection</h2>
<p>One outstanding piece of content a month beats four mediocre pieces every time. We would rather you publish 12 genuinely helpful articles this year than 48 padded posts that drain your team and deliver nothing. Build a content calendar you can actually sustain, and treat every piece as a long-term asset — not a checkbox.</p>',
	],

	[
		'slug'    => 'google-ads-vs-seo-which-is-right',
		'title'   => 'Google Ads vs. SEO: Which One Should You Invest In First?',
		'cat'     => [ $cat_mktg ],
		'date'    => '2025-12-05 09:00:00',
		'excerpt' => 'Both Google Ads and SEO can drive real business — but they work differently, cost differently, and suit different stages of growth. Here is how to decide which to prioritize.',
		'content' => '<p>One of the most common questions we get from business owners is simple: should I run Google Ads or invest in SEO? The honest answer is that it depends on your timeline, your budget, and your goals. But there is a logical order that works for most small businesses — and getting it wrong is an expensive mistake.</p>

<h2>Google Ads: Speed at a Price</h2>
<p>Google Ads can put your business at the top of search results tomorrow. The moment your campaign goes live, you are visible. For businesses that need leads quickly — a new launch, a seasonal push, or entering a new market — this speed is invaluable. The tradeoff is that the moment you stop paying, the traffic stops. Every lead costs money. In competitive markets, costs per click can run $15 to $50 or more.</p>

<h2>SEO: Slow Build, Lasting Returns</h2>
<p>SEO takes time — typically 4 to 12 months to see significant results in competitive markets. But what you build is yours. A page that ranks organically does not stop sending you traffic when the credit card bill is due. Over a 2-3 year horizon, the cost per lead from organic search is dramatically lower than paid ads, and the trust signals from organic rankings are stronger.</p>

<h2>The Honest Recommendation</h2>
<p>For most small businesses, we recommend running a small Google Ads campaign early to generate immediate cash flow while investing in SEO simultaneously. The ads pay the bills while the SEO compounds. Once your organic rankings are established — typically 6 to 12 months in — you can reduce ad spend dramatically while maintaining or growing your lead volume.</p>

<h2>The Budget Threshold</h2>
<p>Google Ads requires a minimum effective monthly budget to gather enough data to optimize. In most service industries, that means at least $1,000 per month — ideally $2,000 or more. If your budget is below that threshold, every dollar goes further in SEO. Do not run underpowered ad campaigns — you will not get enough data to improve them.</p>

<h2>What We Do</h2>
<p>At Dallas Web Pro, we run both channels for clients and manage them together. When your paid and organic strategies share the same keyword research, the same landing pages, and the same conversion goals, both perform better. Reach out and we will audit your current situation and give you a straight recommendation.</p>',
	],

];

// ── Run & report ──────────────────────────────────────────────────────
$created = 0;
$skipped = 0;
$log     = [];

foreach ( $posts as $p ) {
	if ( dwp_post_exists_by_slug( $p['slug'] ) ) {
		$skipped++;
		$log[] = [ 'status' => 'skipped', 'title' => $p['title'] ];
		continue;
	}

	$id = wp_insert_post( [
		'post_type'     => 'post',
		'post_title'    => $p['title'],
		'post_name'     => $p['slug'],
		'post_content'  => $p['content'],
		'post_excerpt'  => $p['excerpt'],
		'post_status'   => 'publish',
		'post_date'     => $p['date'],
		'post_category' => $p['cat'],
	], true );

	if ( is_wp_error( $id ) ) {
		$log[] = [ 'status' => 'error', 'title' => $p['title'], 'msg' => $id->get_error_message() ];
	} else {
		$created++;
		$log[] = [ 'status' => 'created', 'title' => $p['title'], 'id' => $id ];
	}
}

// ── Output ────────────────────────────────────────────────────────────
if ( PHP_SAPI !== 'cli' ) {
	header( 'Content-Type: text/html; charset=utf-8' );
	echo '<!DOCTYPE html><html><head><meta charset="utf-8">
		<title>Blog Seed Results</title>
		<style>body{font-family:system-ui,sans-serif;max-width:700px;margin:48px auto;padding:0 24px;background:#111820;color:#fff;}
		h1{color:#c8922a;margin-bottom:32px;} .ok{color:#4caf50;} .skip{color:#999;} .err{color:#f44;}
		table{width:100%;border-collapse:collapse;} td,th{padding:10px 14px;border-bottom:1px solid #333;text-align:left;}
		th{color:#c8922a;font-size:.75rem;letter-spacing:.1em;text-transform:uppercase;}
		.summary{margin-top:32px;padding:20px;background:#1c2a3a;border-radius:8px;border:1px solid rgba(200,146,42,.2);}
		a{color:#c8922a;}</style>
	</head><body>';
	echo '<h1>Blog Post Seed Results</h1>';
	echo '<table><tr><th>Status</th><th>Title</th></tr>';
	foreach ( $log as $r ) {
		$cls = $r['status'] === 'created' ? 'ok' : ( $r['status'] === 'error' ? 'err' : 'skip' );
		$lbl = $r['status'] === 'created' ? '✓ Created (ID ' . $r['id'] . ')' : ( $r['status'] === 'error' ? '✗ Error: ' . $r['msg'] : '— Skipped (exists)' );
		echo '<tr><td class="' . $cls . '">' . $lbl . '</td><td>' . esc_html( $r['title'] ) . '</td></tr>';
	}
	echo '</table>';
	echo '<div class="summary"><strong>' . $created . ' created, ' . $skipped . ' skipped.</strong><br><br>';
	echo '<a href="' . home_url( '/blog' ) . '">→ View the blog</a></div>';
	echo '<p style="color:#666;font-size:.75rem;margin-top:32px;">Delete or rename this file when done.</p>';
	echo '</body></html>';
} else {
	echo "Created: $created\nSkipped: $skipped\n";
	foreach ( $log as $r ) {
		echo '[' . strtoupper( $r['status'] ) . '] ' . $r['title'] . "\n";
	}
}
