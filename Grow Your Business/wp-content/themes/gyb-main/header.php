<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GYB-main
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="/path/to/fontawesome-free-X.X.X/css/all.min.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'gyb-main' ); ?></a>

    <header id="masthead" class="site-header">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="contact-info">
                <a href="mailto:Alitstudios@gmail.com">Alitstudios@gmail.com</a>
                <span>|</span>
                <a href="tel:+112345678910">+1123 456 78910</a>
            </div>
        </div>
        
        <!-- Main Header -->
        <div class="main-header">
            <div class="site-branding">
                <?php
                the_custom_logo();
                $gyb_main_description = get_bloginfo( 'description', 'display' );
                if ( $gyb_main_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo $gyb_main_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary-menu',
                        'menu_class'     => 'menu',
                    )
                );
                ?>
            </nav><!-- #site-navigation -->
        </div><!-- .main-header -->
    </header><!-- #masthead -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
