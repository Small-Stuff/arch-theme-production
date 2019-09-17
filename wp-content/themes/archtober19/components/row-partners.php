<?php	
	$id = get_the_ID(); 
	$subnames = '';
	$subwebsites = '';
	$subphones = '';
	if( have_rows('sub_partner') ):
    while ( have_rows('sub_partner') ) : the_row();
      $subnames .= '<span class="sub_section mobile_hide">'.get_sub_field('sub_partner_name').'</span><a class="sub_section mobile_reveal" href="'.get_sub_field('sub_partner_website').'" >'.get_sub_field('sub_partner_name').'</a>';
      $subaddress .= '<span class="sub_section mobile_hide">'.get_sub_field('sub_partner_address').'</span>';
      $subwebsites .= (get_sub_field('sub_partner_website')) ? '<a href="'.get_sub_field('sub_partner_website').'" class="sub_section">'.pretty_url(get_sub_field('sub_partner_website')).'</a>' : '<span class="sub_section">–</span>';
      $subphones .= (get_sub_field('sub_partner_phone')) ? '<a href="tel:'.get_sub_field('sub_partner_phone').'" class="sub_section">'.get_sub_field('sub_partner_phone').'</a>': '<span class="sub_section">–</span>';
    endwhile;
  endif;
?>
<div class="index_section arch_partners"
		 data-eventtype='<?= get_terms_array_slug($id, 'partner_type') ?>'>
	<h3 class="index_section_title section_three event_title arch_partner">
		<span class="mobile_hide"><?= get_the_title(); ?></span>
		<a target="_blank" class="mobile_reveal" href="<?= get_field('website') ?>"><?= get_the_title(); ?></a>
		<?= $subnames; ?>
		</h3>
	<h3 class="index_section_title section_six arch_partner mobile_hide">
		<a target="_blank" href="<?= get_field('website') ?>"><?= pretty_url(get_field('website')) ?></a>
		<?= $subwebsites; ?>
	</h3>
	<h3 class="index_section_title section_three arch_partner mobile_hide">
		<?= get_field('primary_address') ?>
		<?= $subaddress; ?>
	</h3>
	<h3 class="index_section_title section_six arch_partner">
		<a href="tel:<?= get_field('phone_number') ?>" ><?= get_field('phone_number') ?></a>
		<?= $subphones; ?>
	</h3>
</div>