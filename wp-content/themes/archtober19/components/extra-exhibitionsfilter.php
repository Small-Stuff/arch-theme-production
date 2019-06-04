<?php 	
	$institution_types = get_terms('institution');
?><section class="filter_nav">
	<h2>Filter by Institution:</h2>
	<ul class="arch_filter_list">
		<?php foreach( $institution_types as $institution_type ): ?>
			<li class="arch_filter" 
					data-eventtype="<?= $institution_type->slug ?>" 
					id="eventtype_<?= $institution_type->slug ?>"
			><?= $institution_type->name ?></li>
		<?php endforeach; ?>
	</ul>
</section>