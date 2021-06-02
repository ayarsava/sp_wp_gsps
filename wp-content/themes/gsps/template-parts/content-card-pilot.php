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

<!-- BEG PILOT CARD -->
<div class="swiper-slide block group">

    <?php
    if ( $featured_image ) { ?>
        <div class="overflow-hidden relative">
            <?php the_post_thumbnail('medium', array('class' => 'object-cover origin-center h-full w-full group-hover:opacity-75 transition ease-in-out duration-150 group-hover:scale-110 transform')); ?>
            <div class="tags absolute bottom-2 z-20 left-4">
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
            </div>
        </div>
        <div class="mb-4"><a href="<?php echo esc_url( get_permalink() );?>">
            <div class="mt-2 font-hairline text-sm text-gray-darker">PILOT</div>
            <?php the_title( '<h4 class="font-semibold text-lg pr-10 leading-snug group-hover:text-gray-500">', '</h4>' ); ?></a>
        </div>
    <?php } else { ?>
        <a href="<?php echo esc_url( get_permalink() );?>">
        <div class="min-h-80 overflow-ellipsis overflow-hidden bg-gray-200 p-8 mb-4">
            <p class="mt-2 font-hairline text-sm text-gray-darker">PILOT</p>
            
            <h4 class="font-semibold lg:text-2xl pr-10 leading-snug group-hover:text-gray-500"><?php echo wp_trim_words( get_the_title(), 22, '...' ); ?></h4>
        </div>
        </a>
    <?php } ?>

</div><!-- END PILOT CARD -->