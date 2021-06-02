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
        <!-- Pilot list -->
        <header class="entry-header pt-16">
            <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto mb-4">
                <h1 class="entry-title text-3xl font-extrabold text-left text-gray-900 md:text-5xl md:leading-tight mb-12 border-l-8 pl-8 py-4 border-teal">GSPs in Action</h1>
            </div>
        </header><!-- .page-header -->
        <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto mb-4">
            <h2 class="entry-title text-2xl font-extrabold text-left text-gray-900 md:text-4xl md:leading-tight mt-10">Pilots</h2>
        </div>
        <?php wp_front_pilot(); ?>

        
        
        <div id="stories-and-more" class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto mb-4 pt-10">
        <hr>
            <h2 class="entry-title text-2xl font-extrabold text-left text-gray-900 md:text-4xl md:leading-tight mt-10">Resources</h2>
            
            <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
                <?php
                    if( $regions = get_terms( array(
                        'taxonomy' => 'region',
                        'orderby' => 'name'
                    ) ) ) : 
                        // if categories exist, display the dropdown
                        echo '<select name="regionFilter" class="pl-2 pr-10 px-4 mr-3 h-10 inline-block align-middle"><option value="">Select region...</option>';
                        foreach ( $regions as $region ) :
                            echo '<option value="' . $region->term_id . '">' . $region->name . '</option>'; // ID of the category as an option value
                        endforeach;
                        echo '</select>';
                    endif;

                    if( $sectors = get_terms( array(
                        'taxonomy' => 'sector',
                        'orderby' => 'name'
                    ) ) ) : 
                        // if categories exist, display the dropdown
                        echo '<select name="sectorFilter" class="pl-2 pr-10 px-4 mr-3 h-10 inline-block align-middle"><option value="">Select sector...</option>';
                        foreach ( $sectors as $sector ) :
                            echo '<option value="' . $sector->term_id . '">' . $sector->name . '</option>'; // ID of the sector as an option value
                        endforeach;
                        echo '</select>';
                    endif;
                ?>
                <button class="bg-teal px-4 border-0 text-white h-10 inline-block align-middle">Apply filter</button>
                <input type="hidden" name="action" value="myfilter">
                <input type="hidden" name="base" value="<?php echo $base; ?>"/>
            </form>
            <div id="response" class="grid grid-cols-1 md:grid-cols-3 gap-4 py-10">
                <?php 
                $posts_per_page = -1;
                $args = array(
                    'post_type'=>array('post','resource','legalpathway'),
                    'post_status'=>'publish',
                    'posts_per_page' => $posts_per_page,
                    'orderby'=> 'post_date', 
                    'order' => 'ASC',
                    'tax_query' => [
                        [
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => [ 'pilot' ],
                            'operator' => 'NOT IN'
                        ],
                    ],
                );
                
                $query = new WP_Query( $args );
            
                if( $query->have_posts() ) :
                    while( $query->have_posts() ): $query->the_post();
                        get_template_part( 'template-parts/content', 'card' );
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo 'There are no posts for this specific search';
                endif;
                ?>
            </div>
            
        </div>
    </main><!-- #main -->
<?php
get_footer();
