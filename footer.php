</main><!-- /#main-content -->

<footer class="site-footer" role="contentinfo">
  <div class="wrap">

    <div class="footer-top">

      <!-- Brand column -->
      <div>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="<?php bloginfo( 'name' ); ?> — Home">
          <img
            class="site-logo-img site-logo-img--footer"
            src="<?php echo esc_url( get_template_directory_uri() . '/images/dallas-web-pro-logo-web-clear.png' ); ?>"
            alt="<?php bloginfo( 'name' ); ?>"
            width="160"
            height="60"
          >
        </a>
        <p class="footer-brand-p">
          <?php dwp_opt_e( 'footer_tagline', 'A web development and digital marketing agency building and growing the online presence of small businesses.' ); ?>
        </p>
      </div>

      <!-- Services column -->
      <div>
        <p class="footer-col-title"><?php esc_html_e( 'Services', 'dallaswebpro' ); ?></p>
        <ul class="footer-links">
          <li><a href="<?php echo esc_url( home_url( '/web-development' ) ); ?>">Web Development</a></li>
          <li><a href="<?php echo esc_url( home_url( '/seo-services' ) ); ?>">Search Engine Optimization</a></li>
          <li><a href="<?php echo esc_url( home_url( '/social-media' ) ); ?>">Social Media &amp; Content</a></li>
        </ul>
      </div>

      <!-- Company column -->
      <div>
        <p class="footer-col-title"><?php esc_html_e( 'Company', 'dallaswebpro' ); ?></p>
        <ul class="footer-links">
          <li><a href="<?php echo esc_url( home_url( '/work' ) ); ?>">Our Work</a></li>
          <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">About Us</a></li>
          <li><a href="<?php echo esc_url( home_url( '/about#process' ) ); ?>">Our Process</a></li>
          <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a></li>
          <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
        </ul>
      </div>

      <!-- Contact column -->
      <div>
        <p class="footer-col-title"><?php esc_html_e( 'Contact', 'dallaswebpro' ); ?></p>
        <ul class="footer-links">
          <li>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Start a Project</a>
          </li>
          <?php
          $email = dwp_opt( 'contact_email', 'contact@dallaswebpro.com' );
          if ( $email ) :
          ?>
          <li>
            <a href="mailto:<?php echo esc_attr( $email ); ?>">
              <?php echo esc_html( $email ); ?>
            </a>
          </li>
          <?php endif; ?>
          <?php
          $location = dwp_opt( 'contact_location', 'Allen, TX 75013' );
          if ( $location ) :
          ?>
          <li>
            <span style="color: var(--dw-slate); font-size: 13px;">
              <?php echo esc_html( $location ); ?>
            </span>
          </li>
          <?php endif; ?>
        </ul>
      </div>

    </div><!-- /.footer-top -->

    <div class="footer-bottom">
      <span class="footer-copy">
        &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Dallas Web Pro.
        <?php esc_html_e( 'All rights reserved.', 'dallaswebpro' ); ?>
      </span>
      <span class="footer-tagline">
        <?php dwp_opt_e( 'footer_tagline_italic', 'Built to perform. Designed to convert.', 'text' ); ?>
      </span>
    </div>

  </div><!-- /.wrap -->
</footer><!-- /.site-footer -->

<?php wp_footer(); ?>
</body>
</html>
