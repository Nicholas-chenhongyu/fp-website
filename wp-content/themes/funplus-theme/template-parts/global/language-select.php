<?php 
$languages = get_field('language_select', 'option');
if(!$languages) return;

foreach($languages as $language){
  if($language['current']){
    $current = $language;
  } else {
    $links[] = $language;
  }
}
?>

<div class="dropdown show language-select">
  <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php echo wp_get_attachment_image($current['flag'], 'thumbnail'); ?>
    <?php echo $current['title']; ?>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <?php foreach($links as $link) : ?>
      <a class="dropdown-item" href="<?php echo $link['url']; ?>" target="_blank">
      <?php echo wp_get_attachment_image($link['flag'], 'thumbnail'); ?>
      <?php echo $link['title']; ?>
      </a>
    <?php endforeach; ?>
  </div>
</div>