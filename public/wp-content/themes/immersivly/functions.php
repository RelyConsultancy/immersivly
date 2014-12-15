<?php
/**
 * Immersivly functions and definitions
 *
 * @package Immersivly
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}

if ( ! function_exists( 'immersivly_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function immersivly_setup() {


    add_theme_support( 'post-thumbnails' );

    add_image_size( 'popular', 360, 280, true ); // (cropped)
    add_image_size( 'block', 460, 340, true ); // (cropped)


    add_image_size( 'article-phone', 460 );
    add_image_size( 'article-phone-retina', 920 );

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Immersivly, use a find and replace
     * to change 'immersivly' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'immersivly', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    //add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'immersivly' ),
        'footer' => __( 'Footer Menu', 'immersivly' )
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );

    /*
     * Enable support for Post Formats.
     * See http://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'immersivly_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
}
endif; // immersivly_setup
add_action( 'after_setup_theme', 'immersivly_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function immersivly_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'immersivly' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Overlay', 'immersivly' ),
        'id'            => 'overlay',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'immersivly_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function immersivly_scripts() {
    if ( is_page('homepage') ) {
        wp_enqueue_style( 'plugin-fullpage', get_template_directory_uri() . '/bower_components/fullpage.js/jquery.fullPage.css' );

        wp_enqueue_script( 'packery-js', get_template_directory_uri() . '/bower_components/packery/dist/packery.pkgd.min.js', array(), '1.2.4', true );

        wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/bower_components/isotope/dist/isotope.pkgd.min.js', array(), '2.0.1', true );

        wp_enqueue_script( 'packerypk-js', 'http://rawgit.com/metafizzy/isotope-packery/master/packery-mode.pkgd.js', array(), '1.2.4', true );

        wp_enqueue_script( 'fullpage-js', get_template_directory_uri() . '/bower_components/fullpage.js/jquery.fullPage.min.js', array(), '2.4.0', true );
    }

    // wp_enqueue_style( 'plugin-pagepiling', get_template_directory_uri() . '/bower_components/pagepiling.js/jquery.pagepiling.css' );
    wp_enqueue_style( 'plugin-slick-carousel', get_template_directory_uri() . '/bower_components/slick.js/slick/slick.css' );

    wp_enqueue_style( 'immersivly-style', get_template_directory_uri() . '/dist/css/app.css' );





    wp_enqueue_script( 'plugin-sharrre', get_template_directory_uri() . '/share/jquery.sharrre.min.js', array(), '1.3.5', true );

    // wp_enqueue_script( 'plugin-skrollr', get_template_directory_uri() . '/bower_components/skrollr/dist/skrollr.min.js', array(), '0.6.29', true );

    // Jquery sticky
    wp_enqueue_script( 'plugin-sticky', get_template_directory_uri() . '/bower_components/jquery-sticky/jquery.sticky.js', array(), '1.0.1', true );

    // Jquery waypoints
    wp_enqueue_script( 'plugin-waypoints', get_template_directory_uri() . '/bower_components/jquery-waypoints/waypoints.min.js', array(), '2.0.5', true );

    wp_enqueue_script( 'plugin-slick-carousel', get_template_directory_uri() . '/bower_components/slick.js/slick/slick.min.js', array(), '1.3.13', true );

    wp_enqueue_script( 'immersivly-plugins', get_template_directory_uri() . '/src/js/plugins.js', array(), '0.1', true );

    wp_enqueue_script( 'plugin-picturefill', get_template_directory_uri() . '/src/js/picturefill.js', array(), '2.2.0', true );


    wp_enqueue_script( 'immersivly-js', get_template_directory_uri() . '/dist/js/app.min.js', array('jquery'), '0.1', true );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'immersivly_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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


// Remove admin bar
add_filter('show_admin_bar', '__return_false');


add_post_meta( 68, 'article_layout', 47 );

// Limit title chars
// function max_title_length($title){
//     $max = 24;
//     return substr( $title, 0, $max ). " &hellip;";
// }
// add_filter( 'the_title', 'max_title_length');





/*
 * Gets the excerpt using the post ID outside the loop.
 *
 * @author      Withers David
 * @link        http://uplifted.net/programming/wordpress-get-the-excerpt-automatically-using-the-post-id-outside-of-the-loop/
 * @param       int $post_id
 * @return      string
 */
function get_excerpt_by_id($post_id){
    $the_post = get_post($post_id); //Gets post ID
    $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
    $excerpt_length = 35; //Sets excerpt length by word count
    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

    if (count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, '...');
        $the_excerpt = implode(' ', $words);
    endif;

    $the_excerpt = '<p>' . $the_excerpt . '</p>';
    return $the_excerpt;
}

/*
 * Builds custom HTML
 *
 * With this function, I can alter WPP's HTML output from my theme's functions.php.
 * This way, the modification is permanent even if the plugin gets updated.
 *
 * @param   array   $mostpopular
 * @param   array   $instance
 * @return  string
 */
