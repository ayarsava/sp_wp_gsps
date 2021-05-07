<?php
/**
 * Plugin Name: GSPs
 * Plugin URI:  https://www.ayarsava.com.ar
 * Description: Plugin by Socio público GSPs.
 * Version:     1.0.0
 * Author:      Ayar Sava
 * Author URI:  https://www.ayarsava.com.ar
 * Text Domain: GSPs
 *
 * @package GSPs
 */


/** Register Custom Taxonomy Type. **/
/*** Used to filter by Podcasts, Videos, Policy Papers on Resources CPT***/
function wporg_register_taxonomy_component() {
	$labels = array(
		'name'              => _x( 'Components', 'taxonomy general name' ),
		'singular_name'     => _x( 'Component', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar components' ),
		'all_items'         => __( 'Todos los tipos de component' ),
		'parent_item'       => __( 'Component padre' ),
		'parent_item_colon' => __( 'Component padre:' ),
		'edit_item'         => __( 'Editar Component' ),
		'update_item'       => __( 'Actualizar Component' ),
		'add_new_item'      => __( 'Agregar nueva Component' ),
		'new_item_name'     => __( 'Nuevo Component' ),
		'menu_name'         => __( 'Component' ),
	);
	$args   = array(
		'hierarchical'      => true, // make it hierarchical (like categories).
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
	);
	register_taxonomy( 'component', array( 'resource' ), $args );
}
add_action( 'init', 'wporg_register_taxonomy_component' );

/** Register Region Taxonomy. **/
/*** Used to filter by Posts, pages or resources ***/
function wporg_register_taxonomy_region() {
	$labels = array(
		'name'              => _x( 'Regions', 'taxonomy general name' ),
		'singular_name'     => _x( 'Region', 'taxonomy singular name' ),
		'search_items'      => __( 'Search regions' ),
		'all_items'         => __( 'All regions' ),
		'parent_item'       => __( 'Region parent' ),
		'parent_item_colon' => __( 'Region parent:' ),
		'edit_item'         => __( 'Edit Region' ),
		'update_item'       => __( 'Apdate Region' ),
		'add_new_item'      => __( 'Add new Region' ),
		'new_item_name'     => __( 'New Region' ),
		'menu_name'         => __( 'Region' ),
	);
	$args   = array(
		'hierarchical'      => true, // make it hierarchical (like categories).
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
	);
	register_taxonomy( 'region', array( 'resource', 'post', 'page' ), $args );
}
add_action( 'init', 'wporg_register_taxonomy_region' );

/** Register Sector Taxonomy. **/
/*** Used to filter by Posts, pages or resources ***/
function wporg_register_taxonomy_sector() {
	$labels = array(
		'name'              => _x( 'Sectors', 'taxonomy general name' ),
		'singular_name'     => _x( 'Sector', 'taxonomy singular name' ),
		'search_items'      => __( 'Search sectors' ),
		'all_items'         => __( 'All sectors' ),
		'parent_item'       => __( 'Sector parent' ),
		'parent_item_colon' => __( 'Sector parent:' ),
		'edit_item'         => __( 'Edit Sector' ),
		'update_item'       => __( 'Apdate Sector' ),
		'add_new_item'      => __( 'Add new Sector' ),
		'new_item_name'     => __( 'New Sector' ),
		'menu_name'         => __( 'Sector' ),
	);
	$args   = array(
		'hierarchical'      => true, // make it hierarchical (like categories).
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
	);
	register_taxonomy( 'sector', array( 'resource', 'post', 'page' ), $args );
}
add_action( 'init', 'wporg_register_taxonomy_sector' );


/*** CPT Resources ***/
function custom_post_type_resource() {
	// Set UI labels for Custom Post Type.
	$labels = array(
		'name'               => _x( 'Resources', 'Post Type General Name', 'gsps-plugin' ),
		'singular_name'      => _x( 'Resource', 'Post Type Singular Name', 'gsps-plugin' ),
		'menu_name'          => __( 'Resources', 'gsps-plugin' ),
		'parent_item_colon'  => __( 'Resource padre', 'gsps-plugin' ),
		'all_items'          => __( 'Todos los resources', 'gsps-plugin' ),
		'view_item'          => __( 'Ver Resource', 'gsps-plugin' ),
		'add_new_item'       => __( 'Agregar nuevo Resource', 'gsps-plugin' ),
		'add_new'            => __( 'Agregar nuevo', 'gsps-plugin' ),
		'edit_item'          => __( 'Editar Resource', 'gsps-plugin' ),
		'update_item'        => __( 'Actualizar Resource', 'gsps-plugin' ),
		'search_items'       => __( 'Buscar Resource', 'gsps-plugin' ),
		'not_found'          => __( 'No encontrado', 'gsps-plugin' ),
		'not_found_in_trash' => __( 'No encontrado en la papelera', 'gsps-plugin' ),
	);

	// Set other options for Custom Post Type.
	$args = array(
		'label'               => __( 'resource', 'gsps-plugin' ),
		'description'         => __( 'Resource', 'gsps-plugin' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor.
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
		// You can associate this CPT with a taxonomy or custom taxonomy.
		'taxonomies'          => array( 'post_tag'),

		/**
		* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 16,
		'can_export'          => true,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => array(
			'slug' => 'resource',
		),
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
		'menu_icon'           => 'dashicons-admin-links',
		'with_front'          => false,
		'timestamp'           => true,
	);

	// Registering your Custom Post Type.
	register_post_type( 'resource', $args );
}
add_action( 'init', 'custom_post_type_resource', 0 );

/*** META BOX ***/
add_filter( 'rwmb_meta_boxes', 'mbox_register_meta_boxes' );
function mbox_register_meta_boxes( $meta_boxes ) {
  	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'mb_upload',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Campos adicionales', 'mbox' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array('post','page','resource'),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'low',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
			//  PDF
			array(
				'id'               => 'mb_file',
				'name'             => 'PDF File upload',
				'type'             => 'file_upload',
			
				// Delete file from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same file for multiple posts
				'force_delete'     => false,
			
				// Maximum file uploads.
				'max_file_uploads' => 2,
			
				// File types.
				'mime_type'        => 'application',
			
				// Do not show how many files uploaded/remaining.
				'max_status'       => false,
			),
			array (
				'id' => 'text_1',
				'type' => 'text',
				'name' => 'Source Title',
				'size' => 50,
				'clone' => 1,
				'sort_clone' => 1,
			),
			array (
				'id' => 'url_1',
				'type' => 'url',
				'name' => 'Source URL',
				'size' => 50,
				'clone' => 1,
				'sort_clone' => 1,
			),
		)
	);
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'mb_post',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Pilot additional fields', 'mbox' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array('post'),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'low',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		
		// List of meta fields
		'fields'     => array(
			array(
				'name'             => 'Pilot Header Image Upload',
				'id'               => 'pilot_header',
				'type'             => 'image',
				'link'			   => true,
			
				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,
			
				// Maximum image uploads
				'max_file_uploads' => 1,
			),
		)
	);
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'mb_quote',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Quote additional fields', 'mbox' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array('post'),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'low',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		
		// List of meta fields
		'fields'     => array(
			array(
				'name' => 'Clickable',
				'id'   => 'with_link',
				'type' => 'checkbox',
				'std'  => 0, // 0 or 1
			),
			array (
				'id' => 'quoter_name',
				'type' => 'text',
				'name' => 'Quoter name/s',
				'size' => 50,
			),
			array (
				'id' => 'quoter_position',
				'type' => 'text',
				'name' => 'Position',
				'size' => 50,
			),
		)
	);
	return $meta_boxes;
}



