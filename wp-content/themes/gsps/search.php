<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package GSPs
 */

get_header();
?>

	<main id="primary" class="site-main py-20">
        <header class="entry-header pt-16">
            <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto mb-4">
                <h1 class="page-title entry-title text-3xl font-extrabold tracking-tight text-left text-gray-900 md:text-4xl md:leading-tight">Search</h1>
            </div>
        </header><!-- .page-header -->

        <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto entry-content">
        	

		<?php if ( have_posts() ) : ?>

			<ul class="list-disc pl-4">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			echo '</ul>';

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
