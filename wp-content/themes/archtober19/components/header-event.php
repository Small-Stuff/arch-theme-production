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
		$status .= '<span class="day_header menu_header">Upcoming Event</span>';
	elseif ($current_day == $the_date):
		$status .= '<span class="day_header menu_header">Today</span>';
	elseif ($current_day > $the_date):
		$status .= '<span class="day_header menu_header">Recent Event</span>';
	endif;

?>
<section class="event_header index_header day_<?= $day_of_week; ?>" data-silhouetteday="<?= $day_of_month ?>">
		<h1><?= $status ?>
		<a class="date_link cal_day" 
			 href="<?= get_site_url().'/#october_'.$day_of_month ?>"
			 data-targetday="<?= $day_of_month ?>">
			 <?= weekday_month_day($this_event_date) ?></a></h1>
</section>