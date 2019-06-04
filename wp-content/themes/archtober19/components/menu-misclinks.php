<div class="misc_links">
	<section>
		<a href="<?= get_field( 'privacy_policy', 'options' ) ?>" class="privacy_policy" target="_blank">Privacy Policy</a>
		<a href="<?= get_field( 'donate', 'options' ) ?>" class="donate" target="_blank">Donate</a>
	</section>
	<section>
		<?php if( $subscribe = get_field( 'subscribe', 'options' ) ): ?>
		<h1 class="subscribe">Sign-up for Updates!</h1>
		<div id="subscribe" data-form="<?= $subscribe ?>">
			<form method="POST">
				<input type="hidden" name="list" value="archtober">
				<input class="text_field" type="text" name="first_name" placeholder="First Name">
				<input class="text_field" type="text" name="last_name" placeholder="Last Name">
				<input class="text_field" type="email" name="email" placeholder="Email">
				<input class="submit_field" type="submit" value="Submit"/>
				<div class="arch_message">You did not supply an email address.</div>
			</form>
		</div>
	<?php endif; ?>
	</section>
</div>
