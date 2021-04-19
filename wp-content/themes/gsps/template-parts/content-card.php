<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GSPs
 */

?>

<?php 
	// If is not Resource
	if ( 'post' === get_post_type() ) {
		// If category is quote
		if (has_category('quote',$post->ID)) {
			get_template_part( 'template-parts/content', 'card-quote' );
		} else {
			// if is featured post
			if (is_front_page()) {
				if (has_category('featured',$post->ID)) {
					get_template_part( 'template-parts/content', 'card-featured' );
				}
			//if is not featured post
			else {
				get_template_part( 'template-parts/content', 'card-standard' );
			} 
			} else {
				get_template_part( 'template-parts/content', 'card-resource' );
			} 
		}
	} elseif ( 'resource' === get_post_type() ) {
		get_template_part( 'template-parts/content', 'card-resource' );
	?>
<?php } ?>