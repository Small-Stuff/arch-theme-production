<div class="archtober_calendar">
<h1>Calendar</h1>
<?php 	
	$today = new DateTime('today');
	$today_str = $today->format('Y-m-DD');

	# override
	#$today_str = '2019-10-03';

	$day = 1;
	while ( $day <= 31):
		$day_str = ($day < 10) ? '2019-10-0'.$day : '2019-10-'.$day;

		if($day_str < $today_str):
			echo '<a href="'.get_site_url().'#october_'.$day.'" class="cal_day day_recent" id="archtober_'.$day.'" data-targetday="'.$day.'">'.$day.'</a>';
		elseif ($day_str == $today_str):
			echo '<a href="'.get_site_url().'#october_'.$day.'" class="cal_day day_current" id="archtober_'.$day.'" data-targetday="'.$day.'" data-current_day="'.$day.'">'.$day.'</a>';
		elseif ($day_str > $today_str):
			echo '<a href="'.get_site_url().'#october_'.$day.'" class="cal_day day_upcoming" id="archtober_'.$day.'" data-targetday="'.$day.'">'.$day.'</a>';
		endif;
		$day++;
	endwhile;
?>