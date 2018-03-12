<?php

//* Add widget support for homepage if widgets are being used
add_action( 'genesis_meta', 'aiko_front_page_genesis_meta' );
function aiko_front_page_genesis_meta() {
 
    if ( is_active_sidebar( 'home-featured-1' ) || is_active_sidebar( 'home-featured-2' ) || is_active_sidebar( 'home-featured-3' ) || is_active_sidebar( 'home-featured-4' ) ) {
 
        //* Add Home featured Widget areas
        add_action( 'genesis_before_content_sidebar_wrap', 'aiko_home_featured', 15 );
 
    }
}
 
//* Add markup for homepage widgets
function aiko_home_featured() {
 
    printf( '<div %s>', genesis_attr( 'home-featured' ) );
    genesis_structural_wrap( 'home-featured' );
 
        genesis_widget_area( 'home-featured-1', array(
            'before'=> '<div class="home-featured-1 widget-area">',
            'after' => '</div>',
        ) );
 
        genesis_widget_area( 'home-featured-2', array(
            'before'=> '<div class="home-featured-2 widget-area">',
            'after' => '</div>',
        ) );
 
        genesis_widget_area( 'home-featured-3', array(
            'before'=> '<div class="home-featured-3 widget-area">',
            'after' => '</div>',
        ) );
 
        genesis_widget_area( 'home-featured-4', array(
            'before'=> '<div class="home-featured-4 widget-area">',
            'after' => '</div>',
        ) );
 
    genesis_structural_wrap( 'home-featured', 'close' );
    echo '</div>'; //* end .home-featured
 
}

//* Run the Genesis loop
genesis();