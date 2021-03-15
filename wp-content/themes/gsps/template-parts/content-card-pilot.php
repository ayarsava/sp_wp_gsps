<?php
/**
 * Template part for displaying cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GSPs
 */

?>

<!-- BEG PILOT CARD -->
<a href="<?php echo esc_url( get_permalink() );?>" class="swiper-slide block group">
    <div class="h-60 overflow-hidden">
    <?php the_post_thumbnail('medium', array('class' => 'object-cover origin-center h-full w-full group-hover:opacity-75 transition ease-in-out duration-150 group-hover:scale-110 transform')); ?>
    </div>
    <div class="mb-4">
        <p class="mt-2 font-hairline text-sm text-grey-darker">PILOT</p>
        <?php the_title( '<h4 class="font-semibold text-lg pr-10 leading-snug group-hover:text-gray-500">', '</h4>' ); ?>
    </div>
</a><!-- END PILOT CARD -->