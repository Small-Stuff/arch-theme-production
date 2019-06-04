<?php 
	$this_event_date = get_field('date', false, false); 
	date_default_timezone_set('US/Eastern');
	$the_date = new DateTime($this_event_date);
	$date_str = $the_date->format('Y-m-d');
	$date_unix = strtotime($date_str);
	$day_of_week = date("l", $date_unix);


	$day_of_month = $the_date->format('j');

	$current_day = new DateTime('today');
	$status = '';
	if($current_day < $the_date):
		$status .= '<span class="day_header">Upcoming Event</span>';
	elseif ($current_day == $the_date):
		$status .= '<span class="day_header">Today</span>';
	elseif ($current_day > $the_date):
		$status .= '<span class="day_header">Recent Event</span>';
	endif;

?>
<section class="event_header menu_header index_header day_<?= $day_of_week; ?>" data-silhouetteday="<?= $day_of_month ?>">
		<h1><?= $status ?> <?= weekday_month_day($this_event_date) ?></h1>
		<?php get_template_part('components/extra', 'icons') ?>
</section>