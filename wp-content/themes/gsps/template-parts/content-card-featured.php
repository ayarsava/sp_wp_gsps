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

<!-- BEG FEATURED CARD --><div class="md:col-span-2 order-first bg-gray-200 h-96 relative

	<?php 
    if ( $featured_image ){ 
        echo ' bg-no-repeat bg-left-top bg-cover"  style="background-image: url(' .$featured_image[0]. ');">'; 
        echo '<div class="absolute inset-0 bg-gradient-to-tr from-black opacity-70"></div>';
    } else {
        echo '">';
    } 
	?>


	<div class="p-4 absolute bottom-5 left-3 z-20">
		<?php
		$terms_region = get_the_terms( $post->ID, 'region' );
		if ( $terms_region && ! is_wp_error( $terms_region ) ) {
			$html = '<div class="terms_sector inline-block">';
			foreach ( $terms_region as $term_region ) 
			{
				$term_region_link = get_tag_link( $term_region->term_id );
						
				$html .= "<a href='{$term_region_link}' title='{$term_region->name} Tag' class='px-3 py-1 bg-yellow hover:bg-teal-lightest text-gray-800 inline-flex items-center justify-center mb-2 mr-2 text-sm {$term_region->slug}'>";
				$html .= "{$term_region->name}</a>";
			}
			$html .= '</div>';
			echo $html;
		} ?>

		<?php
		$terms_sector = get_the_terms( $post->ID, 'sector' );
		if ( $terms_sector && ! is_wp_error( $terms_sector ) ) {
			$html = '<div class="terms_sector inline-block">';
			foreach ( $terms_sector as $term_sector ) 
			{
				$term_sector_link = get_tag_link( $term_sector->term_id );
						
				$html .= "<a href='{$term_sector_link}' title='{$term_sector->name} Tag' class='px-3 py-1 bg-yellow hover:bg-teal-lightest text-gray-800 inline-flex items-center justify-center mb-2 mr-2 text-sm {$term_sector->slug}'>";
				$html .= "{$term_sector->name}</a>";
			}
			$html .= '</div>';
			echo $html;
		} ?>
		<?php 
		if ( $featured_image ) { 
			the_title( '<h3 class="text-2xl font-semibold text-gray-100 leading-tight"><a href="'.esc_url( get_permalink() ).'" class="block group">', '</a></h2>' );
		} else {
			the_title( '<h4 class="text-2xl font-semibold text-gray-700 hover:text-gray-900 leading-tight"><a href="'.esc_url( get_permalink() ).'" class="block group">', '</a></h4>' );
		}
		?>
		
	</div>
</div><!-- END FEATURED CARD -->