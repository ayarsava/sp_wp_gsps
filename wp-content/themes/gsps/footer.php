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
		<div class="bg-teal text-gray-300 text-sm p-5 p-10 site-info flex flex-col md:flex-row md:items-center md:space-x-6">
			<img class="w-32 mb-4 md:mb-auto md:mr-4" src="<?php echo get_template_directory_uri(); ?>/resources/img/logo-cgd-white.png">

			<div class="footer-logo mb-4 md:mb-auto mr-4">
				<a href="<?php echo get_home_url(); ?>">
					<div class="text-xl font-semibold text-gray-100">GSP</div>
					<p class="text-sm text-gray-100">Global Skill Partnerships</p>
				</a>
			</div>
			<?php
			wp_nav_menu(
				array(
					//'theme_location' => 'menu-1',
					'menu_id'        => 'footer-menu',
					'menu_class'	 =>  'mt-auto md:ml-4'
				)
			);
			?>
			<div class="text-right flex-grow mt-auto">Migration that works for everyone</div>
		</div>
		<div class="bg-gray-800 text-gray-300 text-xs py-1 px-10 copyright-info">
			© All rights reserved. <?php echo date("Y"); ?> 
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>