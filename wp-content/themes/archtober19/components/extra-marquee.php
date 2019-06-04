<?php if( get_field( 'marquee_is_visible', 'options' ) ): ?>
<section class="marquee_wrapper">
	<?php if( get_field( 'marquee', 'options' ) ): ?>
		<?php $marquee_speed = get_field( 'marquee_speed', 'options' ); ?>
		<div class="marquee">
			<span class="marquee_content"
			style="
			-webkit-animation: marquee <?= $marquee_speed ?>s linear infinite;
    	-moz-animation: marquee <?= $marquee_speed ?>s linear infinite;
    	animation: marquee <?= $marquee_speed ?>s linear infinite;" 
			> <?= wpautop(get_field( 'marquee', 'options' )); ?></span>
		</div>
	<?php endif; ?>
</section>
<?php endif; ?>