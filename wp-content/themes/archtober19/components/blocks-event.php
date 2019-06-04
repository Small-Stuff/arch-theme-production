<section class="arch_event_block event_block_<?= get_terms_str_slug($id, 'event_type') ?>">
	<?php $id = get_the_ID(); ?>
	<h5 class="event_type event_type_<?= get_terms_str_slug($id, 'event_type') ?>"><a class="event_type_filter" href="<?= get_post_type_archive_link('events') ?>" data-eventtype="<?= get_terms_str_slug($id, 'event_type') ?>"><?= get_terms_str($id, 'event_type'); ?></a></h5>
	<h2><a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a></h2>
	<p class="block_event_location"><?= (get_field('location_url')) ? '<a target="_blank" href="'.get_field('location_url').'">'.get_field('location').'</a>' : get_field('location'); ?></p>
	<p><?= (get_field('event_endtime')) ? get_field('event_time')." – ".get_field('event_endtime') : get_field('event_time') ?></p>

	<?php if(get_terms_str_slug($id, 'event_type') == 'building-of-the-day' && get_field('featured_image')): ?>
		<?= '<img src="'.get_field('featured_image').'">' ?>
	<?php endif; ?>
	<?= (get_field('event_external_link_url')) ? '<a class="event_link" target="_blank" href="'.get_field('event_external_link_url').'">'.get_field('event_external_link').'</a>' : '<span class="event_link">'.get_field('event_external_link').'</span>' ?>
	<a class="block_link" href="<?= get_permalink(); ?>"></a>
	<?php get_template_part('components/extra', 'icons') ?>
</section>