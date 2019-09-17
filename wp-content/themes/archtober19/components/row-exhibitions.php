<?php 
	$id = get_the_ID(); 
	$start_date = get_field('date', false, false);
	$start_as_date = new DateTime($start_date);
	$start_day = $start_as_date->format('M j');
	$end_date = get_field('end_date', false, false);
	$end_as_date = new DateTime($end_date);
	$end_day = $end_as_date->format('M j');

	$current_day = new DateTime('today');
	$viewing_status = ($current_day > $end_as_date) ? 'exhibition_over' : '';

?><a class="index_section <?= $viewing_status ?>" 
		 href="<?= get_permalink(); ?>"
		 data-eventtype='<?= get_terms_array_slug($id, 'institution') ?>'
	>
	<h3 class="index_section_title section_three event_title"><?= get_the_title(); ?></h3>
	<h3 class="index_section_title section_three event_title index_mobile_small">
		<?php if(get_terms_str($id, 'institution')): ?>
			<?= get_terms_str($id, 'institution'); ?>
		<?php endif; ?>		
	</h3>
	<h3 class="index_section_title event_date section_three event_title index_mobile_small"><?= $start_day."–".$end_day ?></h3>
</a>