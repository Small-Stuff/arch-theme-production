<?php 

	$yesterday = new DateTime('yesterday');
	$yesterday_str = $yesterday->format('Y-m-DD');
	$today = new DateTime('today');
	$today_str = $today->format('Y-m-DD');
	$day_int = 1;
	$recent_events = false;
	$upcoming_events = false;

	#override
	#$yesterday_str = '2019-10-02';
	#$today_str = '2019-10-03';
	# echo '<br>'.$yesterday_str.' '.$today_str;

	while( $day_int <= 31):
		$date_str = ($day_int < 10) ? '2019-10-0'.$day_int : '2019-10-'.$day_int;
		$date_unix = strtotime($date_str);
		$day_of_week = date("l", $date_unix);


		# recent events section
		if($date_str <= $yesterday_str && $recent_events == false): ?>
			<section class="archtober_event_section <?= ($today_str >= '2019-11-01') ? 'archtober_over' : '' ?>" id="recent_events">
				<button class="section_title">Past Events</button>
			<?php $recent_events = true;
		endif;

		# current events section
		if($date_str == $today_str && $recent_events == true): ?>
			</section><section class="archtober_event_section" id="todays_events">
			<h1 class="section_title">Today&rsquo;s Events</h1>
		<?php elseif ($date_str == $today_str && $recent_events == false): ?>
			<section class="archtober_event_section" id="todays_events">
			<h1 class="section_title">Today&rsquo;s Events</h1>
		<?php endif;

		# upcoming events section
		if($date_str > $today_str && $upcoming_events == false): ?>
			<section class="archtober_event_section" id="upcoming_events">
			<h1 class="section_title">Upcoming Events</h1>
			<?php $upcoming_events = true;
		endif;

		$days_events_arguments = array(
			'post_type' => 'events',
			'posts_per_page' => -1,
			'meta_key' => 'date',
			'meta_query' => array (
					'relation' => 'AND',
					'current_day' => array (
						'key' => 'date',
						'value' => $date_str,
						'compare' => '=',
						'type' => 'DATE'
					),
					'current_event_time' => array (
						'key' => 'event_time',
						'compare' => 'EXISTS'
					),
			),
			'order' => 'ASC',
			'orderby' => 'current_event_time'
		);
		$days_events = new WP_Query($days_events_arguments);
		?>
			<article class="archtober_day day_<?= $day_of_week ?>" id="october_<?= $day_int ?>">
			<h1 class="current_day"><?= $day_of_week ?>, Oct. <?= $day_int ?></h1>
		<?php
		if( $days_events->have_posts() ):
			while( $days_events->have_posts() ):
				$days_events->the_post();
				get_template_part('components/blocks', 'event');
			endwhile;
		else:
			# echo "currently no events";
		endif;
		?>
		</article>
		<?php
		
		if($date_str == $today_str):
			echo '</section>';
		endif;

		$day_int++;
	endwhile;
?>
</section>