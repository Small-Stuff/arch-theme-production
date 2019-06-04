<?php 
	$partner_arguments = array(
		'post_type' => 'partners',
		'posts_per_page' => -1,
		'order' => 'ASC',
		'orderby' => 'post_title',
		'tax_query' => array(
			array(
				'taxonomy' => 'partner_type',
				'field' => 'slug',
				'terms' => 'media',
				'operator' => 'NOT IN'
			)
		)
	);

	$partner_query = new WP_Query($partner_arguments);

	if( $partner_query->have_posts() ):
		while( $partner_query->have_posts() ):
			$partner_query->the_post();
			get_template_part('components/row', 'partners');
		endwhile;
		wp_reset_postdata(); # clear query
	endif; 
?>