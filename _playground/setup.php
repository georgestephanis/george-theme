<?php
/**
 * Some setup scripts to run when initializing a Playground environment.
 *
 * @package ThemeRepoTemplate
 */

namespace ThemeRepoTemplate\Setup;

/**
 * Set and flush rewrite rules.
 */

global $wp_rewrite;
$wp_rewrite->set_permalink_structure('/%postname%/');
$wp_rewrite->flush_rules();
