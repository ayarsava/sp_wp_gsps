<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GSPs
 */

?>
<?php 
$images = rwmb_meta( 'pilot_header', array( 'size' => 'full','limit' => 1 ) );
$image = reset( $images );
?>
<?php if ( 'post' === get_post_type() ) { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (has_category('pilot')) { ?>
		<?php if ( has_post_thumbnail( $post->ID) || $image ) { ?>
			<header class="bg-bottom bg-fixed bg-no-repeat bg-cover h-screen relative"
			<?php if ($image) { 
				echo ' style="background-image: url(' . $image['url'] . ');"';
			} elseif ( has_post_thumbnail( $post->ID) ) { 
				echo ' style="background-image: url(' . get_the_post_thumbnail_url() . ');"';
			} ?>
			>
			<div class="h-screen bg-opacity-50 bg-black flex items-center justify-center">
				<div class="mx-8 text-center max-w-4xl">
		<?php } else { ?>
			<header class="bg-teal-darker h-screen relative">
			<div class="h-screen bg-teal-dark flex items-center justify-center">
				<div class="mx-8 text-center max-w-4xl">

		<?php } ?>
					<div class="mb-3">
						<span class="px-4 py-1 bg-yellow text-gray-900 inline-flex items-center justify-center mb-2 text-sm">PILOT</span>
					</div>
					<?php 
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title text-4xl font-extrabold text-left text-gray-100 sm:text-4xl md:text-6xl md:leading-tight md:text-center">', '</h1>' );
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
					the_title( '<h1 class="entry-title text-2xl font-extrabold text-left text-gray-900 md:text-4xl md:leading-tight mb-12 border-l-8 pl-8 py-4 border-teal">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
				<?php
					$quoter_name = rwmb_meta( 'quoter_name' );
					$quoter_position = rwmb_meta( 'quoter_position' );
					if (($quoter_name) || ($quoter_position)) {
						echo '<div class="text-right">';
						if ($quoter_name) {
							echo '<span class="font-semibold block">'.$quoter_name.'</span>';
						}
						if ($quoter_position) {
							echo $quoter_position;
						}
						echo '</div>';
					}
					
				?>
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
			<?php 
				$files = rwmb_meta( 'mb_file' );
				if ( ! empty( $files ) )  { 
					echo '<ul class="pdfbutton">';
					foreach ( $files as $file ) {
						?>
						<li><a href="<?php echo $file['url']; ?>" class="block" target="_blank"><?php echo $file['title']; ?></a></li>
						<?php
					}
					echo '</ul>';
				} 
			?>
			<nav class="toc js-toc container items-center max-w-3xl px-8 pt-10 mx-auto leading-tight xl:absolute xl:top-8 xl:pl-8 xl:pt-0 xl:max-w-xs xl:pr-16"></nav>
			<div class="container items-center max-w-3xl px-8 py-10 mx-auto space-y-6 leading-relaxed">
				<?php
				$terms_region = get_the_terms( get_the_ID(), 'region' );
				if ( $terms_region && ! is_wp_error( $terms_region ) ) {
					$html = '<div class="terms_sector mb-3 inline-block">';
					foreach ( $terms_region as $term_region ) 
					{
						$term_region_link = get_tag_link( $term_region->term_id );
								
						$html .= "<a href='{$term_region_link}' title='{$term_region->name} Tag' class='px-3 py-1 bg-teal text-gray-200 inline-flex items-center justify-center mb-2 mr-2 text-sm {$term_region->slug}'>";
						$html .= "{$term_region->name}</a>";
					}
					$html .= '</div>';
					echo $html;
				} ?>

				<?php
				$terms_sector = get_the_terms( get_the_ID(), 'sector' );
				if ( $terms_sector && ! is_wp_error( $terms_sector ) ) {
					$html = '<div class="terms_sector mb-3 inline-block">';
					foreach ( $terms_sector as $term_sector ) 
					{
						$term_sector_link = get_tag_link( $term_sector->term_id );
								
						$html .= "<a href='{$term_sector_link}' title='{$term_sector->name} Tag' class='px-3 py-1 bg-teal text-gray-200 inline-flex items-center justify-center mb-2 mr-2 text-sm {$term_sector->slug}'>";
						$html .= "{$term_sector->name}</a>";
					}
					$html .= '</div>';
					echo $html;
				} ?>
				
				<?php 
				$tags = get_the_tags();
				if (is_array($tags) || is_object($tags))
				{
					$html = '<div class="post_tags mb-3 inline-block">';
					foreach ( $tags as $tag ) 
					{
						$tag_link = get_tag_link( $tag->term_id );
								
						$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='px-3 py-1 border border-teal text-gray-200 inline-flex items-center justify-center mb-2 mr-2 text-sm {$tag->slug}'>";
						$html .= "{$tag->name}</a>";
					}
					$html .= '</div>';
					echo $html;
				}
				?>
				<?php 
					the_content();
				?>
				<?php
				$texts = rwmb_meta( 'text_1' );
				$urls = rwmb_meta( 'url_1' );
				if ( ! empty( $texts ) ) {
					echo '<div class="border p-4"><div class="h3 font-bold">More info</div>';
					echo '<ul class="list-disc px-10 py-4">';
					foreach ( $texts as $k => $text ) {
						echo "<li><a href='{$urls[$k]}'>{$text}</a></li>";
					}
					echo '</ul>';
					echo '</div>';
				}
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
					the_title( '<h1 class="entry-title text-3xl font-extrabold text-left text-gray-900 md:text-5xl md:leading-tight mb-12 border-l-8 pl-8 py-4 border-teal">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
			</div>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="container max-w-6xl mx-auto mt-16 text-center">
				<?php gsps_post_thumbnail(); ?>
			</div><!-- .entry-content -->
			<?php } ?>
		</header><!-- .entry-header -->

		<div class="relative entry-content">
			<!-- Content -->
			<div class="container items-center max-w-3xl px-8 py-10 mx-auto space-y-6 leading-relaxed">
				
			<?php
			$terms_region = get_the_terms( get_the_ID(), 'region' );
			if ( $terms_region && ! is_wp_error( $terms_region ) ) {
				$html = '<div class="terms_sector mb-3 inline-block">';
				foreach ( $terms_region as $term_region ) 
				{
					$term_region_link = get_tag_link( $term_region->term_id );
							
					$html .= "<a href='{$term_region_link}' title='{$term_region->name} Tag' class='px-3 py-1 bg-teal text-gray-200 inline-flex items-center justify-center mb-2 mr-2 text-sm {$term_region->slug}'>";
					$html .= "{$term_region->name}</a>";
				}
				$html .= '</div>';
				echo $html;
			} ?>

			<?php
			$terms_sector = get_the_terms( get_the_ID(), 'sector' );
			if ( $terms_sector && ! is_wp_error( $terms_sector ) ) {
				$html = '<div class="terms_sector mb-3 inline-block">';
				foreach ( $terms_sector as $term_sector ) 
				{
					$term_sector_link = get_tag_link( $term_sector->term_id );
							
					$html .= "<a href='{$term_sector_link}' title='{$term_sector->name} Tag' class='px-3 py-1 bg-teal text-gray-200 inline-flex items-center justify-center mb-2 mr-2 text-sm {$term_sector->slug}'>";
					$html .= "{$term_sector->name}</a>";
				}
				$html .= '</div>';
				echo $html;
			} ?>
			
			<?php 
			$tags = get_the_tags();
			if (is_array($tags) || is_object($tags))
			{
				$html = '<div class="post_tags mb-3 inline-block">';
				foreach ( $tags as $tag ) 
				{
					$tag_link = get_tag_link( $tag->term_id );
							
					$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='px-3 py-1 border border-teal text-gray-200 inline-flex items-center justify-center mb-2 mr-2 text-sm {$tag->slug}'>";
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
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->

<?php } ?>