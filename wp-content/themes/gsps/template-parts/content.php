<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GSPs
 */

?>
<?php if ( 'post' === get_post_type() ) { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (has_category('pilot')) { ?>
		<header class="bg-bottom bg-fixed bg-no-repeat bg-cover h-screen relative" <?php if (has_post_thumbnail( $post->ID ) ):  echo ' style="background-image: url(' . get_the_post_thumbnail_url() . ');"';	endif ?>>
			<div class="h-screen bg-opacity-50 bg-black flex items-center justify-center">
				<div class="mx-8 text-center max-w-4xl">
					<div class="mb-3">
						<span class="px-4 py-1 bg-yellow text-gray-900 inline-flex items-center justify-center mb-2 text-sm">PILOT</span>
					</div>
					<?php 
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title text-4xl font-extrabold tracking-tight text-left text-gray-100 sm:text-4xl md:text-6xl md:leading-tight md:text-center">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
					?>
				</div>
			</div>
		</header>
	<?php } else { ?>
		<header class="entry-header pt-16">
			<div class="container items-center max-w-3xl px-8 mx-auto space-y-6">
				<?php 
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title text-2xl font-extrabold tracking-tight text-left text-gray-900 sm:text-3xl md:text-4xl md:leading-tight">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
				<!--<p class="w-full mx-auto text-base text-left text-gray-500 md:max-w-md sm:text-lg lg:text-2xl md:max-w-3xl md:text-center">
					Award winning pages that will take your game to the next level!
				</p>-->
			</div>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="container max-w-6xl mx-auto mt-16 text-center">
				<?php gsps_post_thumbnail(); ?>
			</div><!-- .entry-content -->
			<?php } ?>
		</header><!-- .entry-header -->
	<?php } ?> 
		<!-- Content -->
		<div class="relative entry-content">
			<nav class="toc js-toc container items-center max-w-3xl px-8 pt-10 mx-auto leading-tight xl:absolute xl:top-8 xl:pl-8 xl:pt-0 xl:max-w-xs xl:pr-16"></nav>
			<div class="container items-center max-w-3xl px-8 py-10 mx-auto space-y-6 leading-relaxed">
				<?php 
				$tags = get_the_tags();
				if (is_array($tags) || is_object($tags))
				{
					$html = '<div class="post_tags mb-3">';
					foreach ( $tags as $tag ) 
					{
						$tag_link = get_tag_link( $tag->term_id );
								
						$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='px-3 py-1 bg-teal text-gray-200 inline-flex items-center justify-center mb-2 mr-2 text-sm {$tag->slug}'>";
						$html .= "{$tag->name}</a>";
					}
					$html .= '</div>';
					echo $html;
				}
				?>
				<?php 
					the_content();
				?>
			</div>
		</div>

	</article><!-- #post-<?php the_ID(); ?> -->
<?php } else { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
		<header class="entry-header pt-16">
			<div class="container items-center max-w-3xl px-8 mx-auto space-y-6">
				<?php 
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title text-3xl font-extrabold tracking-tight text-left text-gray-900 md:text-4xl md:leading-tight">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
				<!--<p class="w-full mx-auto text-base text-left text-gray-500 md:max-w-md sm:text-lg lg:text-2xl md:max-w-3xl md:text-center">
					Award winning pages that will take your game to the next level!
				</p>-->
			</div>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="container max-w-6xl mx-auto mt-16 text-center">
				<?php gsps_post_thumbnail(); ?>
			</div><!-- .entry-content -->
			<?php } ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<!-- Content -->
			<div class="container items-center max-w-3xl px-8 py-10 mx-auto space-y-6 leading-relaxed">
				
				<?php 
					$tags = get_the_tags();
					if (is_array($tags) || is_object($tags))
					{
						echo '<div class="mb-3">';
						foreach ( $tags as $tag ) {
							$tag_link = get_tag_link( $tag->term_id );        
							$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='px-3 py-1 bg-teal hover:bg-teal-light text-gray-200 inline-flex items-center justify-center mb-2 text-sm {$tag->slug}'>";
							$html .= "{$tag->name}</a> ";
						}
						echo $html;
						echo '</div>';
					}
					
					the_content();
				?>
			</div>
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->

<?php } ?>