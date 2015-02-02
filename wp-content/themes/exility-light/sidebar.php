    <div class="content-ins">
        <div class="bottom-widget">
            <?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
	            <?php dynamic_sidebar( 'footer-left' ); ?>
            <?php endif; // end sidebar widget area ?>
        </div>
	
        <div class="bottom-widget">
            <?php if ( is_active_sidebar( 'footer-middle' ) ) : ?>
	            <?php dynamic_sidebar( 'footer-middle' ); ?>
            <?php endif; // end sidebar widget area ?>	
        </div>
	
        <div class="bottom-widget">
            <?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
	            <?php dynamic_sidebar( 'footer-right' ); ?>
            <?php endif; // end sidebar widget area ?>   
        </div>
    </div><!-- /.row -->