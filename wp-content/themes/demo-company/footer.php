<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 * 
 * @category  Demo
 * @package   Demo_Company
 * @author    Rashmi Malpande <rashmimalpande@gmail.com>
 * @copyright 2017 rtPanel
 * @license   **
 * @link      https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
    ?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="footer-main">
                <div class="container">
                    <div class="footer-top">
                        <div class="footer-col-1">
        <?php
        if (is_active_sidebar('footer_col_1')) {
            dynamic_sidebar('footer_col_1');
        }
        ?>
                        </div>
                        <div class="footer-col-2">
        <?php
        if (is_active_sidebar('footer_col_2')) {
            dynamic_sidebar('footer_col_2');
        }
        ?>
                        </div>
                        <div class="footer-col-3">
        <?php
        if (is_active_sidebar('footer_col_3')) {
            dynamic_sidebar('footer_col_3');
        }
        ?>
                        </div>
                        <div class="footer-col-4">
        <?php
        if (is_active_sidebar('footer_col_4')) {
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
        <?php wp_nav_menu(array( 'menu' => 'Footer Menu', 'menu_id' => 'footer-menu' )); ?>
                        </div>
                        <div class="company-info">
                            
        <?php 
                                global $copyright;
        if(get_theme_mod('footer-copyright')) : 
            $copyright = get_theme_mod('footer-copyright');
        ?>

    <p><?php echo get_theme_mod('footer-copyright'); ?></p>
        <?php else: ?>
                            <p>© 2017 Demo All Rights Reserved.</p>
        <?php endif; ?>
                        </div>

                        
                    </div>

                    <div class="footer-logo">
        <?php if(get_theme_mod('footer-logo')) : 
            $id = get_theme_mod('footer-logo');
            $url = wp_get_attachment_url($id);
            echo '<img class="pull-right" src="'.$url.'">';
        ?>
        <?php else: ?>
                                <img class="pull-right" src="<?php echo get_template_directory_uri().'/images/footer-logo.png'; ?> " width="200" height="30">
        <?php endif; ?>
                    </div>

                    
                </div><!-- .site-info -->
            </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
