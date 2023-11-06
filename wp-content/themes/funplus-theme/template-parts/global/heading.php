<?php

/**
 * Global: Heading Prefix
 * Display the heading with the sitename to the left at an angle.
 */

$highlight = isset($args['highlight']) ? $args['highlight'] : 'span';
$heading_1 = $args['heading_1'];
$heading_2 = $args['heading_2'] ? ($highlight === 'row' ? '<span>' . $args['heading_2'] . '</span>' : fp_span_last_word($args['heading_2'])) : '';
$text = $args['text']; ?>

<div class="wow" data-wow-offset="100">
    <div class="heading fadeInUpwards" data-highlight="<?php echo esc_attr($highlight); ?>">

        <div class="heading-prefix">
            <div class="heading-prefix__prefix">
                <p class="fadeIn"><?php echo get_bloginfo('name'); ?></p>
                <div class="heading-prefix__prefix__underline uncoverFromBottom"></div>
            </div>
            <h2 class="heading-prefix__heading section-heading fadeIn">
                <?php echo $heading_1; ?>
                <?php if (isset($heading_2) && !empty($heading_2)) : ?>
                    <br><?php echo $heading_2; ?>
                <?php endif; ?>
            </h2>
        </div>

        <?php if (!empty($text)) : ?>
            <div class="description fadeIn">
                <?php echo $text; ?>
            </div>
        <?php endif; ?>

    </div>
</div>