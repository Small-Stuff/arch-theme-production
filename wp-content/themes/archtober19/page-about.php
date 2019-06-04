<?php
/*
Template Name: About
*/
?>
<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="about">
	<?php get_template_part('components/header', 'page') ?>
	<section class="page_content">
		<section class="page_section">
			<?php $page = get_page_by_path('about'); ?>
			<?= wpautop($page->post_content); ?>	
		</section>		
	</section>
<?php get_footer(); ?>