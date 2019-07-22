<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0">
	<title><?php bloginfo( 'name' ); ?></title>
	<?php wp_head(); ?>
	<?php #get_template_part('components/head', 'meta'); ?>

	<link rel="icon" type="image/png" href="<?= get_template_directory_uri() ?>/assets/favicon/archtober-favicon-16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?= get_template_directory_uri() ?>/assets/favicon/archtober-favicon-32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?= get_template_directory_uri() ?>/assets/favicon/archtober-favicon-196.png" sizes="196x196">
	<link rel="icon" type="image/png" href="<?= get_template_directory_uri() ?>/assets/favicon/archtober-favicon.png" sizes="746x746">

	<noscript>
		<style type="text/css">
			.archtober_logo.botd_hidden{
				opacity: 0.1;
			}
		</style>
	</noscript>

</head>
<body>
	<section data-barba="wrapper">
	<?php get_template_part('components/menu'); ?>
	<?php get_template_part('components/loop', 'botd'); ?>