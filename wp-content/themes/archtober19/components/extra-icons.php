<?php 
$id = get_the_ID(); 
$icons = get_terms_icons($id, 'event_type');
if($icons): ?>
	<?php foreach ($icons as $icon_url): ?>
		<img class="archtober_event_icon" 
				src="<?= $icon_url[the_icon] ?>"
				style="transform: 
								scale(<?= intval($icon_url[icon_scale])/100 ?>) 
								rotate(<?= $icon_url[icon_rotation].'deg' ?>)
								translate(<?= $icon_url[icon_x].'vw, '.$icon_url[icon_y].'vw' ?>);">
	<?php endforeach; ?>
<?php endif; ?>
