<?php 
$id = get_the_ID(); 
$icons = get_terms_icons($id, 'event_type');
if($icons): ?>
	<?php foreach ($icons as $icon_url): ?>
		<img class="archtober_event_icon" src="<?= $icon_url ?>">
	<?php endforeach; ?>
<?php endif; ?>
