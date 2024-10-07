<?php

$show = get_sub_field('show_this_bookshelf');
?>

<div class="container container-sm">
    <?php if ($show) : ?>
        <book-shelf bookshelfId="FC9ibjWNzvEnzHUz"></book-shelf>
        <script type="module" crossorigin src="https://bookshelf-read.funplus.com/latest/funplus-bookshelf.js"></script>
    <?php endif; ?>
</div>