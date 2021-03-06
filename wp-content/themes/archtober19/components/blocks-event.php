<section class="arch_event_block event_block_<?= get_terms_str_slug($id, 'event_type') ?> <?= get_terms_height($id, 'event_type'); ?>">
	<?php $id = get_the_ID(); ?>
	<!-- EVENT TYPE -->
	<h5 class="event_type event_type_<?= get_terms_str_slug($id, 'event_type') ?>"><a class="event_type_filter" href="<?= get_post_type_archive_link('events') ?>" data-eventtype="<?= get_terms_str_slug($id, 'event_type') ?>"><?= get_terms_str($id, 'event_type'); ?></a></h5>
	<!-- EVENT NAME -->
	<h2><a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a></h2>
	<!-- EVENT TIME -->
	<p style="text-transform: uppercase;"><?php $event_time = str_replace(':00', '', (get_field('event_endtime')) ? str_replace(['am', 'pm'], '', get_field('event_time'))."–".get_field('event_endtime') : get_field('event_time'));   ?><?= $event_time ?></p>
	<!-- EVENT LOCATION -->
	<!-- <p class="block_event_location"><?= get_field('location'); ?></p> -->
	<?php 
		$terms = get_terms_str_slug($id, 'event_type');
		if(strpos($terms, 'building-of-the-day') !== false): 
	?>
		<?php if(get_field('architects')): ?>
			<p class="block_event_org"><?= get_field('architects') ?></p>
		<?php endif; ?>
	<?php else: ?>
		<!-- ORGANIZED BY -->
		<?php if(get_field('partner')): ?>
			<p class="block_event_org"> Organized by:<br>
			<?php $partner_amount = count(get_field('partner')); ?>
			<?php foreach(get_field('partner') as $key=>$partner): ?>
				<?= get_the_title( $partner->ID ); ?><?= ($key + 1 < $partner_amount) ? ";" : "" ?><br>
			<?php endforeach; ?>
			</p>
		<?php endif; ?>
	<?php endif; ?>
	<!-- EVENT BOD IMAGE FEATURE -->
	<?php 
		if(strpos($terms, 'building-of-the-day') !== false && get_field('featured_image')):
	?><?= '<img src="'.get_field('featured_image')['sizes']['medium_large'].'">' ?>
	<?php endif; ?>
	<!-- EVENT REGISTER -->
	<?= (get_field('event_external_link_url')) ? '<a class="event_link" target="_blank" rel="noopener noreferrer" href="'.get_field('event_external_link_url').'">'.get_field('event_external_link').'</a>' : '<span class="event_link">'.get_field('event_external_link').'</span>' ?>
	<a class="block_link" href="<?= get_permalink(); ?>"></a>
	<?php get_template_part('components/extra', 'icons') ?>
</section>