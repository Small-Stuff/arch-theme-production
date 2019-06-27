<?php if(get_field('sponsor_logo')): 
	?><?= (get_field('sponsor_website')) ? '<a class="sponsor_display_'.get_field('sponsor_display_size').'" target="_blank" href="'.get_field('sponsor_website').'"><img src="'.get_field('sponsor_logo').'"></a>' : '<img class="sponsor_display_'.get_field('sponsor_display_size').'" src="'.get_field('sponsor_logo').'">';
?><?php else: 
?><h1 class="sponsor_display_<?= get_field('sponsor_display_size') ?>"><?= (get_field('sponsor_website')) ? '<a target="_blank" href="'.get_field('sponsor_website').'">'.get_the_title().'</a>' : get_the_title() ?></h1
><?php endif; ?>