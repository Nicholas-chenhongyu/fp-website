<?php
$classes = $args['classes'] ?? '';

$btn_id = str_replace('.', '', uniqid('btnChevron_'));
?>

<button class="btn-chevron <?= $classes; ?>" id="<?php echo esc_attr($btn_id); ?>">
    <svg class="chevron" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
        <g>
            <line class="chevron-line-1" x1="12" x2="21" y1="7" y2="16"></line>
            <line class="chevron-line-2" x1="21" x2="12" y1="16" y2="25"></line>
        </g>
    </svg>
</button>

<script type="text/javascript">
    jQuery(document).ready(() => {
        initBtnChevron('<?php echo $btn_id; ?>');
    });
</script>