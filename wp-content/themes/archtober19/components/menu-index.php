<?php 
 wp_nav_menu(array(
 	'menu' 						=> 'Main Menu',
 	'container' 			=> 'div',
 	'container_class' => 'archtober_menu_index_wrapper',
 	'container_id' 		=> '',
 	'menu_class' 			=> 'archtober_menu_index',
 	'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'item_spacing'    => 'preserve',
  'depth'           => 0,
  'walker'          => '',
  'theme_location'  => ''
 ));
?>