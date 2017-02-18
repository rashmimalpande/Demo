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

			</div>

			<div class="pages">
				<div class="container">
					<div class="page-box">
						<div class="page-title">
							<ul>
								<li></li>
							</ul>
						</div>
						<div class="content-list">

						</div>
					</div>
				</div>
			</div>
		</main>  <!-- #main -->
	</div>  <!-- #primary -->

<?php

get_footer();
