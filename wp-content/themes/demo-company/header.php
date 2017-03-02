<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Demo_Company
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'demo-company' ); ?></a>
	<?php if( get_header_image() ): ?>
		<header id="masthead" class="site-header" role="banner" style="background: url('<?php header_image(); ?>')">
	<?php else: ?>
		<header id="masthead" class="site-header" role="banner">
	<?php endif; ?>
				

				<nav id="site-navigation" class="navbar navbar-default" role="navigation">

					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#demo-navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>  
							</button>

							<div class="site-branding pull-left">
								<?php
								if ( has_custom_logo() && function_exists(the_custom_logo)) : 
									the_custom_logo();
								?>
								<?php else : ?>
									<a class="custom-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="custom-logo" src="<?php echo get_template_directory_uri().'/images/logo.png'; ?> " width="200" height="30"></a>
								<?php
								endif; ?>

								
							</div><!-- .site-branding -->
						</div>
										
					
					<?php 
					
						wp_nav_menu( array(
							'menu'              => 'menu-1',
							'theme_location'    => 'menu-1',
							'depth'             => 3,
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'demo-navbar',
							'menu_class'        => 'nav navbar-nav',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						);
					
					?>
					</div>
				</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
