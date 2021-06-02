<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GSPs
 */

?>

	<footer id="colophon" class="site-footer overflow-hidden relative">
		<div class="bg-teal text-gray-300 text-sm p-5 p-10 site-info md:flex w-full">
			<div class="">
				<img class="w-32 mb-4 md:mr-4" src="<?php echo get_template_directory_uri(); ?>/resources/img/logo-cgd-white.png">
			</div>

			<?php
			wp_nav_menu(
				array(
					'menu_id'        => 'footer-menu',
					'menu_class'	 =>  'mt-4 mr-4 md:ml-4'
				)
			);
			?>
			<div class="footer-logo mt-4 mr-4 ml-auto lg:mt-auto pb-0">
				<a href="<?php echo get_home_url(); ?>"">
					<p class="text-sm text-gray-100 font-semibold">Global Skill Partnerships</p>
					<div>Migration that works for everyone</div>
				</a>
				<div class="text-sm font-semibold text-gray-100 mt-4">Supported by<br>
					<img class="w-32 mb-4 md:mb-auto md:mr-4 mt-2" src="<?php echo get_template_directory_uri(); ?>/resources/img/logo-open-primary.png">
				</div>
			</div>
			
		</div>
		<div class="bg-gray-800 text-gray-300 text-xs py-1 px-10 copyright-info">
			© All rights reserved. <?php echo date("Y"); ?> 
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
