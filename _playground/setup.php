<?php
/**
 * Some setup scripts to run when initializing a Playground environment.
 *
 * @package GeorgeTheme
 */

namespace GeorgeTheme\Setup;

/**
 * Set and flush rewrite rules.
 */

global $wp_rewrite;
$wp_rewrite->set_permalink_structure('/%postname%/');
$wp_rewrite->flush_rules();

/**
 * Get the nav menu ids for each slug, and map them in.
 */

include_once __DIR__ . '/../inc/starter-content.php';

$starter_content = \GeorgeTheme\StarterContent\get_starter_content();
$nav_menus       = array();

if ( ! empty( $starter_content['nav_menus'] ) && is_array( $starter_content['nav_menus'] ) ) {
    foreach ( $starter_content['nav_menus'] as $slug => $properties ) {
        $nav_menu = wp_get_nav_menu_object( "{$slug}-menu" );
        if ( $nav_menu ) {
            $nav_menus[ $slug ] = $nav_menu->term_id;
        }
    }

    update_option( 'blogdescription', wp_json_encode( $nav_menus ) );
}
