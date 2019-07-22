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
	$external_link = get_field('event_external_link', false, false);
	$external_link_url = get_field('event_external_link_url', false, false);
	$content = wpautop( $this_post->post_content );
?>

<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="event">
<?php get_template_part('components/header', 'event') ?>
<div class="event_header_icon">
	<?php get_template_part('components/extra', 'icons') ?>
</div>
<section class="page_content">
	<article class="page_section day_<?= $day_of_week ?>">
		<h5 class="event_type event_type_<?= get_terms_str_slug($id, 'event_type') ?>"><a class="event_type_filter" href="<?= get_post_type_archive_link('events') ?>" data-eventtype="<?= get_terms_str_slug($id, 'event_type') ?>"><?= get_terms_str($id, 'event_type'); ?></a></h5>
		<h1 class="event_page_title event_page_<?= get_terms_str_slug($id, 'event_type'); ?>"><?= $title ?></h1>
		<h4 class="event_info"><?= (get_field('event_endtime')) ? get_field('event_time')." – ".get_field('event_endtime') : get_field('event_time') ?></h4>
		<h4 class="event_info"><?= (get_field('location_url')) ? '<a target="_blank" href="'.get_field('location_url').'">'.get_field('location').'</a>' : get_field('location'); ?></h4>
		<!-- EXTERNAL LINK -->
		<?php if(get_field('event_external_link') && get_field('event_external_link_url')): ?>
			<a class="individual_link event_link" href="<?= $external_link_url ?>"><?= $external_link ?></a>
		<?php elseif (get_field('event_external_link')): ?>
			<span class="individual_link event_link"><?= $external_link ?></span>
		<?php endif; ?>
		<!-- ORGANIZED BY -->
		<?php if(get_field('partner')): ?>
			<h4 class="event_info event_org"> Organized by:<br>
			<?php foreach(get_field('partner') as $post): ?>
				<?php setup_postdata($post); ?>
				<?= the_title(); ?><br>
			<?php endforeach; ?>
			</h4>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<!-- ARCHITECT (OPTIONAL) -->
		<?php if(get_field('architects')): ?>
			<div class="event_type bod_architects"><?= wpautop(get_field('architects')) ?></div>
		<?php endif; ?>

		<?php if(get_field('featured_image')): ?>
			<!-- <img class="event_featured_image" src="<?= get_field('featured_image') ?>"> -->
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