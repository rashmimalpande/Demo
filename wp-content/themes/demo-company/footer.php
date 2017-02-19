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
				<div class="container">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'demo-company' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'demo-company' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'demo-company' ), 'demo-company', '<a href="https://automattic.com/" rel="designer">Rashmi M</a>' ); ?>
				</div><!-- .site-info -->
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
