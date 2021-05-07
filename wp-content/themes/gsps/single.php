<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package GSPs
 */

get_header();
?>

	<main id="primary" class="site-main pt-20">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	<!-- GSP in Action-->
	<div id="related-content" class="relative bg-gray-100 py-20">
		<div class="text-center sm:mx-auto md:absolute md:transform md:-rotate-90 md:top-32 md:-left-2 mb-10">
			<div class="text-base font-semibold">Related content</div>
		</div>

		<!-- Pilot list -->
		<?php wp_front_pilot(); ?>
	</div>

<?php
get_footer();
