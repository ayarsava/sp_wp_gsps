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
$url = rwmb_meta( 'resource_url' );
?>
<!-- BEG RESOURCE CARD -->
<div class="resource-item col-span-3 md:col-span-1 min-h-80 h-auto relative bg-teal-light bg-no-repeat bg-left-top bg-cover relative
    <?php 
    if ( $featured_image ){ 
        echo 'bg-gray-200"  style="background-image: url(' .$featured_image[0]. ');">'; 
        echo '<div class="absolute inset-0 bg-gradient-to-tr from-black opacity-90"></div>';
    } else {
        echo '">';
    } ?>
    
    
    <?php 
    if (!empty($url)) { 
        echo '<a href="'.$url.'" class="block group stretched-link" target="_blank">';
    }
    ?>
    
    <div class="p-4 absolute bottom-3 left-3 right-3 z-20">
    
    
        <?php
        $terms_region = get_the_terms( get_the_ID(), 'region' );
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
        $terms_sector = get_the_terms( get_the_ID(), 'sector' );
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
            the_title( '<h4 class="text-lg font-semibold text-gray-200 hover:text-white leading-tight">', '</h4>' );
        } else {
            the_title( '<h4 class="text-lg lg:text-xl font-semibold text-white hover:text-gray-800 leading-tight">', '</h4>' );
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
                echo '<p class="text-xs text-white mt-4">';
                foreach ( $terms as $term ) {
                    $component[] = $term->name;
                }
                $component = join( ", ", $component );
                echo '<span class="pt-1 border-t border-teal-light">'.$component.'</span>';
                echo '</p>';
            }
        } ?>
        <?php 
        if ( 'legalpathway' === get_post_type() ) {
            echo '<p class="text-xs text-teal-lightest mt-4">Legal Pathway</p>';
        } 
        ?>
    </div>
    <?php 
    if (!empty($url)) {
    echo '</a>';
    }
    ?>
</div><!-- END RESOURCE CARD -->