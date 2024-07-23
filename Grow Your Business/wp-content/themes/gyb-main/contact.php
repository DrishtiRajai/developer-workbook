<?php
/*
Template Name: Contact
*/
get_header();
?>

<div class="contact-banner">

            
                <h1 >Contact</h1>
</div>

<!-- Shortcode Usage -->
<div class="contact-section">
    <?php echo do_shortcode('[three_column_shortcode]'); ?>
</div>
<div class="contact-form-slider">
    <form id="contact-form">
	<h2>Send Us A Message</h2>

        <div class="form-row">
            <div>
                <input type="text" name="name" id="name" placeholder="Name" required>
            </div>
            <div>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
        </div>
        <p>
            <input type="text" name="subject" id="subject" placeholder="Subject" required>
        </p>
        <p>
            <textarea name="message" id="message" placeholder="Messsage" required></textarea>
        </p>
        <p>
            <input type="submit" name="submit_contact_form" value="Send">
        </p>
    </form>
	</div>         
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.5502400691807!2d-73.86715141752622!3d40.749921097613694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25fbb73bd9fb7%3A0x1f69fe193d1b974e!2sRoosevelt%20Ave%2C%20Queens%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1718691794604!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	
<div class="home-brand-logo">
<?php echo do_shortcode('[brand_logos]'); ?>
</div>
<?php
get_footer();
?>