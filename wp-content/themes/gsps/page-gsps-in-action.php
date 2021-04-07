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

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	<!-- GSP in Action-->
	<div id="gsp-in-action" class="relative bg-gray-100  py-20">
		<div class="text-center sm:mx-auto md:absolute md:transform md:-rotate-90 md:top-28 md:-left-2 mb-10">
			<div class="text-base font-semibold">GSP in Action</div>
		</div>

		<!-- container slider -->
		<div class="container">
			<div class="relative container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php wp_front_pilot(); ?>
					</div>
				</div>
				<!-- Add Arrows -->
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		</div>
	</div>

<?php
get_footer();
