<?php
/**
 * Template part for displaying cards
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GSPs
 */

?>

<!-- BEG QUOTE CARD--><div class="bg-yellow p-7 pt-5 relative">
	<div class="md:absolute w-32 -top-4 -left-2 -z-1">
		<svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 24 24"><path d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z" fill="#d1d5db"/></svg>
	</div>
	<?php 
		the_title( '<blockquote class="lg:absolute pt-10 lg:pt-0 lg:top-7 left-7 right-7 italic font-semibold text-lg leading-snug z-10">', '</blockquote>' );
	?>
	<div class="lg:absolute bottom-4 left-4 right-7 text-xs text-right leading-tight text-gray-800">
	<?php
		the_content();
	?>
	</div>
</div><!-- END QUOTE CARD-->