<?php 	
	$partner_types = get_terms('partner_type');
?><section class="filter_nav">
	<h2>Filter by Partner Type:</h2>
	<ul class="arch_filter_list">
		<?php foreach( $partner_types as $partner_type ): ?>
			<li class="arch_filter" 
					data-eventtype="<?= $partner_type->slug ?>" 
					id="eventtype_<?= $partner_type->slug ?>"
			><?= $partner_type->name ?></li>
		<?php endforeach; ?>
	</ul>
</section>