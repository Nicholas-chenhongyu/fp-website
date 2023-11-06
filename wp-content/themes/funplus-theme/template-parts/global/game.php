<div class="games-list__game <?php echo $args['index'] % 2 == 0 ? 'gamesListOdd' : 'gamesListEven'; ?>">
    <?php if (!empty(get_field('list_background'))) :
        echo wp_get_attachment_image(get_field('list_background'), ['1300', '600'], '', ['class' => 'games-list__game__background wow zoomIn']);
    endif; ?>
    <div class="games-list__game__inner">
        <div class="games_list__game__inner__top">
            <h3><?php echo get_the_title(); ?></h3>
            <?php if (has_excerpt()) : ?>
                <div class="games-list__game__excerpt"><?php echo get_the_excerpt(); ?></div>
            <?php endif; ?>
        </div>
        <div class="games_list__game__inner__bottom">
            <?php get_template_part('template-parts/global/btn-plus', '', ['button' => ['title' => 'View game', 'url' => get_the_permalink()], 'tag' => 'a', 'classes' => 'btn-primary btn-plus-white']); ?>
        </div>
    </div>
</div>