<?php 
/*
Template Name: Partners Archive
*/
?>
<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="partners">
<?php get_template_part('components/header', 'index') ?>
<section class="index_section_titles index_partners">
	<h2 class="index_section_title section_three event_title arch_partner">Partner</h2>
	<h2 class="index_section_title section_six arch_partner">Website</h2>
	<h2 class="index_section_title section_six arch_partner">Phone</h2>
</section>
<?php get_template_part('components/loop', 'partners'); ?>
<?php get_footer(); ?>
