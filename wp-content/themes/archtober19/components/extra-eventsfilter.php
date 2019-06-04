<?php 	
	$event_types = get_terms('event_type');
?><section class="filter_nav">
	<h2>Filter by Type:</h2>
	<ul class="arch_filter_list">
		<?php foreach( $event_types as $event_type ): ?>
			<li class="arch_filter" 
					data-eventtype="<?= $event_type->slug ?>" 
					id="eventtype_<?= $event_type->slug ?>"
			><?= $event_type->name ?></li>
		<?php endforeach; ?>
	</ul>
</section>