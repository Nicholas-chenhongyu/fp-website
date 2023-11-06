<?php

/**
 * Contact
 * Show a contact form and social icons.
 */

// Content
$heading = get_sub_field('subheading');
$form = get_sub_field('contact_form'); ?>

<section class="section contact">
    <div class="container">
        <h2 class="subheading"><?php echo $heading; ?></h2>

        <div class="row">
            <div class="col-12 col-md-7 col-lg-8">
                <?php echo do_shortcode('[contact-form-7 id="' . $form . '"]'); ?>
            </div>
            <div class="col-3 col-lg-2 offset-2 d-none d-md-block">
                <?php get_template_part('template-parts/global/social-icons', 'null', ['show_labels' => true, 'color' => '#FF5A00', 'alt_color' => '#000000']); ?>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
jQuery(document).ready(function($) {
    $("#subject").change(function() {

        switch ($(this).find(":selected").text()) {
            case 'Customer Support':
                $("#email_recipient").val('support@kingsgroupgames.com');
                break
            case 'General Inquiry':
                $("#email_recipient").val('support@kingsgroupgames.com');
                break
            case 'Press':
                $("#email_recipient").val('press@funplus.com');
                break
            case 'Careers':
                $("#email_recipient").val('careers@funplus.com');
                break
            case 'Business Development':
                $("#email_recipient").val('bizdev@funplus.com');
                break
            case 'Investment':
                $("#email_recipient").val('investment@funplus.com');
                break
            case 'Data Protection':
                $("#email_recipient").val('privacyoffice@funplus.com');
                break

        }
    });
});
    
</script>