<?php
/*
Template Name: Front Page
*/
get_header();
?>

<div class="hero-banner">
    <div class="hero-slider">
        <!-- Slide 1 -->
        <div class="slide slide-1">
            <div class="hero-content">
                <h1 class="grow">Grow Your</h1>
                <h1>Business With Us</h1>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
                <div class="hero-buttons">
                    <a href="#learn-more" class="btn btn-primary">Learn More</a>
                    <a href="#contact-us" class="btn btn-secondary">Contact Us</a>
                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="slide slide-2">
            <div class="hero-content">
                <h1>Innovate and Succeed</h1>
                <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>
                <div class="hero-buttons">
                    <a href="#learn-more" class="btn btn-primary">Learn More</a>
                    <a href="#contact-us" class="btn btn-secondary">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shortcode Usage -->
<div class="media-text-section">
    <?php echo do_shortcode('[media_text  heading="Our Best Figures" subheading="We Believe In The Best" text="Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." button_text="Learn More" button_url="http://example.com"]'); ?>
</div>
<!-- Shortcode Usage -->
<div class="home-banner-section">
    <?php echo do_shortcode('[home_banner  heading="Compatible for any device" text="Cesis is 100% responsive, it will adapt to the screen of the device the user is currently using, if you find the automatic responsive option to not be perfect you can easily adjust them." button_text="PURCHASE NOW" button_url="http://example.com"]'); ?>
</div>

<!-- Shortcode Usage -->
<div class="home-counter-section">
    <?php echo do_shortcode('[stats]'); ?>
</div>
<h1 class="team-member-heading">Meet The Team</h1>

<!-- Shortcode Usage -->
<div class="home-team-section">
    <?php echo do_shortcode('[team_members_grid]'); ?>
</div>

<!-- Shortcode Usage -->
<div class="home-brand-logo">
    <?php echo do_shortcode('[brand_logos]'); ?>
</div>


<?php
wp_enqueue_script('slider', get_template_directory_uri() . '/js/slider.js', array(), '1.0', true);
get_footer();
?>
