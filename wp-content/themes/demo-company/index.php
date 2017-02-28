<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Demo_Company
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="slider">
				<div class="container">
					<div class="owl-carousel owl-theme">
						<?php if(have_posts()) : while(have_posts()): the_post() ?>
						<div>
							<?php if(has_post_thumbnail()): ?>
								<a href="<?php the_permalink(); ?>"><img class="slide" src="<?php the_post_thumbnail(); ?>"></a>
							<?php else:
								global $images, $image_id;
								$images = get_posts(array(
									 'post_type'=> 'attachment',
									 'post_mime_type' => 'image',
									 'post_parent' => get_the_ID(),
									 'posts_per_page'=> 1
								));								
							?>
								<?php if($images): 
									$image_id =  wp_get_attachment_image_src( $images[0]->ID, 'post-thumbnail');
								?>

									<a href="<?php the_permalink(); ?>"><img class="slide" src="<?php echo $image_id[0]; ?>"></a>									
								<?php endif; ?>
							<?php endif;?>
							<div class="content">
								<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
								<p><?php the_excerpt(); ?></p>
							</div>
						</div>
						<?php endwhile; endif; ?>
					</div>
				</div>
			</div>

			<div class="pages">
				<div class="container">
					<div class="page-box">
						<div class="sub-page-title">
							<ul>
								<?php wp_list_pages( array( 'title_li' => '', 'child_of' => 6 ) ); ?>
								
							</ul>
						</div>
						<div class="content-list">
					
							<div class="sub-page-col">
								<div class="sub-page-content">
									<img src="https://placehold.it/350X200">
									<h4>title</h4>
									<p>Page Excerpt</p>
								</div>
								
							</div>

							<div class="sub-page-col">
								<div class="sub-page-content">
									<img src="https://placehold.it/350X200">
									<h4>title</h4>
									<p>Page Excerpt</p>
								</div>
							</div>

							<div class="sub-page-col">
								<div class="sub-page-content">
									<img src="https://placehold.it/350X200">
									<h4>title</h4>
									<p>Page Excerpt</p>
								</div>
							</div>
						</div><!-- #contentlist-->

						
					</div>
				</div>
			</div>
		</main>  <!-- #main -->
	</div>  <!-- #primary -->

<?php

get_footer();
