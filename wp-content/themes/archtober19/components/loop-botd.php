<?php 

	$botd_arguments = array(
		'post_type' => 'events',
		'posts_per_page' => -1,
		'meta_key' => 'date',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'event_type',
				'field' => 'slug',
				'terms' => 'building-of-the-day	',
				'operator' => 'IN'
			)
		)
	);

	$botd_list = new WP_Query($botd_arguments); # get all events by day for silhouttes
	$today = new DateTime('today');
	$today_str = $today->format('Y-m-d');
?>
	<section class="botd_list">
<?php 

	if( $botd_list->have_posts() ): 
		while( $botd_list->have_posts() ):
			$botd_list->the_post();
				$event_date = get_field('date', false, false);
				$as_date = new DateTime($event_date);
				$day_of_month = $as_date->format('j');
				$event_str = $as_date->format('Y-m-d');
				if(get_field('silhouette')): ?>
					<img class="botd_image botd_hidden" style="transform:translate(<?= get_field('silhouette_horizontal_position').'vw, '.get_field('silhouette_vertical_position').'vh' ?>);" src="<?= get_field('silhouette') ?>" data-silhouetteday="<?= $day_of_month ?>">
				<?php
				endif;
		endwhile; ?>
		<?php
	  wp_reset_postdata();
	endif;
	if(get_field('archtober_logo', 'option')): ?>
	<img class="archtober_logo botd_hidden" src="<?= get_field('archtober_logo', 'option'); ?>" />
	<?php endif; ?>

		<div class="botd_filter"></div>
	</section>