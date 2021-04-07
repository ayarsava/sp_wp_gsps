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
<!-- BEG RESOURCE CARD -->
<div class="resource-item col-span-3 md:col-span-1 h-64 min-h-64 relative bg-gray-100 bg-no-repeat bg-left-top bg-cover relative
    <?php 
    if ( $featured_image ){ 
        echo 'bg-gray-200"  style="background-image: url(' .$featured_image[0]. ');">'; 
        echo '<div class="absolute inset-0 bg-gradient-to-tr from-black opacity-90"></div>';
    } else {
        echo '">';
    } ?>
    
    

    <div class="p-4 absolute bottom-3 left-3 right-3 z-20">
    <?php 
    $tags = get_the_tags();
    if (is_array($tags) || is_object($tags))
	{
        echo '<div>';
        foreach ( $tags as $tag ) {
            $tag_link = get_tag_link( $tag->term_id );        
            $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='px-3 py-1 bg-teal hover:bg-teal-light text-gray-200 inline-flex items-center justify-center mb-2 text-sm {$tag->slug}'>";
            $html .= "{$tag->name}</a> ";
        }
        echo $html;
        echo '</div>';
    }
    
    if ( $featured_image ) { 
        the_title( '<h4 class="text-lg font-semibold text-gray-200 hover:text-white leading-tight"><a href="'.esc_url( get_permalink() ).'" class="block group">', '</a></h4>' );
    } else {
        the_title( '<h4 class="text-lg lg:text-xl font-semibold text-gray-700 hover:text-gray-900 leading-tight"><a href="'.esc_url( get_permalink() ).'" class="block group">', '</a></h4>' );
    }
    
    $terms = get_the_terms( get_the_ID(), 'component' );
    if ( $terms && ! is_wp_error( $terms ) ) {
        if ( $featured_image ) { 
            echo '<p class="text-xs text-teal-lightest mt-4">';
            foreach ( $terms as $term ) {
                $component[] = $term->name;
            }
            $component = join( ", ", $component );
            echo '<span class="pt-1 border-t border-teal-lightest">'.$component.'</span>';
            echo '</p>';
        } else {
            echo '<p class="text-xs text-teal-dark mt-4">';
            foreach ( $terms as $term ) {
                $component[] = $term->name;
            }
            $component = join( ", ", $component );
            echo '<span class="pt-1 border-t border-teal-dark">'.$component.'</span>';
            echo '</p>';
        }
    } ?>
    </div>
</div><!-- END RESOURCE CARD -->