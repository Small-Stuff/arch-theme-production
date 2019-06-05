<?php
/*
Template Name: Single Event
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
	$day_of_week = date("l", $event_unix); # for color coding
	$content = wpautop( $this_post->post_content );
?>

<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="event">
<?php get_template_part('components/header', 'event') ?>
<section class="page_content">
	<article class="page_section day_<?= $day_of_week ?>">
		<h5 class="event_type event_type_<?= get_terms_str_slug($id, 'event_type') ?>"><a class="event_type_filter" href="<?= get_post_type_archive_link('events') ?>" data-eventtype="<?= get_terms_str_slug($id, 'event_type') ?>"><?= get_terms_str($id, 'event_type'); ?></a></h5>
		<h1 class="event_page_title event_page_<?= get_terms_str_slug($id, 'event_type'); ?>"><?= $title ?></h1>
		<h4 class="event_info"><?= (get_field('event_endtime')) ? get_field('event_time')." – ".get_field('event_endtime') : get_field('event_time') ?></h4>
		<h4 class="event_info"><?= (get_field('location_url')) ? '<a target="_blank" href="'.get_field('location_url').'">'.get_field('location').'</a>' : get_field('location'); ?></h4>
		<?php if(get_field('featured_image')): ?>
			<img class="event_featured_image" src="<?= get_field('featured_image') ?>">
		<?php endif ?>
		<?php if($this_post->post_content != ''): ?>
			<section class="event_content"><?= $content ?></section>
		<?php endif ?>
	</article
	><aside class="page_section">
		<?php get_template_part('components/gallery'); ?>
	</aside>	
</section>

<?php get_footer(); ?>