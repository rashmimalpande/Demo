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
						<div class="owl-item"><img src="http://placehold.it/800X350?text=Slide%200"></div>
						<div class="owl-item"><img src="http://placehold.it/800X350?text=Slide%201"></div>
						<div class="owl-item"><img src="http://placehold.it/800X350?text=Slide%202"></div>
						<div class="owl-item"><img src="http://placehold.it/800X350?text=Slide%203"></div>
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
