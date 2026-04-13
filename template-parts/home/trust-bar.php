<?php /* template-parts/home/trust-bar.php */ ?>
<?php
$items = dwp_opt( 'trust_items', [] );

if ( empty( $items ) ) {
	$items = [
		[ 'stat' => '50+',    'label' => 'Sites Launched',    'icon' => '<rect x="4" y="9" width="30" height="20" rx="2" stroke="white" stroke-width="1.4"/><path d="M4 15h30" stroke="white" stroke-width="1.4"/><circle cx="10" cy="12" r="1.5" fill="white"/><circle cx="15.5" cy="12" r="1.5" fill="white"/>' ],
		[ 'stat' => '10+ Yrs','label' => 'Experience',        'icon' => '<circle cx="19" cy="19" r="13" stroke="white" stroke-width="1.4"/><path d="M19 11v8l5.5 3" stroke="white" stroke-width="1.4" stroke-linecap="round"/>' ],
		[ 'stat' => '5-Star', 'label' => 'Rated',             'icon' => '<path d="M19 6l3.27 6.63 7.31 1.06-5.29 5.15 1.25 7.27L19 22.77l-6.54 3.34L13.71 18.84 8.42 13.69l7.31-1.06L19 6z" stroke="white" stroke-width="1.4" stroke-linejoin="round"/>' ],
		[ 'stat' => 'Results','label' => 'Results-First',     'icon' => '<path d="M19 7C12.37 7 7 12.37 7 19s5.37 12 12 12 12-5.37 12-12S25.63 7 19 7z" stroke="white" stroke-width="1.4"/><path d="M14 19l3.5 3.5 7-8" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>' ],
		[ 'stat' => '6',      'label' => 'Full-Service Agency','icon' => '<rect x="6" y="10" width="26" height="18" rx="2" stroke="white" stroke-width="1.4"/><path d="M12 16h14M12 21h10" stroke="white" stroke-width="1.4" stroke-linecap="round"/><circle cx="29" cy="26" r="5" fill="#1C2B3A" stroke="white" stroke-width="1.3"/><path d="M27 26l1.5 1.5 2.5-2.5" stroke="white" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round"/>' ],
	];
}
?>
<div class="trust-bar" role="list" aria-label="Agency credentials">
  <div class="trust-bar-inner">
    <?php foreach ( $items as $i => $item ) :
      if ( $i > 0 ) echo '<div class="trust-div" aria-hidden="true"></div>';
    ?>
    <div class="trust-item" role="listitem">
      <svg class="trust-icon" viewBox="0 0 38 38" fill="none" aria-hidden="true">
        <?php
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo wp_kses( $item['icon'], [ 'path' => [ 'd'=>true,'stroke'=>true,'stroke-width'=>true,'stroke-linecap'=>true,'stroke-linejoin'=>true,'fill'=>true ], 'circle' => [ 'cx'=>true,'cy'=>true,'r'=>true,'stroke'=>true,'stroke-width'=>true,'fill'=>true ], 'rect' => [ 'x'=>true,'y'=>true,'width'=>true,'height'=>true,'rx'=>true,'stroke'=>true,'stroke-width'=>true,'fill'=>true ] ] );
        ?>
      </svg>
      <div class="trust-text">
        <strong><?php echo esc_html( $item['stat'] ); ?></strong>
        <span><?php echo esc_html( $item['label'] ); ?></span>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
