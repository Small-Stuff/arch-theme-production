<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0">
	<title><?php bloginfo( 'name' ); ?></title>
	<?php wp_head(); ?>

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