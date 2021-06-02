<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GSPs
 */

get_header();
?>

	<main id="primary" class="site-main py-20">

		<?php if ( have_posts() ) : ?>
			<header class="entry-header pt-16">
				<div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto mb-4">
				<?php
				the_archive_title( '<h1 class="page-title entry-title text-3xl font-extrabold tracking-tight text-left text-gray-900 md:text-4xl md:leading-tight">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				</div>
			</header><!-- .page-header -->
			<div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">
        		<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-card', 'generic' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );
		?>
				</div>
			</div>
		<?php endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
