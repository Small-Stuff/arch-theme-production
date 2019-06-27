<?php 
	# get types of sponsors
	$sponsor_types = get_terms( array(
		'orderby' => 'name',
    'order' => 'ASC',
	  'taxonomy' => 'sponsor_type',
	  'hide_empty' => true,
		)
	);

	# for each sponsor type, submit query
	foreach( $sponsor_types as $sponsor_type ):
		$sponsor_arguments = array(
			'post_type' => 'sponsors',
			'posts_per_page' => -1,
			'orderby' => 'name',
    	'order' => 'ASC',
			'tax_query' => array (
				array(
					'taxonomy' => 'sponsor_type',
					'field' => 'slug',
					'terms' => $sponsor_type->slug,
					'operator' => 'IN'
				)
			)
		);
		$sponsor_query = new WP_Query($sponsor_arguments);

		if( $sponsor_query->have_posts() ): 
			?><section class="sponsor_section">
				<h1><?= $sponsor_type->name; ?></h1>
			<?php
			while( $sponsor_query->have_posts() ):
				$sponsor_query->the_post();
				get_template_part('components/row', 'sponsors');
			endwhile; ?>
			</section><?php
		wp_reset_postdata(); # clear query
		endif; 
	endforeach;
?>