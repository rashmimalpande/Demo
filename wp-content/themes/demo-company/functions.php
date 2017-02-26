<?php
/**
 * Demo Company functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Demo_Company
 */

if ( ! function_exists( 'demo_company_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function demo_company_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Demo Company, use a find and replace
	 * to change 'demo-company' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'demo-company', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'demo-company' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'demo_company_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'demo_company_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function demo_company_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'demo_company_content_width', 640 );
}
add_action( 'after_setup_theme', 'demo_company_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function demo_company_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'demo-company' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'demo-company' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'demo_company_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function demo_company_scripts() {
	wp_enqueue_style( 'demo-company-style', get_stylesheet_uri() );

	wp_enqueue_script( 'demo-company-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'demo-company-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'demo_company_scripts' );


/**
 * Register our sidebars and widgetized areas.
 *
 */
function demo_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer Column 1',
		'id'            => 'footer_col_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Column 2',
		'id'            => 'footer_col_2',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Column 3',
		'id'            => 'footer_col_3',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Column 4',
		'id'            => 'footer_col_4',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'demo_widgets_init' );

class News_Widget_Demo extends WP_Widget{
	public function __construct(){
		$widget_options = array(
			'classname'=> 'news_widget',
			'description' => 'Display posts from News Category'
		);

		parent::__construct('news_widget', 'News Widget', $widget_options);
	}

	public function form($instance){
		if($instance){
			$title = esc_attr($instance['title']);
		}
		else{
			$title = '';
		} 
?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'news_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />	
		</p>


<?php	

	}

	public function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		global $post;
		$query = new WP_Query( array('category_name' => 'news'));
		$count = 0;
		if( $query->have_posts() && $count <= 3 ){
			echo '<ul>';
			while( $query->have_posts() ){
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

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
}



/*function getNewsCategory(){
	global $post;
	$list = new WP_Query();
	$list = query('post_type=News&posts_per_page=3');
	echo '<ul>';
	while($list->have_posts()){
		$list = the_post();
		$list_item = '<li>';
		$listItem .= '<a href="' . get_permalink() . '">';
		$listItem .= get_the_title() . '</a></li>';
	}
	echo '</ul>';
	wp_reset_postdata();
}
*/

function news_widget() { 
  register_widget( 'News_Widget_Demo' );
}

add_action( 'widgets_init', 'news_widget' );

class Social_Widget_Demo extends WP_Widget{
	public function __construct(){
		$widget_options = array(
			'classname'=> 'social_widget',
			'description' => 'Social Media Links'
		);

		parent::__construct('social_widget', 'Social Widget', $widget_options);
	}

	public function form($instance){
		if($instance){
			$title = esc_attr($instance['title']);
			$facebook = esc_attr($instance['facebook']);
			$twitter = esc_attr($instance['twitter']);
			$linkedin = esc_attr($instance['linkedin']);
		}
		else{
			$title = '';
		} 
?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'social_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />	
			
			<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook', 'social_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />	
			
			<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter', 'social_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />	
			
			<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin', 'social_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $linkedin; ?>" />	
		</p>


<?php	

	}

	public function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$facebook = $instance['facebook'];
		$twitter = $instance['twitter'];
		$linkedin = $instance['linkedin'];
		echo $before_widget;
		if ( $title ) {
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

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['facebook'] = strip_tags($new_instance['facebook']);
		$instance['twitter'] = strip_tags($new_instance['twitter']);
		$instance['linkedin'] = strip_tags($new_instance['linkedin']);
		return $instance;
	}
}

function social_widget() { 
  register_widget( 'Social_Widget_Demo' );
}

add_action( 'widgets_init', 'social_widget' );

function demo_css() {
        wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'demo_css');

function demo_scripts() {
	wp_register_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'),'2.1', true);
	wp_enqueue_script('script');

}

add_action( 'wp_enqueue_scripts', 'demo_scripts' ); 

//Rigister Theme options
function demo_register_settings(){
	register_setting('demo_theme_options', 'demo_options', 'demo_options_validate'); //($option_group,setting name, sanitize )
}

add_action('admin_init', 'demo_register_settings');


$demo_options = array( 
	'footer_copyright' => '&copy;'. date('Y'). get_bloginfo('name'). 'All Right Reserved.',
	'logo' =>''
);


function demo_theme_options(){
	add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options','demo_theme_options_page');
}

add_action('admin_menu', 'demo_theme_options');

function demo_theme_options_page(){
	global $demo_options;

	if(! isset( $_REQUEST['updated'])){
		$_REQUEST['updated'] = false; 
	}?>
	<div class="wrap">
	<?php
		if(false !== $_REQUEST['updated']):
	?>
	<div><p><strong><?php _e('Options Saved'); ?></strong></p></div>
	<?php endif; ?>

	<form method="Post" action="options.php">
	<?php 
		$settings = get_option('demo_options', $demo_options); 
		settings_fields('demo_theme_options'); //parameter same as options group
	?>

	<table class="form-table">
		<tr>
			<td>Footer Copyright</td>
			<td>
				<input type="text" id="footer_copyright" name="demo_options[footer_copyright]" value="<?php esc_attr_e($settings['footer_copyright']); ?>" style="width: 300px;" >
			</td>
		</tr>
		<tr>
			<td>Header Logo</td>
			<td>
				<input type="text" id="logo_url" name="demo_options['logo']" value="<?php esc_url($settings['logo']); ?>" >
				<input type="button" id="upload_logo_button" class="button" name="demo_options['logo']" value="<?php _e('Upload Logo') ?>" >
			</td>
		</tr>
	</table>

	<p><input type="submit" value="Save Options" class="button-primary"></p>
	</form>
	</div>


<?php  

}

function demo_options_validate($input){
	global $demo_options;
	$settings = get_option('demo_options', $demo_options); 

	$input['footer_copyright'] = wp_filter_nohtml_kses( $input['footer_copyright'] );

	return $input;

}




function demo_add_theme_header_logo(){
	$defaults = array(
		'height' => 35,
		'width' => 200,
		'flex-height' => true,
		'flex-width' => true,
		'header-text' => array('site-title', 'site-dscription')
	);

	add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', demo_add_theme_header_logo);

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

require get_template_directory() . '/lib/slider/slider.php';
require get_template_directory() . '/lib/slider/slider_post_type.php';

?>