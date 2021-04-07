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
		if ( $query_ppc->have_posts() ) { 
			while ( $query_ppc->have_posts() ) : $query_ppc->the_post();
			get_template_part( 'template-parts/content', 'card-pilot' );
			endwhile;
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
 * Automatically add IDs to headings such as <h2></h2>
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