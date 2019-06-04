<nav id="arch_menu">
	<button id="arch_menu_button" class="menu_header">
		<div class="menu_line"></div>
		<div class="menu_line"></div>
	</button>
	<?php 
		get_template_part('components/menu', 'calendar');
		get_template_part('components/menu', 'index'); 
		get_template_part('components/menu', 'misclinks');
	?>
</nav>
