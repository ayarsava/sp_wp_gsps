<?php
/**
 * Template part for displaying cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GSPs
 */

?>

<!-- BEG STANDARD CARD --><a href="<?php echo get_permalink();?>" class="group bg-teal p-8 min-h-full" title="<?php echo get_the_title();?>"><?php the_title( '<h4 class="text-large font-semibold text-gray-100 leading-tight">', '</h4>' );?></a><!-- END STANDARD CARD -->