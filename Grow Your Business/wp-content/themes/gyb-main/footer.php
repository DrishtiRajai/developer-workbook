<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GYB-main
 */

?>
<head><link rel="stylesheet" href="/path/to/fontawesome-free-X.X.X/css/all.min.css"></head>

	<footer id="colophon" class="site-footer">
    <div class="footer-widgets-container">
        <div class="footer-widget-column">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <?php dynamic_sidebar('footer-1'); ?>
            <?php endif; ?>
        </div>
        <div class="footer-widget-column">
            <?php if (is_active_sidebar('footer-2')) : ?>
                <?php dynamic_sidebar('footer-2'); ?>
            <?php endif; ?>
        </div>
        <div class="footer-widget-column">
            <?php if (is_active_sidebar('footer-3')) : ?>
                <?php dynamic_sidebar('footer-3'); ?>
            <?php endif; ?>
        </div>
        <div class="footer-widget-column">
            <?php if (is_active_sidebar('footer-4')) : ?>
                <?php dynamic_sidebar('footer-4'); ?>
            <?php endif; ?>
        </div>
    </div>
	<div class="site-footer-bottom">
        <p>Built with WP Theme by Alitstudio</p>
        <nav class="footer-navigation">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer-menu',
                    'menu_class'     => 'footer-menu',
                )
            );
            ?>
        </nav>
    </div>
</footer>

	


<?php wp_footer(); ?>

</body>
</html>
