<?php
/**
 * Demo Company functions and definitions
 *
 * @category  Demo
 * @package   Demo_Company
 * @author    Rashmi Malpande <rashmimalpande@gmail.com>
 * @copyright 2017 rtPanel 
 * @license   **
 * @link      https://developer.wordpress.org/themes/basics/theme-functions/
 */

if (! function_exists('Demo_Company_setup') ) :
    /**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
    function Demo_Company_setup() 
    {
         /*
          * Make theme available for translation.
          * Translations can be filed in the /languages/ directory.
          * If you're building a theme based on Demo Company, use a find and replace
          * to change 'demo-company' to the name of your theme in all the template files.
          */
         load_theme_textdomain('demo-company', get_template_directory() . '/languages');

         // Add default posts and comments RSS feed links to head.
         add_theme_support('automatic-feed-links');

         /*
          * Let WordPress manage the document title.
          * By adding theme support, we declare that this theme does not use a
          * hard-coded <title> tag in the document head, and expect WordPress to
          * provide it for us.
          */
         add_theme_support('title-tag');

         /*
          * Enable support for Post Thumbnails on posts and pages.
          *
          * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
          */
         add_theme_support('post-thumbnails');

         // This theme uses wp_nav_menu() in one location.
         register_nav_menus(
             array(
             'menu-1' => esc_html__('Primary', 'demo-company'),
             ) 
         );

         /*
          * Switch default core markup for search form, comment form, and comments
          * to output valid HTML5.
          */
         add_theme_support(
             'html5', array(
             'search-form',
             'comment-form',
             'comment-list',
             'gallery',
             'caption',
             ) 
         );

         // Set up the WordPress core custom background feature.
         add_theme_support(
             'custom-background', apply_filters(
                 'demo_company_custom_background_args', array(
                 'default-color' => 'ffffff',
                 'default-image' => '',
                 ) 
             ) 
         );

         // Add theme support for selective refresh for widgets.
         add_theme_support('customize-selective-refresh-widgets');
    }
