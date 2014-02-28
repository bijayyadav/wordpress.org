<?php

/**
 * Remove a few toolbar items we do not need
 *
 * @author johnjamesjacoby
 * @since 1.0.1
 */
function bporg_toolbar_tweaks() {
	remove_action( 'admin_bar_menu', 'wp_admin_bar_search_menu',   4  );
	remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu',       10 );
	remove_action( 'admin_bar_menu', 'wp_admin_bar_site_menu',     30 );
	remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );

	// BuddyPress Menus
	remove_action( 'bp_setup_admin_bar', 'bp_members_admin_bar_my_account_menu', 4 );

	if ( is_super_admin() )
		return;

	remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu',    60 );
	remove_action( 'admin_bar_menu', 'wp_admin_bar_new_content_menu', 70 );
	remove_action( 'admin_bar_menu', 'wp_admin_bar_edit_menu',        80 );
}
add_action( 'add_admin_bar_menus', 'bporg_toolbar_tweaks', 11 );

/**
 * Remove the BuddyPress and bbPress about menus
 *
 * @author johnjamesjacoby
 * @global object $wp_admin_bar
 */
function bporg_remove_about_pages( $wp_admin_bar ) {
	$wp_admin_bar->remove_menu( 'bp-about'  );
	$wp_admin_bar->remove_menu( 'bbp-about' );
}
add_action( 'admin_bar_menu', 'bporg_remove_about_pages', 99 );

/**
 * Add a new main top-left menu with links for each project.
 *
 * @todo GlotPress/BackPress
 *
 * @author johnjamesjacoby
 * @since 1.0.1
 */
