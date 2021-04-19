<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GSPs
 */

get_header();
?>

    <main id="primary" class="site-main py-20">
        <header class="entry-header pt-16">
            <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto mb-4">
                <h1 class="page-title entry-title text-3xl font-extrabold tracking-tight text-left text-gray-900 md:text-4xl md:leading-tight">GSPs in Action</h1>
            </div>
        </header><!-- .page-header -->

        <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">
        	

        <?php 
        // the query

        $posts_per_page = 9;
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $query = array( 
            'post_type'=>array('post','resource'),
            'post_status'=>'publish',
            'posts_per_page' => $posts_per_page,
            'paged' => $paged
        );
        query_posts( $query );
        $wp_query = new WP_Query($query); ?>
        
        <?php if ( $wp_query->have_posts() ) : ?>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 py-10">
            <!-- the loop -->
            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
                get_template_part( 'template-parts/content', 'card' );
            endwhile; ?>
            <!-- end of the loop -->
        </div>
            
        <nav class="pagination w-full text-center">
            <?php pagination_bar( $wp_query ); ?>
        </nav>    
           
            <?php wp_reset_postdata(); ?>
        
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
        </div>
    </main><!-- #main -->
<?php
get_footer();
