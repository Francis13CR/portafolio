<?php



//Para agregar menús personalizados
function register_menus(){
    register_nav_menus([
        'NavBar' => __('NavBar'),
        'menu_secundario' => __('Secondary menu'),
    ]);
}
add_action('init','register_menus');

function home(){
	if (is_front_page()) {
    echo do_shortcode('[smartslider3 slider="2"]');
  }
    
}
add_action( 'hestia_after_header_hook', 'home' );

function ocultar_footer_categoria() {
    if (is_category('progra')) {
        remove_action('wp_footer', 'hestia_do_footer');
    }
}
add_action('init', 'ocultar_footer_categoria');


function change_related_posts_title() {
    return 'Proyectos relacionados:';
}
add_filter( 'hestia_related_posts_title', 'change_related_posts_title' );

add_filter( 'hestia_single_post_meta','child_hestia_single_post_meta_function' );

function child_hestia_single_post_meta_function() {
    return sprintf(
        /* translators: %1$s is Author name wrapped, %2$s is Date*/
        esc_html__( 'Publicado por %1$s en %2$s', 'hestia-pro' ),
        /* translators: %1$s is Author name, %2$s is Author link*/
        sprintf(
            '<a href="%2$s" class="vcard author"><strong class="fn">%1$s</strong></a>',
            esc_html( get_the_author_meta( 'display_name', get_post_field ('post_author') ) ),
            esc_url( get_author_posts_url( get_post_field ('post_author') ) )
        ),
        /* translators: %s is Date */
        sprintf(
            '<time class="date updated published" datetime="%2$s">%1$s</time>',
            esc_html( get_the_time( get_option( 'date_format' ) ) ), esc_html( get_the_date( DATE_W3C ) )
        )
    );
}

add_filter( 'hestia_blog_post_meta','child_hestia_blog_post_meta_function' );

function child_hestia_blog_post_meta_function() {
    return sprintf(
        /* translators: %1$s is Author name wrapped, %2$s is Time */
        esc_html__( 'Por %1$s, %2$s', 'hestia-pro' ),
        /* translators: %1$s is Author name, %2$s is author link */
        sprintf(
            '<a href="%2$s" title="%1$s" class="vcard author"><strong class="fn">%1$s</strong></a>',
            esc_html( get_the_author() ),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
        ),
        sprintf(
        /* translators: %1$s is Time since post, %2$s is author Close tag */
            esc_html__( 'Hace %1$s %2$s', 'hestia-pro' ),
            sprintf(
            /* translators: %1$s is Time since, %2$s is Link to post */
                '<a href="%2$s"><time>%1$s</time>',
                esc_html( human_time_diff( get_the_modified_time( 'U' ), current_time( 'timestamp' ) ) ),
                esc_url( get_permalink() )
            ),
            '</a>'
        )
    );
}

 

//Para agregar librerias
function my_libraries(){
    wp_enqueue_style('slicknav_styles','https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.0/slicknav.min.css',[],'1.0.0',true);
    wp_enqueue_script('slicknav_script','https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.0/jquery.slicknav.js',[],'1.0.0',true);
    wp_enqueue_script('waypoints_script', 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js', ['jquery'], '4.0.1', true);
    wp_enqueue_script('scripts',get_stylesheet_directory_uri().'/assets/js/scripts.js',['jquery', 'slicknav_script', 'waypoints_script'],'1.0.0',true);

}
add_action('wp_enqueue_scripts','my_libraries');


