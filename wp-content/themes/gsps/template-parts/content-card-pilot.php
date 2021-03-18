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
<a href="<?php echo esc_url( get_permalink() );?>" class="swiper-slide block group">
    <?php
    if ( $featured_image ) { ?>
        <div class="h-60 overflow-hidden">
        <?php the_post_thumbnail('medium', array('class' => 'object-cover origin-center h-full w-full group-hover:opacity-75 transition ease-in-out duration-150 group-hover:scale-110 transform')); ?>
        </div>
        <div class="mb-4">
            <p class="mt-2 font-hairline text-sm text-grey-darker">PILOT</p>
            <?php the_title( '<h4 class="font-semibold text-lg pr-10 leading-snug group-hover:text-gray-500">', '</h4>' ); ?>
        </div>
    <?php } else { ?>
        <div class="h-80 overflow-ellipsis overflow-hidden bg-gray-200 p-8 mb-4">
            <p class="mt-2 font-hairline text-sm text-grey-darker">PILOT</p>
            <h4 class="font-semibold text-2xl pr-10 leading-snug group-hover:text-gray-500"><?php echo wp_trim_words( get_the_title(), 22, '...' ); ?></h4>
        </div>
    <?php } ?>
</a><!-- END PILOT CARD -->