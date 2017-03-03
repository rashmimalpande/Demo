<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @category  Demo
 * @package   Demo_Company
 * @author    Rashmi Malpande <rashmimalpande@gmail.com>
 * @copyright 2017 rtPanel
 * @license   **
 * @link      https://codex.wordpress.org/Template_Hierarchy
 */
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="slider">
                <div class="container">
                    <div class="owl-carousel owl-theme">
        <?php 
                             $count = 0;
        if(have_posts()) : while(have_posts() && $count < 5): the_post(); 
                        
        ?>
        <div>
        <?php if(has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>"><img class="slide" src="<?php the_post_thumbnail(); ?>"></a>
        <?php else:
                                global $images, $image_id;
                                $images = get_posts(
                                    array(
                                     'post_type'=> 'attachment',
                                     'post_mime_type' => 'image',
                                     'post_parent' => get_the_ID(),
                                     'posts_per_page'=> 1
                                    )
                                );                                
        ?>
                                <?php if($images) : 
                                    $image_id =  wp_get_attachment_image_src($images[0]->ID, 'post-thumbnail');
                                ?>

                                    <a href="<?php the_permalink(); ?>"><img class="slide" src="<?php echo $image_id[0]; ?>"></a>                                    
                                <?php endif; ?>
        <?php endif;?>
        <div class="content">
                                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                <p><?php the_excerpt(); ?></p>
        </div>
        </div>
        <?php $count++; ?>
        <?php endwhile; 
        endif; ?>
                    </div>
                </div>
            </div>

            <div class="pages">
                <div class="container">
                    <div class="page-box">
                        <div class="sub-page-title">
                            <ul>
                                <?php wp_nav_menu(array('menu'=> 'Display', 'menu_id'=> 'display' )) ?>
                                
                            </ul>
                        </div>

        <?php $pages = wp_get_nav_menu_items('Display'); ?>

                        <div class="content-list" id="page-menu-item-<?php echo $pages[0]->ID ?>">
        <?php
                                $ids = get_post_meta($pages[0]->ID, '_menu_item_object_id', false);
                                
                                $args = array(
                                    'post_parent' => $ids[0],
                                    'post_type' => 'page',
                                    'orderby' => 'menu_order'
                                );
                                
                                global $child_query;

                                $child_query = new WP_Query($args);
                                $page_count = 0;
        ?>

                                <?php while ( $child_query->have_posts() && $page_count < 3 ) : $child_query->the_post(); ?>
                                    <div class="sub-page-col">
                                        <div class="sub-page-content">
            <?php the_post_thumbnail(); ?>
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
            <?php $page_count++; ?>
                                <?php endwhile; ?>
                        </div>

        <?php $pages = wp_get_nav_menu_items('Display'); ?>
                        <div class="content-list" id="page-menu-item-<?php echo $pages[1]->ID ?>">
        <?php
                                $ids = get_post_meta($pages[1]->ID, '_menu_item_object_id', false);
                                $args = array(
                                    'post_parent' => $ids[0],
                                    'post_type' => 'page',
                                    'orderby' => 'menu_order'
                                );
                                global $child_query;

                                $child_query = new WP_Query($args);
                                $page_count = 0;
        ?>

                                <?php while ( $child_query->have_posts() && $page_count < 3 ) : $child_query->the_post(); ?>
                                    <div class="sub-page-col">
                                        <div class="sub-page-content">
            <?php the_post_thumbnail(); ?>
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
            <?php $page_count++; ?>
                                <?php endwhile; ?>
                        </div>
                    
        <?php $pages = wp_get_nav_menu_items('Display'); ?>                        
                        <div class="content-list" id="page-menu-item-<?php echo $pages[2]->ID ?>">
        <?php
                                $ids = get_post_meta($pages[2]->ID, '_menu_item_object_id', false);                            
                                $args = array(
                                    'post_parent' => $ids[0],
                                    'post_type' => 'page',
                                    'orderby' => 'menu_order'
                                );
                                global $child_query;

                                $child_query = new WP_Query($args);
                                $page_count= 0;
        ?>

                                <?php while ( $child_query->have_posts() && $page_count < 3) : $child_query->the_post(); ?>
                                    <div class="sub-page-col">
                                        <div class="sub-page-content">
            <?php the_post_thumbnail(); ?>
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
            <?php $page_count++; ?>
                                <?php endwhile; ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>  <!-- #main -->
    </div>  <!-- #primary -->

<?php

get_footer();
