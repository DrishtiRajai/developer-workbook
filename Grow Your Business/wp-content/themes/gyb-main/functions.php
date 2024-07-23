<?php
/**
 * GYB-main functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GYB-main
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gyb_main_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on GYB-main, use a find and replace
		* to change 'gyb-main' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'gyb-main', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary', 'gyb-main' ),
			'footer-meny'=> esc_html('Footer','gyb-main'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'gyb_main_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'gyb_main_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gyb_main_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gyb_main_content_width', 640 );
}
add_action( 'after_setup_theme', 'gyb_main_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gyb_main_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'gyb-main' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'gyb-main' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'gyb_main_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gyb_main_scripts() {
	wp_enqueue_style( 'gyb-main-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'gyb-main-style', 'rtl', 'replace' );

	//Slick library for slider
    wp_enqueue_style('wpex-fontawesome-custom', get_theme_file_uri('/assets/fontawesome/css/all.min.css'));
    wp_enqueue_style('wpex-poppins', get_theme_file_uri('/assets/Poppins/poppins-style.css'));
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/slick/slick.css' );
    wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() . '/slick/slick-theme.css' );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'gyb-main-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gyb_main_scripts' );

function enqueue_poppins_font() {
    wp_enqueue_style( 'poppins-font', get_template_directory_uri() . '/fonts/Poppins/poppins-style.css', array(), null );
}
add_action( 'wp_enqueue_scripts', 'enqueue_poppins_font' );




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//Shortcode for media and text in the homepage

function gyb_main_media_text_shortcode($atts) {
    // Define default attributes and values
    $atts = shortcode_atts(
        array(
            'image' => 'http://localhost/training-exercise-drishtir/wp-content/uploads/2024/06/home-media.png',       // Default empty value for image URL
            'heading' => '',     // Default empty value for heading
            'subheading' => '',  // Default empty value for subheading
            'text' => '',        // Default empty value for text content
            'button_text' => '', // Default empty value for button text
            'button_url' => '',  // Default empty value for button URL
        ),
        $atts,
        'media_text'
    );

    // Generate the shortcode output
    $output = '
    <div class="media-text">
        <div class="image-content">
            <img src="' . esc_url($atts['image']) . '" alt="Media Image" height="500px" width="700px">
        </div>
        <div class="text-content">
            <h2>' . esc_html($atts['heading']) . '</h2>
            <h3>' . esc_html($atts['subheading']) . '</h3>
            <p>' . esc_html($atts['text']) . '</p>
            <a href="' . esc_url($atts['button_url']) . '" class="btn-home-media">' . esc_html($atts['button_text']) . '</a>
        </div>
    </div>';

    return $output;
}
add_shortcode('media_text', 'gyb_main_media_text_shortcode');

//Shortcode for homepage div banner

function gyb_main_home_banner($atts) {
    // Define default attributes and values
    $atts = shortcode_atts(
        array(
            'heading' => '',     // Default empty value for heading
            'text' => '',        // Default empty value for text content
            'button_text' => '', // Default empty value for button text
            'button_url' => '',  // Default empty value for button URL
        ),
        $atts,
        'home_banner'
    );

    // Generate the shortcode output
    $output = '
	<div class="banner">
	<div class="banner-text">
	<h1> '.esc_html($atts['heading']).'</h1>
	<p> '.esc_html($atts['text']).'<p>
	<a href="' . esc_url($atts['button_url']) . '" class="btn btn-primary">' . esc_html($atts['button_text']) . '</a>	
	</div>
	</div>
    ';

    return $output;
}
add_shortcode('home_banner', 'gyb_main_home_banner');

//Homepage counter shortcode
function stats_shortcode() {
    ob_start();
    ?>
    <div class="stats-container">
        <div class="stat-item">
            <div class="stat-number">869+</div>
            <div class="stat-label">Projects Complete</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">317+</div>
            <div class="stat-label">Happy Customer</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">98%</div>
            <div class="stat-label">Success Rate</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">56+</div>
            <div class="stat-label">Awards</div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('stats', 'stats_shortcode');

// Creating custom post type for team member 

// Function to register Team Member post type (already provided in your code)
function create_team_member_post_type() {
    register_post_type('team_member',
        array(
            'labels' => array(
                'name' => __('Team Members'),
                'singular_name' => __('Team Member'),
                'add_new_item' => __('Add New Team Member'),
                // other labels...
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'menu_icon' => 'dashicons-groups',
        )
    );
}
add_action('init', 'create_team_member_post_type');

// Adding meta box for team member CPT (already provided in your code)
function add_team_member_meta_boxes() {
    add_meta_box(
        'team_member_meta_box',
        'Team Member Information',
        'team_member_meta_box_html',
        'team_member',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_team_member_meta_boxes');

// HTML for team member meta box (already provided in your code)
function team_member_meta_box_html($post) {
    $designation = get_post_meta($post->ID, '_team_member_designation', true);
    $description = get_post_meta($post->ID, '_team_member_description', true);

    wp_nonce_field('save_team_member_meta_box_data', 'team_member_meta_box_nonce');
    ?>
    <p>
        <label for="team_member_designation">Designation:</label>
        <input type="text" id="team_member_designation" name="team_member_designation" value="<?php echo esc_attr($designation); ?>" />
    </p>
    <p>
        <label for="team_member_description">Description:</label>
        <textarea id="team_member_description" name="team_member_description"><?php echo esc_textarea($description); ?></textarea>
    </p>
    <?php
}

// Save team member meta box data (already provided in your code)
function save_team_member_meta_box_data($post_id) {
    if (!isset($_POST['team_member_meta_box_nonce']) || !wp_verify_nonce($_POST['team_member_meta_box_nonce'], 'save_team_member_meta_box_data')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['team_member_designation'])) {
        update_post_meta($post_id, '_team_member_designation', sanitize_text_field($_POST['team_member_designation']));
    }

    if (isset($_POST['team_member_description'])) {
        update_post_meta($post_id, '_team_member_description', sanitize_textarea_field($_POST['team_member_description']));
    }
}
add_action('save_post', 'save_team_member_meta_box_data');

// Shortcode to display team members in a grid layout
function team_members_grid_shortcode($atts) {
    $atts = shortcode_atts(array(
        'posts_per_row' => 4, // Number of team members per row
    ), $atts);

    $args = array(
        'post_type' => 'team_member',
        'posts_per_page' => -1, // Retrieve all team members
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $output = '<div class="team-members-grid">';
        $count = 0;
		

        while ($query->have_posts()) {
            $query->the_post();

            // Get post data
            $post_id = get_the_ID();
            $name = get_the_title();
            $designation = get_post_meta($post_id, '_team_member_designation', true);
            $description = get_post_meta($post_id, '_team_member_description', true);
            $thumbnail = get_the_post_thumbnail($post_id, 'thumbnail');
            $permalink = get_permalink();

            // Output team member in grid cell
			
            $output .= '<div class="team-member">';
			
            $output .= '<div class="team-member-thumbnail">' . $thumbnail . '</div>';
            $output .= '<h3 class="team-member-name"><a href="' . $permalink . '">' . $name . '</a></h3>';
            $output .= '<p class="team-member-designation">' . $designation . '</p>';
            $output .= '<div class="team-member-description">' . $description . '</div>';
            $output .= '</div>';

            // Check if it's time to start a new row
            $count++;
            if ($count % $atts['posts_per_row'] === 0) {
                $output .= '<div style="clear:both;"></div>'; // Clear float after each row
            }
        }

        $output .= '</div>'; // Close team-members-grid
        wp_reset_postdata(); // Restore global post data
    } else {
        $output = '<p>No team members found.</p>';
    }

    return $output;
}
add_shortcode('team_members_grid', 'team_members_grid_shortcode');


// Shortcode to display brand logos in a line
function brand_logos_shortcode($atts) {
    // Shortcode attributes (if needed)
    $atts = shortcode_atts(array(
        // Define any attributes you might need, but for logos in a line, usually no specific attributes are required.
    ), $atts);

    // Array of logos (you can customize with actual URLs or paths to images)
    $logos = array(
        'http://localhost/training-exercise-drishtir/wp-content/themes/gyb-main/assets/logo-1.png',
        'http://localhost/training-exercise-drishtir/wp-content/themes/gyb-main/assets/logo-2.png',
        'http://localhost/training-exercise-drishtir/wp-content/themes/gyb-main/assets/logo-3.png',
        'http://localhost/training-exercise-drishtir/wp-content/themes/gyb-main/assets/logo-4.png',
        'http://localhost/training-exercise-drishtir/wp-content/themes/gyb-main/assets/logo-5.png',
    );

    // Output HTML for logos
    $output = '<div class="brand-logos">';
    foreach ($logos as $logo) {
        $output .= '<div class="brand-logo">';
        $output .= '<img src="' . $logo . '" alt="Brand Logo" />';
        $output .= '</div>';
    }
    $output .= '</div>';

    return $output;
}
add_shortcode('brand_logos', 'brand_logos_shortcode');

//Registering footer widget area

function my_custom_footer_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Widget Area 1', 'text_domain'),
        'id' => 'footer-1',
        'description' => __('Widgets in this area will be shown in the first column of the footer.', 'text_domain'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Widget Area 2', 'text_domain'),
        'id' => 'footer-2',
        'description' => __('Widgets in this area will be shown in the second column of the footer.', 'text_domain'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Widget Area 3', 'text_domain'),
        'id' => 'footer-3',
        'description' => __('Widgets in this area will be shown in the third column of the footer.', 'text_domain'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Widget Area 4', 'text_domain'),
        'id' => 'footer-4',
        'description' => __('Widgets in this area will be shown in the fourth column of the footer.', 'text_domain'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'my_custom_footer_widgets_init');
//Register footer Menu

function register_footer_menu() {
    register_nav_menu('footer-menu', __('Footer Menu', 'text_domain'));
}
add_action('init', 'register_footer_menu');

//Contact page contact info shortcode

function custom_three_column_shortcode( $atts, $content = null ) {
    // Parse attributes and set defaults
    $atts = shortcode_atts( array(
        'image1' => 'http://localhost/training-exercise-drishtir/wp-content/themes/gyb-main/assets/phone.png',
        'heading1' => 'Phone',
        'text1' => 'At vero eos et accusamus et iusto odio dignissimos molestiae non provident',
        'image2' => 'http://localhost/training-exercise-drishtir/wp-content/themes/gyb-main/assets/email.png',
        'heading2' => 'Email',
        'text2' => 'Similique sunt in culpa qui officia deserunt mollitia animi, id ',
        'image3' => 'http://localhost/training-exercise-drishtir/wp-content/themes/gyb-main/assets/location.png',
        'heading3' => 'Location',
        'text3' => 'PO Box 16122 Collins Street West, Victoria 8007 Australia',
    ), $atts );

    // Shortcode output
    ob_start();
    ?>
    <div class="three-column-shortcode">
        <div class="column">
            <img src="<?php echo esc_url( $atts['image1'] ); ?>" alt="Image 1">
            <h3><?php echo esc_html( $atts['heading1'] ); ?></h3>
            <p><?php echo wp_kses_post( $atts['text1'] ); ?></p>
        </div>
        <div class="column">
            <img src="<?php echo esc_url( $atts['image2'] ); ?>" alt="Image 2">
            <h3><?php echo esc_html( $atts['heading2'] ); ?></h3>
            <p><?php echo wp_kses_post( $atts['text2'] ); ?></p>
        </div>
        <div class="column">
            <img src="<?php echo esc_url( $atts['image3'] ); ?>" alt="Image 3">
            <h3><?php echo esc_html( $atts['heading3'] ); ?></h3>
            <p><?php echo wp_kses_post( $atts['text3'] ); ?></p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'three_column_shortcode', 'custom_three_column_shortcode' );
add_theme_support( 'post-thumbnails' );



