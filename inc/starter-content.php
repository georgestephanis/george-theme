<?php
/**
 * Theme Repo Template Starter Content
 *
 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
 *
 * @package ThemeRepoTemplate
 */

namespace ThemeRepoTemplate\StarterContent;

/**
 * Returns the array of starter content for the theme.
 *
 * Passes it through the `twombly_starter_content` filter before returning.
 *
 * @return array A filtered array of args for the starter_content.
 */
function get_starter_content() {
	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(

		'posts'     => array(
			'front' => array(
				'post_type'    => 'page',
				'post_title'   => esc_html_x( 'Front Page', 'Theme starter content', 'theme-repo-template' ),
				'post_content' => '<!-- wp:heading -->
<h2 class="wp-block-heading">I am a heading!</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam facilisis metus sit amet consequat dignissim. Etiam pretium nisi orci, quis congue enim mattis placerat. Integer vulputate lectus sit amet justo fringilla, non pretium justo condimentum. Aenean tempor ut nibh eget pellentesque. Mauris at condimentum arcu, ac gravida nulla. Etiam iaculis volutpat facilisis. Aliquam imperdiet vitae nulla vel fringilla.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:paragraph -->
<p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur quis sapien consequat, condimentum diam sit amet, lobortis quam. Donec tempor odio et turpis pulvinar, eget ornare justo bibendum. Maecenas ipsum nulla, semper a neque sit amet, finibus scelerisque ex. Sed fermentum, augue nec pretium semper, mi eros hendrerit nisi, vitae ultrices nibh lectus nec ex. Etiam turpis sem, tincidunt vel vehicula ac, ornare vitae magna. Aenean sollicitudin mi vitae lorem ultrices malesuada. Aliquam at massa et massa ornare sollicitudin. Maecenas porta diam sed odio bibendum, in fringilla sapien consectetur. Donec at convallis ante, quis pharetra quam. Sed vitae ante ut nulla scelerisque tempus. Nam at diam facilisis nibh eleifend ornare. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			),
			'about',
			'contact',
			'blog',
			'news',
		),

		'attachments' => array(
			'wapuu' => array(
				'post_title' => esc_html_x( 'Wapuu', 'Theme starter content', 'theme-repo-template' ),
				'file'       => '_playground/wapuu.png',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options'   => array(
			'show_on_front'   => 'page',
			'page_on_front'   => '{{front}}',
			'page_for_posts'  => '{{blog}}',
			'site_icon'       => '{{wapuu}}',
			'blogname'        => esc_html_x( 'Theme Repo Template', 'Theme starter content', 'theme-repo-template' ),
			'blogdescription' => esc_html_x( 'Another fine WordPress Block Theme', 'Theme starter content', 'theme-repo-template' ),
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "primary" location.
			'primary' => array(
				'name'  => esc_html_x( 'Primary menu', 'Theme starter content', 'theme-repo-template' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "footer" location.
			'footer'  => array(
				'name'  => esc_html__( 'Footer menu', 'theme-repo-template' ),
				'items' => array(
					'link_home',
					'link_news',
					'link_email',
					'link_github' => array(
						'title' => esc_html_x( 'Theme Repo Template', 'Theme starter content', 'theme-repo-template' ),
						'url'   => 'https://github.com/georgestephanis/theme-repo-template/',
					),
				),
			),
		),
	);

	/**
	 * Filters the array of starter content.
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters( 'gtheme_starter_content', $starter_content );
}
