<?php
/**
 * Template part for displaying cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GSPs
 */

?>

<?php
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( 5600,1000 ), false, '' );
?>

<!-- BEG FEATURED CARD --><div data-aos="flip-left" class="md:row-span-3 md:col-span-2 order-first bg-gray-200 min-h-full h-96 relative relative

	<?php 
    if ( $featured_image ){ 
        echo ' bg-no-repeat bg-left-top bg-cover"  style="background-image: url(' .$featured_image[0]. ');">'; 
        echo '<div class="absolute inset-0 bg-gradient-to-tr from-black opacity-70"></div>';
    } else {
        echo '">';
    } ?>


	<div class="p-4 absolute bottom-5 left-3 z-20">
		<?php 
		$tags = get_the_tags();
		foreach ( $tags as $tag ) {
			$tag_link = get_tag_link( $tag->term_id );
					
			$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='px-3 py-1 bg-teal text-gray-200 inline-flex items-center justify-center mb-2 text-sm {$tag->slug}'>";
			$html .= "{$tag->name}</a> ";
		}
		echo $html;
		?>
		<?php 
		if ( $featured_image ) { 
			the_title( '<h3 class="text-2xl font-semibold text-gray-100 leading-tight"><a href="'.esc_url( get_permalink() ).'" class="block group">', '</a></h2>' );
		} else {
			the_title( '<h4 class="text-2xl font-semibold text-gray-700 hover:text-gray-900 leading-tight"><a href="'.esc_url( get_permalink() ).'" class="block group">', '</a></h4>' );
		}
		?>
		
	</div>
</div><!-- END FEATURED CARD -->