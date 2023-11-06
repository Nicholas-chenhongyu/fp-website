<?php

/**
 * AJAX Load More
 */

$title = isset($args['title']) ? $args['title'] : 'Load more';
$load_args = htmlspecialchars(json_encode(isset($args['load_args']) ? $args['load_args'] : []));
?>

<div class="text-center">
    <button type="button" class="btn btn-text btn-plus btn-plus-orange btn-plus-right load-more" data-args="<?php echo esc_attr($load_args); ?>">
        <svg class="btn__icon" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.945 7.55828H15.8478C14.7433 7.55828 13.8485 6.66347 13.8485 5.55894V3.46174C13.8485 1.70009 12.4224 0.26001 10.6467 0.26001C8.88508 0.26001 7.445 1.68611 7.445 3.46174V5.55894C7.445 6.66347 6.55019 7.55828 5.44566 7.55828H3.34846C1.58681 7.55828 0.146729 8.98438 0.146729 10.76C0.146729 12.5217 1.57283 13.9617 3.34846 13.9617H5.44566C6.55019 13.9617 7.445 14.8565 7.445 15.9611V18.0583C7.445 19.8199 8.8711 21.26 10.6467 21.26C12.4084 21.26 13.8485 19.8339 13.8485 18.0583V15.9611C13.8485 14.8565 14.7433 13.9617 15.8478 13.9617H17.945C19.7066 13.9617 21.1467 12.5356 21.1467 10.76C21.1467 8.98438 19.7206 7.55828 17.945 7.55828Z" fill="currentColor"/>
        </svg>
        
        <span class="btn__text">
            <?php echo $title; ?>
        </span>
    </button>
</div>