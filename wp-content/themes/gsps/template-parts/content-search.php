<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GSPs
 */

?>
<li>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<div class="entry-title h3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></div>' ); ?>

	</header><!-- .entry-header -->
</article><!-- #post-<?php the_ID(); ?> -->
</li>