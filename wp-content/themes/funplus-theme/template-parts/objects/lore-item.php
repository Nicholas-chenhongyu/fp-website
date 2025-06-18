<?php

$links = [
    1 => 'https://read.funplus.com/books/mansg',
    2 => 'https://read.funplus.com/books/reeddr',
    3 => 'https://read.funplus.com/books/ainsth',
    4 => 'https://read.funplus.com/books/eseasl',
    5 => 'https://read.funplus.com/books/ifeblo',
    6 => 'https://read.funplus.com/books/odleav',
    7 => 'https://read.funplus.com/books/ingsil',
    8 => 'https://read.funplus.com/books/encean',
    9 => 'https://read.funplus.com/books/druinb',
    10 => 'https://read.funplus.com/books/ehind',
];

$status = $args['status'];
$id = $args['id'];

?>

<div class="lore-inner">
    <?php if ($status == 'unlocked') : ?>
        <a href="<?php echo $links[$id] . "/LEDy2KzhEflMxoAv" ?>" target="_blank">
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/lore-unlocked.png' ?>" alt="">
        </a>
    <?php endif; ?>

    <?php if ($status == 'current') : ?>
        <div>
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/lore-current.png' ?>" alt="">
        </div>
    <?php endif; ?>

    <?php if ($status == 'locked') : ?>
        <div>
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/lore-locked.png' ?>" alt="">
        </div>
    <?php endif; ?>

</div>