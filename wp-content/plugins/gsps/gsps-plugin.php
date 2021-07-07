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
		'search_items'      => __( 'Search components' ),
		'all_items'         => __( 'All tipos de component' ),
		'parent_item'       => __( 'Component padre' ),
		'parent_item_colon' => __( 'Component padre:' ),
		'edit_item'         => __( 'Edit Component' ),
		'update_item'       => __( 'Update Component' ),
		'add_new_item'      => __( 'Add new Component' ),
		'new_item_name'     => __( 'New Component' ),
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
	register_taxonomy( 'region', array( 'resource', 'post', 'page', 'legalpathway' ), $args );
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
	register_taxonomy( 'sector', array( 'resource', 'post', 'page', 'legalpathway' ), $args );
}
add_action( 'init', 'wporg_register_taxonomy_sector' );


/*** CPT Resources ***/
function custom_post_type_resource() {
	// Set UI labels for Custom Post Type.
	$labels = array(
		'name'               => _x( 'Resources', 'Post Type General Name', 'gsps-plugin' ),
		'singular_name'      => _x( 'Resource', 'Post Type Singular Name', 'gsps-plugin' ),
		'menu_name'          => __( 'Resources', 'gsps-plugin' ),
		'parent_item_colon'  => __( 'Parent Resource', 'gsps-plugin' ),
		'all_items'          => __( 'All resources', 'gsps-plugin' ),
		'view_item'          => __( 'View Resource', 'gsps-plugin' ),
		'add_new_item'       => __( 'Add new Resource', 'gsps-plugin' ),
		'add_new'            => __( 'Add new', 'gsps-plugin' ),
		'edit_item'          => __( 'Edit Resource', 'gsps-plugin' ),
		'update_item'        => __( 'Update Resource', 'gsps-plugin' ),
		'search_items'       => __( 'Search Resource', 'gsps-plugin' ),
		'not_found'          => __( 'Not found', 'gsps-plugin' ),
		'not_found_in_trash' => __( 'Not found on Trash', 'gsps-plugin' ),
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


/*** CPT Resources ***/
function custom_post_type_legalpathway() {
	// Set UI labels for Custom Post Type.
	$labels = array(
		'name'               => _x( 'Legal Pathways', 'Post Type General Name', 'gsps-plugin' ),
		'singular_name'      => _x( 'Legal Pathways', 'Post Type Singular Name', 'gsps-plugin' ),
		'menu_name'          => __( 'Legal Pathways', 'gsps-plugin' ),
		'parent_item_colon'  => __( 'Legal Pathways padre', 'gsps-plugin' ),
		'all_items'          => __( 'All Legal Pathways', 'gsps-plugin' ),
		'view_item'          => __( 'View Legal Pathways', 'gsps-plugin' ),
		'add_new_item'       => __( 'Add new Legal Pathways', 'gsps-plugin' ),
		'add_new'            => __( 'Add new', 'gsps-plugin' ),
		'edit_item'          => __( 'Edit Legal Pathways', 'gsps-plugin' ),
		'update_item'        => __( 'Update Legal Pathways', 'gsps-plugin' ),
		'search_items'       => __( 'Search Legal Pathways', 'gsps-plugin' ),
		'not_found'          => __( 'Not found', 'gsps-plugin' ),
		'not_found_in_trash' => __( 'Not found on Trash', 'gsps-plugin' ),
	);

	// Set other options for Custom Post Type.
	$args = array(
		'label'               => __( 'legalpathway', 'gsps-plugin' ),
		'description'         => __( 'Legal Pathway', 'gsps-plugin' ),
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
			'slug' => 'legalpathway',
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
	register_post_type( 'legalpathway', $args );
}
add_action( 'init', 'custom_post_type_legalpathway', 0 );


/*** META BOX ***/
add_filter( 'rwmb_meta_boxes', 'mbox_register_meta_boxes' );
function mbox_register_meta_boxes( $meta_boxes ) {
  	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'mb_upload',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Additional fields', 'mbox' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array('post','page','legalpathway'),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'low',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
			array (
				'id' => 'story_author',
				'type' => 'text',
				'name' => 'Story author name',
				'size' => 50,
			),
			array (
				'id' => 'story_link',
				'type' => 'text',
				'name' => 'Story author link',
				'size' => 50,
			),
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
				'type'             => 'image_advanced',
			
				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,
			
				// Maximum image uploads
				'max_file_uploads' => 1,
				'image_size'       => 'thumbnail',
				'label_description' => 'When possible, please use an image that is 1280 pixels wide x 680
				pixels tall.',
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

	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'mb_legalpathways',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Legal pathways additional fields', 'mbox' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array('legalpathway'),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'low',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		
		// List of meta fields
		'fields'     => array(
			array (
				'id' => 'mb_cod',
				'type' => 'text',
				'name' => 'Country of destination',
			),
			array (
				'id' => 'mb_coo',
				'type' => 'text',
				'name' => 'Country of origin',
			),
			array (
				'id' => 'mb_skill',
				'type' => 'text',
				'name' => 'Skill level',
			),
			array (
				'id' => 'mb_timeline',
				'type' => 'text',
				'name' => 'Timeline',
			),
			array (
				'id' => 'mb_beneficiaries',
				'type' => 'text',
				'name' => 'Number of beneficiaries',
			),
		)
	);
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'mb_legalpathways',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Legal pathways additional fields', 'mbox' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array('legalpathway'),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'low',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		
		// List of meta fields
		'fields'     => array(
			array (
				'id' => 'mb_cod',
				'type' => 'text',
				'name' => 'Country of destination',
			),
			array (
				'id' => 'mb_coo',
				'type' => 'text',
				'name' => 'Country of origin',
			),
			array (
				'id' => 'mb_skill',
				'type' => 'text',
				'name' => 'Skill level',
			),
			array (
				'id' => 'mb_timeline',
				'type' => 'text',
				'name' => 'Timeline',
			),
			array (
				'id' => 'mb_beneficiaries',
				'type' => 'text',
				'name' => 'Number of beneficiaries',
			),
		)
	);
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'mb_resource',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Resource additional fields', 'mbox' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array('resource'),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'low',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		
		// List of meta fields
		'fields'     => array(
			array (
				'id'   => 'resource_url',
				'type' => 'url', // New HTML 5 input type
				'name' => 'Url',
				'label_description' => 'Enter url to redirect to.'
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
				echo '<!-- Add Arrows --><div class="swiper-button-next z-40"></div><div class="swiper-button-prev z-40"></div></div>';
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
	function wp_front_resources($ppp) {
		$args = array(
			'post_type'              => 'resource',
			'post_status'            => 'publish',
			'posts_per_page'         => $ppp,
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

/*** Show Pilots on Home slider ***/
if ( ! function_exists( 'wp_related_content' ) ) {
	function wp_related_content() {
		
		$sectors = get_the_terms( get_the_ID(), 'sector' );
		if ( $sectors && ! is_wp_error( $sectors ) ) {
			foreach ( $sectors as $sector ) {
				$sector_ids[] = $sector->term_id;
			}
		}
		if ( $regions && ! is_wp_error( $regions ) ) {
			$regions = get_the_terms( get_the_ID(), 'region' );
			foreach ( $regions as $region ) {
				$region_ids[] = $region->term_id;
			}
		}
		
		$args = array(
			'post_type' => array('post','resource','legalpathway'),
			'post_status'    => 'publish',
			'posts_per_page' => 8, // Get all posts
			'post__not_in'   => array( get_the_ID() ), // Hide current post in list of related content
			'tax_query'      => array(
				'relation' => 'OR', // Make sure to mach both category and term
				array(
					'taxonomy' => 'sector',
					'field'    => 'term_id',
					'terms'    => $sector_ids,
				),
				array(
					'taxonomy' => 'region',
					'field'    => 'term_id',
					'terms'    => $region_ids,
				),
			),
			'orderby' => 'date',
		);
		$query_ppc = new WP_Query( $args );
		$count = $query_ppc->post_count;
		if ( $query_ppc->have_posts() ) { 
			echo '<div id="related-content" class="relative bg-gray-100 py-20"><div class="text-xl md:text-xl font-semibold pl-4 sm:px-8 lg:px-16 xl:px-20 mb-8">Related content</div>';
			if ($count > 3) {
				echo '<div class="relative w-full pl-4 sm:px-8 lg:px-16 xl:px-20 mx-auto overflow-hidden"><div class="swiper-container"><div class="swiper-wrapper">';
					while ( $query_ppc->have_posts() ) : $query_ppc->the_post();
					get_template_part( 'template-parts/content', 'card-generic' );
					endwhile; wp_reset_postdata(); 
				echo '</div></div>';
				echo '<!-- Add Arrows --><div class="swiper-button-next"></div><div class="swiper-button-prev"></div></div>';
			} else {
				echo '<div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto"><div class="grid lg:grid-cols-3 lg:grid-rows-1 gap-4">';
				while ( $query_ppc->have_posts() ) : $query_ppc->the_post();
				get_template_part( 'template-parts/content', 'card-generic' );
				endwhile; wp_reset_postdata(); 
				echo '</div></div>';
			}
			echo '</div>';
		} else {
			echo '<div id="related-content" class="relative bg-gray-100 py-20"><div class="text-xl md:text-xl font-semibold pl-4 sm:px-8 lg:px-16 xl:px-20 mb-8">Related content</div>';
			wp_front_pilot();
			echo '</div>';
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


function pagination_bar( $query ) {

    $total_pages = $query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ).'#stories-and-more',
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}
// Enqueue scripts to Front Page
function gsps_enqueue_front_page_scripts() {
    if( is_front_page() )
    {
        wp_enqueue_script( 'global-skills-map', 'https://sociopublico.github.io/global-skills-map/pym.v1.min.js', array( 'jquery' ), null, true );
    }
}
add_action( 'wp_enqueue_scripts', 'gsps_enqueue_front_page_scripts' );



add_action('admin_init', 'gsps_general_section');  
function gsps_general_section() {  
    add_settings_section(  
        'gsps_settings_section', // Section ID 
        'Migration pathways Map', // Section Title
        'my_section_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field( // Map url
        'map_url', // Option ID
        'Map url', // Label
        'my_urlbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'gsps_settings_section', // Name of our section
        array( // The $args
            'map_url' // Should match Option ID
        )  
    ); 

    add_settings_field( // Map text
        'map_text', // Option ID
        'Map text', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'gsps_settings_section', // Name of our section (General Settings)
        array( // The $args
            'map_text' // Should match Option ID
        )  
    ); 

    register_setting('general','map_url', 'esc_attr');
    register_setting('general','map_text','');
}

function my_section_options_callback() { // Section Callback
    echo '<p>Enter map url and legal or explanatory text.</p>';  
}

function my_urlbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}
function my_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo wp_editor( 
        $option, 
        'map_text', 
        array( 'textarea_name' => 'map_text' ) 
    );
}



