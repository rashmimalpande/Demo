<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Demo_Company
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="footer-main">
				<div class="container">
					<div class="footer-top">
						<div class="footer-col-1">
							<?php
								if(is_active_sidebar('footer_col_1')){
									dynamic_sidebar('footer_col_1');
								}
							?>
						</div>
						<div class="footer-col-2">
							<?php
								if(is_active_sidebar('footer_col_2')){
									dynamic_sidebar('footer_col_2');
								}
							?>
						</div>
						<div class="footer-col-3">
							<?php
								if(is_active_sidebar('footer_col_3')){
									dynamic_sidebar('footer_col_3');
								}
							?>
						</div>
						<div class="footer-col-4">
							<?php
								if(is_active_sidebar('footer_col_4')){
									dynamic_sidebar('footer_col_4');
								}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="site-info">
				<div class="container footer-info">
					<div class="footer-bottom">
						<div class="footer-nav">
							<?php wp_nav_menu( array( 'menu' => 'Footer Menu', 'menu_id' => 'footer-menu' ) ); ?>
						</div>
						<div class="company-info">
							<p>Copyright - 2011 rtPanel. All Rights Reserved.</p>
						</div>

						
					</div>

					<div class="footer-logo">
							<img src="http://placehold.it/100X100">
					</div>

					
				</div><!-- .site-info -->
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
