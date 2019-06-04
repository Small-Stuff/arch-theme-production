<?php 
	$images = get_field('gallery');
if( $images ): ?>
  <?php foreach( $images as $image ): ?>
  	<img src="<?= $image['sizes']['custom']; ?>" alt="<?= $image['alt']; ?>" 
  	/><p class="image_caption"><?= $image['caption']; ?></p>
  <?php endforeach; ?>
<?php endif; ?>

