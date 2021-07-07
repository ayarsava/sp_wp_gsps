<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GSPs
 */

get_header();
?>

	<main id="primary" class="site-main relative">
	

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	<!-- GSP in Action-->
	<div id="gsp-in-action" class="relative bg-gray-100  py-20">
		<div class="text-xl md:text-xl font-semibold pl-4 sm:px-8 lg:px-16 xl:px-20 mb-8">GSP in Action</div>

		<!-- Pilot list -->
		<?php wp_front_pilot(); ?>
	</div>

<?php
get_footer();
