<?php

/**
 * Hack to refresh topic and forum data when bug prevents last active times from
 * updating (splits/merges/trash/spam/etc...)
 *
 * @author johnjamesjacoby
 * @since 1.0.1
 * @return If not refreshing
 */
function bbporg_recount_current_thing() {

	// Bail if not capable
	if ( ! current_user_can( 'moderate' ) )
		return;

	// Bail if no refresh
	if ( empty( $_GET['refresh'] ) || ( 'true' != $_GET['refresh'] ) )
		return;

	// Refresh topic data
	if ( bbp_is_single_topic() ) {
		bbp_update_topic_voice_count();
		bbp_update_topic_last_reply_id();
		bbp_update_topic_last_active_id();
		bbp_update_topic_last_active_time();

		// Redirect without _GET
		wp_safe_redirect( bbp_get_topic_permalink() );
		die;

	// Refresh forum data
	} elseif ( bbp_is_single_forum() ) {
		bbp_update_forum_last_reply_id();
		bbp_update_forum_last_topic_id();
		bbp_update_forum_last_active_id();
		bbp_update_forum_last_active_time();

		// Redirect without _GET
		wp_safe_redirect( bbp_get_forum_permalink() );
		die;
	}
}
add_action( 'bbp_template_redirect', 'bbporg_recount_current_thing' );

/**
 * Allow moderators to mark users as spammers
 *
 * @author johnjamesjacoby
 * @since 1.0.4
 * @return If not spamming a user
 */
function bbporg_make_user_spammer() {

	// Bail if not capable
	if ( ! current_user_can( 'moderate' ) )
		return;

	// Bail if not viewing a user
	if ( ! bbp_is_single_user() )
		return;

	// Bail if no refresh
	if ( empty( $_GET['spammer'] ) || ( 'true' != $_GET['spammer'] ) )
		return;

	// Get the user ID
	$user_id = bbp_get_displayed_user_id();

	// Bail if empty and protect super admins
	if ( empty( $user_id ) || is_super_admin( $user_id ) )
		return;

	global $wpdb;

	// Make array of post types to mark as spam
	$post_types  = array( bbp_get_topic_post_type(), bbp_get_reply_post_type() );
	$post_types  = "'" . implode( "', '", $post_types ) . "'";
	$status      = bbp_get_public_status_id();

	// Loop through blogs and remove their posts
	// Get topics and replies
	$posts = $wpdb->get_col( "SELECT ID FROM {$wpdb->posts} WHERE post_author = {$user_id} AND post_status = '{$status}' AND post_type IN ({$post_types})" );

	// Loop through posts and spam them
	if ( !empty( $posts ) ) {
		foreach ( $posts as $post_id ) {

			// The routines for topics ang replies are different, so use the
			// correct one based on the post type
			switch ( get_post_type( $post_id ) ) {
				case bbp_get_topic_post_type() :
					bbp_spam_topic( $post_id );
					break;

				case bbp_get_reply_post_type() :
					bbp_spam_reply( $post_id );
					break;
			}
		}
	}

	// Block the user
	bbp_set_user_role( $user_id, bbp_get_blocked_role() );

	// Redirect without _GET
	wp_safe_redirect( bbp_get_user_profile_url( $user_id ) );
	die;
}
add_action( 'bbp_template_redirect', 'bbporg_make_user_spammer' );
