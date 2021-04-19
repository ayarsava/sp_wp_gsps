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
				the_title( '<h1 class="entry-title text-3xl font-extrabold text-left text-gray-900 md:text-5xl md:leading-tight mb-12">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title mb-10"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			<?php 
				$tags = get_the_tags();
				if (is_array($tags) || is_object($tags))
				{
					echo '<div class="mb-3">';
					foreach ( $tags as $tag ) {
						$tag_link = get_tag_link( $tag->term_id );        
						$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='px-3 py-1 bg-teal hover:bg-teal-light text-gray-200 inline-flex items-center justify-center mb-2 text-sm {$tag->slug}'>";
						$html .= "{$tag->name}</a> ";
					}
					echo $html;
					echo '</div>';
				}
			?>
		</div>
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="container max-w-3xl px-8 mx-auto space-y-6 mt-4">
			<?php gsps_post_thumbnail(); ?>
		</div><!-- .entry-content -->
		<?php } ?>
	</header><!-- .entry-header -->
	
	<nav class="toc js-toc container items-center max-w-3xl px-8 pt-10 mx-auto leading-tight xl:fixed xl:top-40 xl:pl-8 xl:pt-0 xl:max-w-xs xl:pr-16"></nav>
	<div class="entry-content">
		<!-- Content -->
		<div class="container items-center max-w-3xl px-8 py-10 mx-auto space-y-6 leading-relaxed">
			<?php 
				the_content();
			?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
