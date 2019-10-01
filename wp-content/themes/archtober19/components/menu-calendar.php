<div class="archtober_calendar">
<h1>Calendar</h1>
<span class="weekday">S</span
><span class="weekday">M</span
><span class="weekday">T</span
><span class="weekday">W</span
><span class="weekday">T</span
><span class="weekday">F</span
><span class="weekday">S</span><br>
<?php 	
	date_default_timezone_set('America/New_York');
	$yesterday = new DateTime('yesterday');
	$today = new DateTime('today');
	$today_str = $today->format('Y-m-d');

	$today_unix = strtotime($today_str);
	$today_sequence = date('Y-m-d', $today_unix);




	# override
	#$today_str = '2019-10-03';

	$day = 1;
	while ( $day <= 31):
		date_default_timezone_set('America/New_York');
		$date_str = ($day < 10) ? '2019-10-0'.$day : '2019-10-'.$day;
		$date_unix = strtotime($date_str);
		$day_of_week = date("l", $date_unix);

		$date_sequence = date('Y-m-d', $date_unix);


		if($date_sequence < $today_sequence):
			echo '<a href="'.get_site_url().'/#october_'.$day.'" class="cal_day day_recent" id="archtober_'.$day.'" data-targetday="'.$day.'">'.$day.'</a>';
		elseif ($date_sequence == $today_sequence):
			echo '<a href="'.get_site_url().'/#october_'.$day.'" class="cal_day day_current" id="archtober_'.$day.'" data-targetday="'.$day.'" data-current_day="'.$day.'">'.$day.'</a>';
		elseif ($date_sequence > $today_sequence):
			echo '<a href="'.get_site_url().'/#october_'.$day.'" class="cal_day day_upcoming" id="archtober_'.$day.'" data-targetday="'.$day.'">'.$day.'</a>';
		endif;
		$day++;
	endwhile;
?>
</div>