/*** Show posts on Home filtered by posts per page, category and offset ***/
if ( ! function_exists( 'wp_front_posts_per_category' ) ) {
	function wp_front_posts_per_category($ppp,$category,$offset) {
		$args = array(
			'post_type'              => 'post',
			'post_status'            => 'publish',
			'posts_per_page'         => $ppp,
			'category_name'          => $category,
			'no_found_rows'          => true,
      		'offset'                 => $offset,
		);
		// The Query
		$query_ppc = new WP_Query( $args );
		if ( $query_ppc->have_posts() ) { 
			while ( $query_ppc->have_posts() ) : $query_ppc->the_post();
			get_template_part( 'template-parts/content', 'card' );
			endwhile;
		}
	}
}

/*** Show Pilots on Home slider ***/
if ( ! function_exists( 'wp_front_pilot' ) ) {
	function wp_front_pilot() {
		$args = array(
			'post_type'              => 'post',
			'post_status'            => 'publish',
			'category_name'          => 'pilot',
			'posts_per_page'         => -1,
			'no_found_rows'          => true,
		);
		// The Query
		$query_ppc = new WP_Query( $args );
		$count = $query_ppc->post_count;
		if ( $query_ppc->have_posts() ) { 
			if ($count > 3) {
				echo '<div class="relative w-full pl-4 sm:px-8 lg:px-16 xl:px-20 mx-auto overflow-hidden"><div class="swiper-container"><div class="swiper-wrapper">';
					while ( $query_ppc->have_posts() ) : $query_ppc->the_post();
					get_template_part( 'template-parts/content', 'card-pilot' );
					endwhile;
				echo '</div></div>';
				echo '<!-- Add Arrows --><div class="swiper-button-next"></div><div class="swiper-button-prev"></div></div>';
			} else {
				echo '<div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto"><div class="grid lg:grid-cols-3 lg:grid-rows-1 gap-4">';
				while ( $query_ppc->have_posts() ) : $query_ppc->the_post();
				get_template_part( 'template-parts/content', 'card-pilot' );
				endwhile;
				echo '</div></div>';
			}
			
		}
	}
}