function my_custom_popular_posts_html_list( $mostpopular, $instance ) {
    $output = '<ul class="small-block-grid-2 medium-block-grid-4">';

    // loop the array of popular posts objects
    foreach( $mostpopular as $popular ) {

        $stats = array(); // placeholder for the stats tag

        // Category option checked
        if ($instance['stats_tag']['category']) {
            $post_cat = get_the_category($popular->id);

            if ( isset( $post_cat[0] ) ) {
                $post_cat_nicename = $post_cat[0]->category_nicename;
                $post_cat = $post_cat[0]->cat_name;
            }
        }

        // Build stats tag
        if ( !empty($stats) ) {
            $stats = join( '', $stats );
        }

        $excerpt = ''; // Excerpt placeholder

        // Excerpt option checked, build excerpt tag
        if ($instance['post-excerpt']['active']) {

            $excerpt = get_excerpt_by_id( $popular->id );
            if ( !empty($excerpt) ) {
                $excerpt = '<div class="wpp-excerpt">' . $excerpt . '</div>';
            }

        }

        // Thumbnails
        if ($instance['thumbnail']) {
            $attr = array(
                'alt'   => trim( strip_tags( $excerpt ) ),
                'title' => trim( strip_tags( $popular->title ) ),
            );

            $thumbnail = get_the_post_thumbnail( $popular->id, 'popular', $attr );

            if ( !empty($thumbnail) ) {
                $thumbnail = '<span class="wpp-thumb">' . $thumbnail . '</span>';
            }
        }


        $output .= "<li>";
        $output .= "<figure class=\"thumbnail\">";
        $output .= "<ul class=\"actions no-bullet\"><li class=\"categories actions__item\">";
        $output .= '<div class="categories__item--' . $post_cat_nicename . '">';
        $output .= "<span>" . $post_cat . "</span>";
        $output .= "</div></li></ul>";
        $output .= "<a class=\"effect-opacity\" href=\"" . get_the_permalink( $popular->id ) . "\" title=\"" . esc_attr( $popular->title ) . "\">" . $thumbnail . "</a>";
        $output .= "<h6 class=\"secondary-articles__title\"><a href=\"" . get_the_permalink( $popular->id ) . "\" title=\"" . esc_attr( $popular->title ) . "\">" . $popular->title . "</a></h6>";
        $output .= "</figure></li>" . "\n";

    }

    $output .= '</ul>';

    return $output;
}

add_filter( 'wpp_custom_html', 'my_custom_popular_posts_html_list', 10, 2 );


function lm_dequeue_header_styles() {
  wp_dequeue_style('yarppWidgetCss');
}

add_action('get_footer','lm_dequeue_footer_styles');
function lm_dequeue_footer_styles() {
  wp_dequeue_style('yarppRelatedCss');
}
add_action('wp_print_styles','lm_dequeue_header_styles');

// User extra fields
add_action( 'show_user_profile', 'add_extra_social_links' );
add_action( 'edit_user_profile', 'add_extra_social_links' );

function add_extra_social_links( $user ) {
    ?>
        <h3><?php _e(' Profile Links ') ?></h3>

        <table class="form-table">
            <tr>
                <th><label for="twitter_profile">Twitter Profile</label></th>
                <td><input id="twitter_profile" type="text" name="twitter_profile" value="<?php echo esc_attr(get_the_author_meta( 'twitter_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>

            <tr>
                <th><label for="facebook_profile">Facebook Profile</label></th>
                <td><input type="text" id="facebook_profile" name="facebook_profile" value="<?php echo esc_attr(get_the_author_meta( 'facebook_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>

            <tr>
                <th><label for="google_profile">Google+ Profile</label></th>
                <td><input type="text" id="google_profile" name="google_profile" value="<?php echo esc_attr(get_the_author_meta( 'google_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>

            <tr>
                <th><label for="linkedin_profile">LinkedIn Profile</label></th>
                <td><input type="text" id="linkedin_profile" name="linkedin_profile" value="<?php echo esc_attr(get_the_author_meta( 'linkedin_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
        </table>
    <?php
}

add_action( 'personal_options_update', 'save_extra_social_links' );
add_action( 'edit_user_profile_update', 'save_extra_social_links' );

function save_extra_social_links( $user_id ) {
    update_user_meta( $user_id,'twitter_profile', sanitize_text_field( $_POST['twitter_profile'] ) );
    update_user_meta( $user_id,'facebook_profile', sanitize_text_field( $_POST['facebook_profile'] ) );
    update_user_meta( $user_id,'google_profile', sanitize_text_field( $_POST['google_profile'] ) );
    update_user_meta( $user_id,'linkedin_profile', sanitize_text_field( $_POST['linkedin_profile'] ) );
}


// Share functionality
function immersivly_social_media_buttons() {
    ob_start(); // turn on output buffering
    include(get_stylesheet_directory() . '/share/share.php');
    $share_hook = ob_get_contents(); // get the contents of the output buffer
    ob_end_clean(); //  clean (erase) the output buffer and turn off output buffering
    echo $share_hook;
}


//

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}