<?php
/**
 * Homepage — Process Section (template-parts/home/process.php)
 */
$eyebrow = dwp_opt( 'proc_eyebrow', 'How It Works' );
$heading = dwp_opt( 'proc_heading', 'Simple process. *Real results.*' );
$sub     = dwp_opt( 'proc_sub',     'From first conversation to live site — a clear path with no surprises, no scope creep, and no disappearing acts.' );
$steps   = dwp_opt( 'process_steps', [] );
$heading_html = preg_replace( '/\*(.+?)\*/', '<em>$1</em>', esc_html( $heading ) );

if ( empty( $steps ) ) {
	$steps = [
		[ 'number' => '01', 'title' => 'Discovery Call',     'body' => "We spend 30 minutes talking through your business, your goals, and what's not working online. No pitch, no pressure — just a real conversation about whether we're the right team for the job." ],
		[ 'number' => '02', 'title' => 'Scope &amp; Proposal', 'body' => 'You receive a clear scope of work, a fixed price, and a realistic timeline before anything starts. No shifting goalposts, no surprise invoices — you know exactly what you\'re getting and when.' ],
		[ 'number' => '03', 'title' => 'Design &amp; Build',   'body' => 'Your site is built with conversion baked in from the first line of code — fast performance, clean structure, and a design that earns trust before the visitor scrolls.' ],
		[ 'number' => '04', 'title' => 'Launch &amp; Grow',    'body' => 'Go live with a site built to perform from day one. Monthly SEO and maintenance retainers available for businesses ready to compound their results over time.' ],
	];
}

$delays = [ '', 'rev-d1', 'rev-d2', 'rev-d3' ];
?>

<section class="process-section" id="process" data-wm="PROCESS">
  <div class="wrap">

    <header class="process-header">
      <div>
        <?php dwp_eyebrow( $eyebrow, 'eyebrow-lt' ); ?>
        <h2 class="sec-heading sec-heading-lt">
          <?php
          // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
          echo wp_kses( $heading_html, [ 'em' => [], 'br' => [] ] );
          ?>
        </h2>
      </div>
      <p class="process-header-right"><?php echo esc_html( $sub ); ?></p>
    </header>

    <div class="process-steps">
      <?php foreach ( $steps as $i => $step ) : ?>
      <div class="proc-step reveal <?php echo esc_attr( $delays[ $i ] ?? '' ); ?>">
        <div class="proc-num" aria-hidden="true"><?php echo esc_html( $step['number'] ); ?></div>
        <h3 class="proc-title"><?php echo wp_kses_post( $step['title'] ); ?></h3>
        <p class="proc-body"><?php echo esc_html( $step['body'] ); ?></p>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