/*** Show Resources on Home grid ***/
if ( ! function_exists( 'wp_front_resources' ) ) {
	function wp_front_resources() {
		$args = array(
			'post_type'              => 'resource',
			'post_status'            => 'publish',
			'posts_per_page'         => 6,
			'no_found_rows'          => true,
		);
		// The Query
		$query_ppc = new WP_Query( $args );
		if ( $query_ppc->have_posts() ) { 
			while ( $query_ppc->have_posts() ) : $query_ppc->the_post();
			get_template_part( 'template-parts/content', 'card' );
			endwhile;
		}
	}
}


/**
 * Add tag support to pages
 */
function tags_support_all() {
	register_taxonomy_for_object_type('post_tag', 'page');
}

// ensure all tags are included in queries
function tags_support_query($wp_query) {
	if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');



function my_theme_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}
  
	return $title;
}

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );


/**
 * Automatically add IDs to headings
 */
function auto_id_headings( $content ) {

	$content = preg_replace_callback( '/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function( $matches ) {
		if ( ! stripos( $matches[0], 'id=' ) ) :
			$matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title( $matches[3] ) . '">' . $matches[3] . $matches[4];
		endif;
		return $matches[0];
	}, $content );

    return $content;

}
add_filter( 'the_content', 'auto_id_headings' );


function pagination_bar( $custom_query ) {

    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}

add_action('wp_ajax_myfilter', 'gsps_filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'gsps_filter_function');

function gsps_filter_function(){
	$posts_per_page = -1;
	$args = array(
		'post_type'=>array('post','resource'),
		'post_status'=>'publish',
		'posts_per_page' => $posts_per_page,
		'orderby'=> 'post_date', 
    	'order' => 'ASC',
		'tax_query' => array(
			'relation' => 'AND', 
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => [ 'pilot' ],
				'operator' => 'NOT IN'
			),
		)
	);
	if( !empty( $_POST['regionFilter'] ) ||  !empty( $_POST['sectorFilter']) ) {
		$relation = 'OR';
		if(!empty($_POST['regionFilter']) && isset( $_POST['sectorFilter'] )) {
			$relation = 'OR';
			if(!empty($_POST['regionFilter']) && !empty( $_POST['sectorFilter'] )) {
				$relation = 'AND';
			}
		}
		
		if( isset( $_POST['regionFilter'] ) ||  isset( $_POST['sectorFilter']) ) {
			$args['tax_query'] = array(
				'relation' => 'AND', 
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => [ 'pilot' ],
					'operator' => 'NOT IN'
				),
				array(
					'relation' => $relation, 
					array(
						'taxonomy' => 'sector',
						'field' => 'id',
						'terms' => $_POST['sectorFilter']
					),
					array(
						'taxonomy' => 'region',
						'field' => 'id',
						'terms' => $_POST['regionFilter'],
					),
				),
			);
		};
	}
	
	$query = new WP_Query( $args );

	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
			get_template_part( 'template-parts/content', 'card' );
		endwhile;
		
		wp_reset_postdata();
	else :
		echo 'There are no posts for this specific search.';
	endif;

	wp_die();
}
