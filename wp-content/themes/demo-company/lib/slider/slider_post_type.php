<?php 

    function register_slides_posttype(){
        $labels = array (
            'name' => _x('Slides', 'post type general name'),
            'singular_name' => _x('Slide', 'post type singular name'),
            'add_new' => __('Add New Slide'),
            'add_new_item' => __('Add New Slide'),
            'edit_item' => __('Edit Slide'),
            'new_item' => __('New Slide'),
            'view_item' => __('View Slide'),
            'search_items'      => __( 'Search Slides' ),
            'not_found'         => __( 'Slide' ),
            'not_found_in_trash'=> __( 'Slide' ),
            'parent_item_colon' => __( 'Slide' ),
            'menu_name'         => __( 'Slides' )
        );

        $taxonomies = array();
        $supports = array('title', 'thumbnail');
        
    }



?>