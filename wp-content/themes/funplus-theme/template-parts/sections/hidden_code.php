<?php

/**
 * Unlock Chest
 * Displays the chest unlock form and lore.
 */

// Heading
$title = get_sub_field('hidden_code_title');
$content = get_sub_field('hidden_code_content');
$loreCurrent = get_sub_field('hidden_code_current');

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing';

// Lore
$loreStatus = array_fill(1, 10, 'locked');

for ($i = 1; $i < $loreCurrent; $i++) {
    $loreStatus[$i] = 'unlocked';
}
$loreStatus[$loreCurrent] = 'current';

?>

<section class="section hidden-code-section <?php echo empty($bg) ? $spacing : ''; ?>">
    <div class="container container-sm ">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="hidden-code-block">
                    <h4><?php echo $title; ?></h4>
                    <div class="description">
                        <?php echo $content; ?>
                    </div>

                    <div class="form-wrapper">
                        <form class="hidden-code-form" method="post" action="">
                            <div class="form-group">
                                <input class="form-control" type="text" name="code" placeholder="Type your hidden code">
                                <input type="hidden" name="current_lore" value="<?php echo $loreCurrent; ?>">
                                <input type="hidden" name="form_nonce" value="<?php echo esc_attr(wp_create_nonce('hidden_code_nonce')); ?>">
                                <input type="hidden" name="action" value="hidden_code_submit" />
                            </div>
                            <div class="form-submit">

                                <button type="submit" class="btn btn-light btn-plus btn-plus-orange btn-plus-reverse">
                                    <span class="btn__text">Submit</span>

                                    <span class="btn__background">
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8">
                <div class="lore-block">

                    <?php

                    foreach ($loreStatus as $key => $value) :
                        echo '<div class="lore-item lore-' . $value . '">';
                        get_template_part('template-parts/objects/lore', 'item', array(
                            'status' => $value,
                            'id' => $key
                        ));
                        echo '</div>';
                    endforeach;
                    ?>

                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(() => {
            initHiddenCodeSubmit()
        })
    </script>
</section>