<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="home">
	<?php get_template_part('components/extra', 'marquee') ?>
	<section id="open_menu">
		<?php 
			get_template_part('components/menu', 'calendar');
		  get_template_part('components/menu', 'index'); 
		?>	
		<h1 class="arch_intro"><?= the_field('archtober_description', 'option') ?></h1>
	</section>
<?php get_template_part('components/loop', 'day') ?>
<?php get_footer(); ?>