function bporg_new_admin_bar_wp_menu( $wp_admin_bar ) {
	$wp_admin_bar->add_menu( array(
		'id'    => 'wp-logo',
		'title' => '<span class="ab-icon"></span>',
		'href'  => 'http://wordpress.org',
		'meta'  => array(
			'title' => __( 'WordPress.org' ),
		),
	) );

	/** WordPress *************************************************************/

	// Add "About WordPress" link
	$wp_admin_bar->add_menu( array(
		'parent' => 'wp-logo',
		'id'     => 'wordpress',
		'title'  => __( 'WordPress.org' ),
		'href'  => 'http://wordpress.org',
	) );

	$wp_admin_bar->add_menu( array(
		'parent' => 'wordpress',
		'id'     => 'wp-about',
		'title'  => __( 'About WordPress' ),
		'href'   => 'http://wordpress.org/about/',
	) );

	// Add codex link
	$wp_admin_bar->add_menu( array(
		'parent'    => 'wordpress',
		'id'        => 'wp-documentation',
		'title'     => __('Documentation'),
		'href'      => 'http://codex.wordpress.org/',
	) );

	// Add forums link
	$wp_admin_bar->add_menu( array(
		'parent'    => 'wordpress',
		'id'        => 'wp-support-forums',
		'title'     => __('Support Forums'),
		'href'      => 'http://wordpress.org/support/',
	) );

	// Add feedback link
	$wp_admin_bar->add_menu( array(
		'parent'    => 'wordpress',
		'id'        => 'wp-feedback',
		'title'     => __('Feedback'),
		'href'      => 'http://wordpress.org/support/forum/requests-and-feedback',
	) );

	/** BuddyPress Developer **/
	$wp_admin_bar->add_group( array(
		'parent' => 'wordpress',
		'id'     => 'wp-developer',
		'meta'   => array(
			'class' => 'ab-sub-secondary',
		),
	) );

	$wp_admin_bar->add_menu( array(
		'parent' => 'wp-developer',
		'id'     => 'wp-trac',
		'title'  => __( 'Developer Trac' ),
		'href'   => 'http://core.trac.wordpress.org'
	) );

	$wp_admin_bar->add_menu( array(
		'parent' => 'wp-developer',
		'id'     => 'wp-dev-blog',
		'title'  => __( 'Developer Blog' ),
		'href'   => 'http://make.wordpress.org'
	) );

	/** bbPress ***************************************************************/

	// Add "About WordPress" link
	$wp_admin_bar->add_menu( array(
		'parent' => 'wp-logo',
		'id'     => 'bbpress',
		'title'  => __( 'bbPress.org' ),
		'href'  => 'http://bbpress.org',
	) );

	$wp_admin_bar->add_menu( array(
		'parent' => 'bbpress',
		'id'     => 'bbp-about',
		'title'  => __( 'About bbPress' ),
		'href'   => 'http://bbpress.org/about/',
	) );

	// Add codex link
	$wp_admin_bar->add_menu( array(
		'parent'    => 'bbpress',
		'id'        => 'bbp-documentation',
		'title'     => __( 'Documentation' ),
		'href'      => 'http://codex.bbpress.org/',
	) );

	// Add forums link
	$wp_admin_bar->add_menu( array(
		'parent'    => 'bbpress',
		'id'        => 'bbp-support-forums',
		'title'     => __( 'Support Forums' ),
		'href'      => __( 'http://bbpress.org/forums/' ),
	) );

	// Add feedback link
	$wp_admin_bar->add_menu( array(
		'parent'    => 'bbpress',
		'id'        => 'bbp-feedback',
		'title'     => __( 'Feedback' ),
		'href'      => 'http://bbpress.org/forums/forum/requests-and-feedback',
	) );

	/** BuddyPress Developer **/
	$wp_admin_bar->add_group( array(
		'parent' => 'bbpress',
		'id'     => 'bbp-developer',
		'meta'   => array(
			'class' => 'ab-sub-secondary',
		),
	) );

	$wp_admin_bar->add_menu( array(
		'parent' => 'bbp-developer',
		'id'     => 'bbp-trac',
		'title'  => __( 'Developer Trac' ),
		'href'   => 'http://bbpress.trac.wordpress.org'
	) );

	$wp_admin_bar->add_menu( array(
		'parent' => 'bbp-developer',
		'id'     => 'bbp-dev-blog',
		'title'  => __( 'Developer Blog' ),
		'href'   => 'http://bbpdevel.wordpress.com'
	) );

	/** BuddyPress ************************************************************/

	// Add "About WordPress" link
	$wp_admin_bar->add_menu( array(
		'parent' => 'wp-logo',
		'id'     => 'buddypress',
		'title'  => __( 'BuddyPress.org' ),
		'href'  => 'http://buddypress.org',
	) );

	$wp_admin_bar->add_menu( array(
		'parent' => 'buddypress',
		'id'     => 'bp-about',
		'title'  => __( 'About BuddyPress' ),
		'href'   => 'http://buddypress.org/about/',
	) );

	// Add codex link
	$wp_admin_bar->add_menu( array(
		'parent'    => 'buddypress',
		'id'        => 'bp-documentation',
		'title'     => __( 'Documentation' ),
		'href'      => 'http://codex.buddypress.org/',
	) );

	// Add forums link
	$wp_admin_bar->add_menu( array(
		'parent'    => 'buddypress',
		'id'        => 'bp-support-forums',
		'title'     => __( 'Support Forums' ),
		'href'      => 'http://buddypress.org/forums/',
	) );

	// Add feedback link
	$wp_admin_bar->add_menu( array(
		'parent'    => 'buddypress',
		'id'        => 'bp-feedback',
		'title'     => __( 'Feedback' ),
		'href'      => 'http://buddypress.org/support/forum/feedback/',
	) );

	/** BuddyPress Developer **/
	$wp_admin_bar->add_group( array(
		'parent' => 'buddypress',
		'id'     => 'bp-developer',
		'meta'   => array(
			'class' => 'ab-sub-secondary',
		),
	) );

	$wp_admin_bar->add_menu( array(
		'parent' => 'bp-developer',
		'id'     => 'bp-trac',
		'title'  => __( 'Developer Trac' ),
		'href'   => 'http://buddypress.trac.wordpress.org'
	) );

	$wp_admin_bar->add_menu( array(
		'parent' => 'bp-developer',
		'id'     => 'bp-dev-blog',
		'title'  => __( 'Developer Blog' ),
		'href'   => 'http://bpdevel.wordpress.com'
	) );
}
add_action( 'admin_bar_menu', 'bporg_new_admin_bar_wp_menu', 10 );

/**
 * Add a new "Site Name" menu with less things for average users to do
 *
 *
 * @author johnjamesjacoby
 * @since 1.0.2
 */
