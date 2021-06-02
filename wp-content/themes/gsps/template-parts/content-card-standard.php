<?php
/**
 * Template part for displaying cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GSPs
 */

?>

<!-- BEG STANDARD CARD --><div class="min-h-80 h-auto bg-teal p-8 group col-span-3 md:col-span-1 relative"><a href="<?php echo get_permalink();?>" class="stretched-link" title="<?php echo get_the_title();?>"></a><?php the_title( '<h4 class="text-large font-semibold text-gray-100 leading-tight">', '</h4>' );?></div><!-- END STANDARD CARD -->