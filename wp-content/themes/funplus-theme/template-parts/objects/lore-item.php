<?php

$code = [
    1 => 'Griffin',
    2 => 'Corpsehead cove',
    3 => 'Whispershell',
    4 => 'The eye sees through time',
    5 => 'Ancient order',
    6 => 'F',
    7 => 'G',
    8 => 'H',
    9 => 'I',
    10 => 'J'
];

$links = [
    1 => 'https://read.funplus.com/books/mansg',
    2 => 'https://read.funplus.com/books/2',
    3 => 'https://read.funplus.com/books/3',
    4 => 'https://read.funplus.com/books/4',
    5 => 'https://read.funplus.com/books/5',
    6 => 'https://read.funplus.com/books/6',
    7 => 'https://read.funplus.com/books/7',
    8 => 'https://read.funplus.com/books/8',
    9 => 'https://read.funplus.com/books/9',
    10 => 'https://read.funplus.com/books/10',
];

$status = $args['status'];
$id = $args['id'];

?>

<div class="lore-inner">
    <?php if ($status == 'unlocked') : ?>
        <a href="<?php echo $links[$id] ?>" target="_blank">
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/lore-unlocked.png' ?>" alt="">
        </a>
    <?php endif; ?>

    <?php if ($status == 'current') : ?>
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/lore-current.png' ?>" alt="">
    <?php endif; ?>

    <?php if ($status == 'locked') : ?>
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/lore-locked.png' ?>" alt="">
    <?php endif; ?>

</div>