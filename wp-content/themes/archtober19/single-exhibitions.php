<?php
/*
Template Name: Single Exhibition
*/
?>

<?php
	$id = get_the_ID();
	$this_post = get_post( $id );
	$title = get_the_title();
	$event_date = get_field('date', false, false);
	$as_date = new DateTime($event_date);
	$event_str = $as_date->format('Y-m-d');
	$event_unix = strtotime($event_str);
	$day_of_week = date("l", $event_unix);
	$content = wpautop( $this_post->post_content );
	$current_day = new DateTime('today');

	$end_date = get_field('end_date', false, false);
	$end_as_date = new DateTime($end_date);

	$viewing_status = ($current_day > $end_as_date) ? 'exhibition_over' : '';

?>

<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="exhibition">
<?php get_template_part('components/header', 'exhibition') ?>
<section class="page_content">
	<article class="page_section">
		<h1 class="event_page_title <?= $viewing_status ?>"><?= $title ?></h1>
		<?php if(get_field('days_closed')): ?>
			<h4 class="event_info"><?= (get_field('opening_time')) ? get_field('opening_time')." – ".get_field('closing_time') : get_field('opening_time') ?></h4>
			<h4 class="event_info <?= $viewing_status ?>">
				Days Closed: 
				<?php foreach (get_field('days_closed') as $day): ?>
					<?= $day ?>
				<?php endforeach; ?>
			</h4>
		<?php endif; ?>
		<h4 class="event_info <?= $viewing_status ?>"><?= (get_field('event_endtime')) ? get_field('event_time')." – ".get_field('event_endtime') : get_field('event_time') ?></h4>
		<h4 class="event_info <?= $viewing_status ?>">Location: <?= (get_field('location_url')) ? '<a target="_blank" href="'.get_field('location_url').'">'.get_field('location').'</a>' : get_field('location'); ?></h4>
		<?php if(get_terms_str($id, 'institution')): ?>
			<h4 class="event_info <?= $viewing_status ?>">Supporting Institution: <?= get_terms_str($id, 'institution'); ?></h4>
		<?php endif; ?>
		<?php if($this_post->post_content != ''): ?>
			<section class="event_content"><?= $content ?></section>
		<?php endif ?>
	</article
	><aside class="page_section">
		<?php get_template_part('components/gallery'); ?>
	</aside>
</section>
<?php get_footer(); ?>