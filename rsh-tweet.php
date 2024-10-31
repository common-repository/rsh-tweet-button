<?php
/*
Plugin Name: rsh-Tweet
Plugin URI: http://www.zoonte.com/
Description: Adds the official <a href="http://blog.twitter.com/2010/08/pushing-our-tweet-button.html">Tweet Button</a>. It lets your users share links directly from the page they’re on. When they click on the Tweet Button, a Tweet box will appear -- pre-populated with a shortened link that points to the item that they’re sharing.
Version: 1.0
Author: Iuhas I. Daniel
Author URI: http://www.zoonte.com/
*/

if ( !class_exists( 'rsh_TweetBtn' ) ) :

/**
 * Base class.
 * 
 * @package WP_Tweet
 */ 
class rsh_TweetBtn {
	
	/**
	 * Constructor. Adds hooks.
	 */
	function rsh_TweetBtn() {
			
		// Initialize default options and register the uninstall hook.
		register_activation_hook( __FILE__, array( 'rsh_TweetBtn', 'on_activation' ) );
		
		// Textdomain and whitlist options.
		add_action( 'admin_init',  array( &$this, 'rsh_admin_init') );
		
		// Add Tweet Button.
		add_action( 'the_content', array( &$this, 'rsh_content' ) );
		
		// Add settings page.
		add_action( 'admin_menu',  array( &$this, 'rsh_admin_menu' ) );
	}
	
	/**
	 * Runs on activation. Initializes the default options if they don't exist and registers the uninstallation hook.
	 */
	function on_activation() {
		$options = get_option( 'rsh-TweetBtn_options' );
		if ( ! $options ) {
			$options = array(
				'data-count' => 'horizontal',
				'data-text'  => 'title',
				'data-url'   => 'page',
				'data-lang'  => 'en',
				'align'      => 'left'
			);
			update_option( 'rsh-TweetBtn_options', $options );
		}

		// Register uninstall hook.
		register_uninstall_hook( __FILE__, array( 'rsh_TweetBtn', 'on_uninstall' ) );
	}
	
	/**
	 * Runs on uninstall. Removes all options.
	 */
	function on_uninstall() {
		delete_option( 'rsh-TweetBtn_options' );
		delete_option( 'rsh-TweetBtn_show' );
	}
	
	/**
	 * Attached to admin_init. Loads the textdomain and whitelist options.
	 */
	function rsh_admin_init() {
		load_plugin_textdomain( 'rsh-TweetBtn', null, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		register_setting( 'rsh-TweetBtn_settings', 'rsh-TweetBtn_options' );
		register_setting( 'rsh-TweetBtn_settings', 'rsh-TweetBtn_show' );
	}
	
	/**
	 * Attached to the_content. Adds the Tweet Button.
	 */
	function rsh_content( $content ) {
		$show_options = get_option( 'rsh-TweetBtn_show' );
		if ( ( is_front_page() && $show_options['home'] ) || ( is_single() && $show_options['post'] ) || ( is_page() && $show_options['page'] ) ) {

			$options = get_option( 'rsh-TweetBtn_options' );
			
			$button = "<div class='rsh-TweetBtn' style='" . esc_attr( $show_options['style'] ) . "'>";
			$button .= "<a href='http://twitter.com/share' class='twitter-share-button'";
			
			if ( "title" == $options['data-text'] )
				$button .= " data-text='" . get_the_title() . "'";
				
			$button .= " data-count='{$options['data-count']}' data-via='{$options['data-via']}'";
			
			if ( $options['data-related'] ) {
				$button .= " data-related='". esc_attr( $options['data-related'] );
					if ( $options['data-related-desc'] )
						$button .= ":" . esc_attr( $options['data-related-desc'] );
					$button .= "'";
			}
			
			$button .= " data-lang='{$options['data-lang']}'>Tweet</a></div>";
			
			if ( $options['before'] )
				$content = $button . $content;
			
			if ( $options['after'] )
				$content .= $button;
			echo '<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
		}
		return $content;
	}
	
	/**
	 * Attached to admin_menu. Adds the Tweet Button Settings Page under the Settings Menu.
	 */
	function rsh_admin_menu() {
	    add_options_page( 'rsh-Tweet Button', 'rsh-Tweet Button', 'manage_options', 'rsh-TweetBtn-settings', array( &$this, 'rsh_settings_page' ) );
	}
	
	/**
	 * Displays the settings page.
	 */
	function rsh_settings_page() {
		include ( dirname( __FILE__ ) . '/options.php' );
	} 
}

// Initialize.
$_GLOABALS['wp_tweet_instance'] = new rsh_TweetBtn();
endif;
?>