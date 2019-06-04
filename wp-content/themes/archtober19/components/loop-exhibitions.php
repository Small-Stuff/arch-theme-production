<?php 
	$institution_types = get_terms( array(
		'orderby' => 'name',
		'order' => 'ASC',
	  'taxonomy' => 'institution',
	  'hide_empty' => true,
		)
	);

	?>
	<?php get_template_part('components/extra', 'exhibitionsfilter') ?>
	<section class="index_section_titles index_exhibitions">
		<h2 class="index_section_title section_three event_title mobile_hide">Exhibition Title</h2>
		<h2 class="index_section_title section_three mobile_hide">Institution</h2>
		<h2 class="index_section_title section_three mobile_hide">Dates</h2>
		<h2 class="index_section_title mobile_reveal">Exhibitions</h2>
	</section>
	<section class="index_sections">
	<?php
	foreach($institution_types as $institution_type):
		$index_arguments = array(
			'post_type' => 'exhibitions',
			'posts_per_page' => -1,
			'meta_query' => array(
				'relation' => 'AND',
				'current_day' => array (
					'key' => 'date',
					'compare' => '=',
					'type' => 'DATE'
				),
				'current_exhibition_time' => array (
					'key' => 'opening_time',
					'compare' => 'EXISTS'
				)
			),
			'tax_query' => array (
				array(
					'taxonomy' => 'institution',
					'field' => 'slug',
					'terms' => $institution_type->slug,
					'operator' => 'IN'
				)
			),
			'orderby' => array(
				'current_day' => 'DESC',
				'current_exhibition_time' => 'DESC'
			)
		);

		$index_query = new WP_Query($index_arguments);
		
		if( $index_query->have_posts() ):
			
			while( $index_query->have_posts() ):
				$index_query->the_post();
				get_template_part('components/row', 'exhibitions');
			endwhile;
			wp_reset_postdata();
		else:
			echo "There are currently no exhibitions.";
		endif; 
		endforeach;
?>
	</section>