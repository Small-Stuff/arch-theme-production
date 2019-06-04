<?= '<h2>'.get_the_content().'</h2>' ?>
<?= (get_field('sponsor_website')) ? '<a target="_blank" href="'.get_field('sponsor_website').'"><img src="'.get_field('sponsor_logo').'"></a>' : '<img src="'.get_field('sponsor_logo').'">' ?>
