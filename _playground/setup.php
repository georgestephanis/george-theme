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

/**
 * Takes a path, and an array of replacements.
 *
 * Searches for all the keys, and swaps them over
 * to the replacements, in the directory specified.
 *
 * @param string $path.        The path to the directory to scan.
 * @param array  $replacements An associative array, with the keys as the search, and the values as the replacements.
 *
 * @return void
 */
function replace_in_path( $path, $replacements ) {
    $files = scandir( $path );

    if ( $files && is_array( $files ) ) {
        foreach ( $files as $file ) {
            $abspath = $path . DIRECTORY_SEPARATOR . $file;
            if ( in_array( $file, array( '.', '..' ) ) ) {
                // If it's a directory reference, skip.
                continue;
            } elseif ( is_dir( $abspath ) ) {
                // Recurse down into the directory.
                replace_in_path( $abspath, $replacements );
            } elseif ( is_writable( $abspath ) ) {
                $markup = file_get_contents( $abspath );
                $updated = str_replace( array_keys( $replacements ), array_values( $replacements ), $markup );
                if ( $markup !== $updated ) {
                    file_put_contents( $abspath, $updated );
                }
            }
        }
    }
}

if ( ! empty( $starter_content['nav_menus'] ) && is_array( $starter_content['nav_menus'] ) ) {
    foreach ( $starter_content['nav_menus'] as $slug => $properties ) {
        $nav_menu = wp_get_nav_menu_object( "{$slug}-menu" );
        if ( $nav_menu ) {
            $key = sprintf( '<!-- wp:navigation {"slug":"%s",', esc_attr( $slug ) );
            $nav_menus[ $key ] = sprintf( '<!-- wp:navigation {"ref":%d,', intval( $nav_menu->term_id ) );
        }
    }

    replace_in_path( __DIR__ . '/../parts', $nav_menus );
    replace_in_path( __DIR__ . '/../templates', $nav_menus );
    replace_in_path( __DIR__ . '/../patterns', $nav_menus );
}