function bporg_new_admin_bar_site_menu( $wp_admin_bar ) {

	// Profiles
	if ( 'profiles.wordpress.org' == $_SERVER['HTTP_HOST'] ) {
		$wp_admin_bar->add_menu( array(
			'id'    => 'bp-site-name',
			'title' => __( 'WordPress.org' ),
			'href'  => 'http://wordpress.org'
		) );

		return;

	// bbPress Codex
	} elseif ( 'codex.bbpress.org' == $_SERVER['HTTP_HOST'] ) {
		$wp_admin_bar->add_menu( array(
			'id'    => 'bp-site-name',
			'title' => __( 'bbPress.org' ),
			'href'  => 'http://bbpress.org'
		) );

		return;

	// BuddyPress Network
	} else {
		$wp_admin_bar->add_menu( array(
			'id'    => 'bp-site-name',
			'title' => __( 'BuddyPress.org' ),
			'href'  => 'http://buddypress.org'
		) );
	}

	// Create submenu items.

	if ( is_user_logged_in() ) {

		// Add an option to visit the site.
		$wp_admin_bar->add_menu( array(
			'parent' => 'bp-site-name',
			'id'     => 'bp-new-topic',
			'title'  => __( 'Create New Topic' ),
			'href'   => 'http://buddypress.org/forums/new-topic/'
		) );

		// Add an option to visit the admin dashboard
		if ( is_super_admin() ) {

			$wp_admin_bar->add_group( array(
				'parent' => 'bp-site-name',
				'id'     => 'bp-site-name-super-admin',
				'meta'   => array(
					'class' => 'ab-sub-secondary',
				),
			) );

			$wp_admin_bar->add_menu( array(
				'parent' => 'bp-site-name-super-admin',
				'id'     => 'bp-admin-link',
				'title'  => __( 'Admin Dashbooard' ),
				'href'   => get_admin_url()
			) );
		}

	// Not logged in
	} else {
		$wp_admin_bar->add_menu( array(
			'parent' => 'bp-site-name',
			'id'     => 'bp-login',
			'title'  => __( 'Log in' ),
			'href'   => 'http://buddypress.org/login/'
		) );
	}
}
add_action( 'admin_bar_menu', 'bporg_new_admin_bar_site_menu', 20 );

/**
 * Add the "My Account" menu and all submenus.
 *
 * @since BuddyPress (1.6)
 * @todo Deprecate WP 3.2 Toolbar compatibility when we drop 3.2 support
 */
function bporg_admin_bar_my_account_menu( $wp_admin_bar ) {
	global $bp;

	// Logged in user
	if ( is_user_logged_in() ) {

		// Manually include this, incase of BP maintenance mode
		if ( ! function_exists( 'bp_loggedin_user_domain' ) ) {
			require_once( WP_CONTENT_DIR . '/plugins/buddypress/bp-members/bp-members-template.php' );
		}

		// Stored in the global so we can add menus easily later on
		$bp->my_account_menu_id = 'my-account-buddypress';

		// Create the main 'My Account' menu
		$wp_admin_bar->add_menu( array(
			'id'     => $bp->my_account_menu_id,
			'group'  => true,
			'title'  => __( 'Edit My Profile', 'buddypress' ),
			'href'   => bp_loggedin_user_domain(),
			'meta'   => array(
			'class'  => 'ab-sub-secondary'
		) ) );

	// Show login and sign-up links
	} elseif ( !empty( $wp_admin_bar ) ) {
		add_filter ( 'show_admin_bar', '__return_true' );

		$wp_admin_bar->add_group( array(
			'parent' => 'my-account',
			'id'     => 'user-actions',
		) );

		$user_info  = get_avatar( 0, 64, 'mystery' );
		$user_info .= '<span class="display-name">Anonymous</span>';
		$user_info .= '<span class="username">Not Logged In</span>';

		$wp_admin_bar->add_menu( array(
			'parent' => 'user-actions',
			'id'     => 'user-info',
			'title'  => $user_info,
			'href'   => 'http://buddypress.org/login/',
			'meta'   => array(
				'tabindex' => -1,
			),
		) );

		$wp_admin_bar->add_menu( array(
			'parent' => 'user-actions',
			'id'     => 'register',
			'title'  => __( 'Register' ),
			'href'   => 'http://buddypress.org/register/'
		) );
		$wp_admin_bar->add_menu( array(
			'parent' => 'user-actions',
			'id'     => 'lost-pass',
			'title'  => __( 'Lost Password' ),
			'href'   => 'http://buddypress.org/lost-password/'
		) );
		$wp_admin_bar->add_menu( array(
			'parent' => 'user-actions',
			'id'     => 'login',
			'title'  => __( 'Log In' ),
			'href'   => 'http://buddypress.org/login/'
		) );
	}
}
add_action( 'admin_bar_menu', 'bporg_admin_bar_my_account_menu', 4 );

/**
 * Add the "My Account" item.
 *
 * @author johnjamesjacoby
 * @since 1.0.2
 */
function bporg_admin_bar_my_account_item( $wp_admin_bar ) {

	if ( is_user_logged_in() )
		return;

	$avatar = get_avatar( 0, 16, 'mystery' );
	$howdy  = __( 'Anonymous' );
	$class  = empty( $avatar ) ? '' : 'with-avatar';

	$wp_admin_bar->add_menu( array(
		'id'        => 'my-account',
		'parent'    => 'top-secondary',
		'title'     => $howdy . $avatar,
		'href'      => 'http://buddypress.org/login/',
		'meta'      => array(
			'class'     => $class,
			'title'     => __('My Account'),
		),
	) );
}
add_action( 'admin_bar_menu', 'bporg_admin_bar_my_account_item', 0 );