endif;
add_action('after_setup_theme', 'Demo_Company_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function Demo_Company_Content_width() 
{
    $GLOBALS['content_width'] = apply_filters('Demo_Company_Content_width', 640);
}
add_action('after_setup_theme', 'Demo_Company_Content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function Demo_Company_Widgets_init() 
{
    register_sidebar(
        array(
        'name'          => esc_html__('Sidebar', 'demo-company'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'demo-company'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        ) 
    );
}
add_action('widgets_init', 'Demo_Company_Widgets_init');

/**
 * Enqueue scripts and styles.
 */
function Demo_Company_scripts() 
{
    wp_enqueue_style('demo-company-style', get_stylesheet_uri());

    //wp_enqueue_script( 'demo-company-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script('demo-company-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments') ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'Demo_Company_scripts');


/**
 * Register our sidebars and widgetized areas.
 */
function Demo_Widgets_init() 
{

    register_sidebar(
        array(
        'name'          => 'Footer Column 1',
        'id'            => 'footer_col_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        ) 
    );

    register_sidebar(
        array(
        'name'          => 'Footer Column 2',
        'id'            => 'footer_col_2',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        ) 
    );

    register_sidebar(
        array(
        'name'          => 'Footer Column 3',
        'id'            => 'footer_col_3',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        ) 
    );

    register_sidebar(
        array(
        'name'          => 'Footer Column 4',
        'id'            => 'footer_col_4',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        ) 
    );

}
add_action('widgets_init', 'Demo_Widgets_init');

/**
 * News Widget for Footer
 *
 * @category  Demo
 * @package   Demo_Company
 * @author    Rashmi Malpande <rashmimalpande@gmail.com>
 * @copyright 2017 rtPanel 
 * @license   **
 * @link      https://developer.wordpress.org/themes/basics/theme-functions/
 */

class News_Widget_Demo extends WP_Widget
{
    /**
      * Register a widget with name & description
    */
    public function __construct()
    {
        $widget_options = array(
         'classname'=> 'News_widget',
         'description' => 'Display posts from News Category'
        );

        parent::__construct('News_widget', 'News Widget', $widget_options);
    }
    
    /**
      * Create a form to display in widget
    */
    public function form($instance)
    {
        if ($instance) {
            $title = esc_attr($instance['title']);
        } else {
            $title = '';
        } 
        ?>

        <p>
         <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'News_widget'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />    
     </p>


    <?php	

    }
    
    /**
      * Widget front end to be displayed in theme
    */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        echo $before_widget;
        if ($title ) {
            echo $before_title . $title . $after_title;
        }

        global $post;
        $query = new WP_Query(array('category_name' => 'news'));
        $count = 0;
        if ($query->have_posts() && $count <= 3 ) {
            echo '<ul>';
            while ( $query->have_posts() ) {
                $query->the_post();
                $list_item = '<li>';
                $list_item .= '<a href="' . get_permalink() . '">';
                $list_item .= get_the_title() . '</a></li>';
                echo $list_item;
                $count++;
            }
        }
        echo '</ul>';
        wp_reset_postdata();
        echo $after_widget;
    }

    /**
      * Update the widget & database after modifying
    */
    function update($new_instance, $old_instance) 
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
}


/**
 * Register News Widget
 */
function News_widget() 
{ 
    register_widget('News_Widget_Demo');
}

add_action('widgets_init', 'News_widget');

/**
 * Social Widget for Footer
 *
 * @category  Demo
 * @package   Demo_Company
 * @author    Rashmi Malpande <rashmimalpande@gmail.com>
 * @copyright 2017 rtPanel 
 * @license   **
 * @link      https://developer.wordpress.org/themes/basics/theme-functions/
 */
class Social_Widget_Demo extends WP_Widget
{
    /**
      * Register a widget with name & description
    */
    public function __construct()
    {
        $widget_options = array(
         'classname'=> 'Social_widget',
         'description' => 'Social Media Links'
        );

        parent::__construct('Social_widget', 'Social Widget', $widget_options);
    }

    /**
      * Create a form to display in widget
    */
    public function form($instance)
    {
        if ($instance) {
            $title = esc_attr($instance['title']);
            $facebook = esc_attr($instance['facebook']);
            $twitter = esc_attr($instance['twitter']);
            $linkedin = esc_attr($instance['linkedin']);
        } else {
            $title = '';
        } 
        ?>

        <p>
         <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'Social_widget'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />    
            
      <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook', 'Social_widget'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />    
            
      <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter', 'Social_widget'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />    
            
      <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin', 'Social_widget'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $linkedin; ?>" />    
     </p>


    <?php	

    }
    
    /**
      * Widget front end to be displayed in theme
    */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $linkedin = $instance['linkedin'];
        echo $before_widget;
        if ($title ) {
            echo $before_title . $title . $after_title;
        }
        
        $fb_profile = '<a href=" '. $facebook . '"><i class="fa fa-facebook"></i> Facebook</a>';
        $tw_profile = '<a href=" '. $twitter . '"><i class="fa fa-twitter"></i>Twitter</a>';
        $lk_profile = '<a href=" '. $linkedin . '"><i class="fa fa-linkedin"></i>linkedIn</a>';

        echo '<ul>';
        echo '<li>'. $fb_profile. '</li>';
        echo '<li>'. $tw_profile. '</li>';
        echo '<li>'. $lk_profile. '</li>';
        echo '</ul>';
        echo $after_widget;
    }

    /**
      * Update the widget & database after modifying
    */
    function update($new_instance, $old_instance) 
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['facebook'] = strip_tags($new_instance['facebook']);
        $instance['twitter'] = strip_tags($new_instance['twitter']);
        $instance['linkedin'] = strip_tags($new_instance['linkedin']);
        return $instance;
    }
}

/**
 * Register Social Widget
 */
function Social_widget() 
{ 
    register_widget('Social_Widget_Demo');
}

add_action('widgets_init', 'Social_widget');

/**
 * Enqueue Styles
 */
function Demo_css() 
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/lib/bootstrap.min.css');
    wp_enqueue_style('owl.carousel', get_template_directory_uri(). '/lib/owl.carousel.min.css');
    wp_enqueue_style('owl.theme.default', get_template_directory_uri(). '/lib/owl.theme.default.min.css');
    wp_enqueue_style('animate', get_template_directory_uri(). '/lib/animate.css');
    wp_enqueue_style('owl', get_template_directory_uri(). '/lib/owl.carousel.css');            
}
add_action('wp_enqueue_scripts', 'Demo_css');

/**
 * Enqueue Scripts
 */
function Demo_scripts() 
{
    wp_register_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'));    
    wp_enqueue_script('script');
    wp_enqueue_script('bootstrap', get_template_directory_uri(). '/lib/bootstrap.min.js');
    wp_enqueue_script('owl', get_template_directory_uri(). '/lib/owl.carousel.min.js');
    
}

add_action('wp_enqueue_scripts', 'Demo_scripts'); 




/**
 *  Customizer options for header logo
 */
function Demo_Add_Theme_Header_logo()
{
    $defaults = array(
    'height' => 35,
    'width' => 200,
    'flex-height' => true,
    'flex-width' => true,
    'header-text' => array('site-title', 'site-dscription')
    );

    add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', Demo_Add_Theme_Header_logo);

/**
 * Change post excerpt length
 */
function Custom_Excerpt_length( $length ) 
{
    return 20;
}
add_filter('excerpt_length', 'Custom_Excerpt_length', 999);

/* Bootstrap Navigation Menu */
require_once 'wp_bootstrap_navwalker.php';

 /* Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



?>