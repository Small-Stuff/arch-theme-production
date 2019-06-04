<?php 
/*
Template Name: Exhibitions Archive
*/
?>
<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="exhibitions">
	<?php get_template_part('components/header', 'index') ?>
	<?php get_template_part('components/loop', 'exhibitions') ?>
<?php get_footer(); ?>
