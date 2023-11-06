<?php
if (have_rows('sections')) : ?>
    <div class="sections">
        <?php while (have_rows('sections')) :
            the_row();
            get_template_part('template-parts/sections/' . get_row_layout());
        endwhile; ?>
    </div>
<?php endif;
