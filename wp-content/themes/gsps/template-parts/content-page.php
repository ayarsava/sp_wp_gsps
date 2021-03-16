<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GSPs
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('pt-36'); ?>>	
	<header class="entry-header">
		<div class="container items-center max-w-3xl px-8 mx-auto space-y-6">
			<?php 
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title text-3xl font-extrabold tracking-tight text-left text-gray-900 md:text-4xl md:leading-tight">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			<!--<p class="w-full mx-auto text-base text-left text-gray-500 md:max-w-md sm:text-lg lg:text-2xl md:max-w-3xl md:text-center">
				Award winning pages that will take your game to the next level!
			</p>-->
		</div>
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="container max-w-3xl px-8 mx-auto space-y-6 mt-4">
			<?php gsps_post_thumbnail(); ?>
		</div><!-- .entry-content -->
		<?php } ?>
	</header><!-- .entry-header -->
	
	<nav class="toc js-toc container items-center max-w-3xl px-8 pt-10 mx-auto leading-tight xl:fixed xl:top-44 xl:pl-8 xl:pt-0 xl:max-w-xs xl:pr-16"></nav>
	<div class="entry-content">
		<!-- Content -->
		<div class="container items-center max-w-3xl px-8 py-10 mx-auto space-y-6 leading-relaxed">
			<?php 
				the_content();
			?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
