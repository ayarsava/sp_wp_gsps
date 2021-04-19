<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package GSPs
 */

get_header();
?>

<div id="notfound" class="bg-teal">
		<div class="notfound-bg"></div>
		<div class="notfound">
			<div class="notfound-404">
				<h1>404</h1>
			</div>
			<h2 class="mb-3">we are sorry, but the page you requested was not found</h2>
			<a href="<?php echo home_url();?>" class="mt-8 px-4 py-3 bg-yellow text-gray-800 font-semibold hover:bg-yellow-300">Go Home</a>
			<!--<a href="/contact" class="contact-btn">Contact us</a>
			<div class="notfound-social">
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-pinterest"></i></a>
			<a href="#"><i class="fa fa-google-plus"></i></a>
			</div>-->
		</div>
	</div>

<?php
get_footer();
