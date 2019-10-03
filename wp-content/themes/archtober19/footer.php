		<footer>
			<section class="footer_column">
				<?= wpautop(the_field('footer_left_column', 'option')) ?>
			</section
			><section class="footer_column">
				<?= wpautop(the_field('footer_right_column', 'option')) ?>
			</section>
			<aside class="footer_credits">Design by <a target="_blank" href="https://smallstuff.us/">Small Stuff</a> with <a target="_blank" href="https://lukas.eigler-harding.com">Lukas Eigler-Harding</a></aside>
		</footer>
	</main>
</section>
<?php wp_footer(); ?>
</body>
</html>