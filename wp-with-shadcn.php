<?php
/*
 * Plugin Name: Wp Shad CDN
 */

/**
 * ReactConnect
 */
class ShadCdn {
	
	/**
	 * The single instance of the class.
	 *
	 * @var object
	 */
	protected static $instance = null;
	/**
	 * @return self
	 */
	final public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
	
	/**
	 * __construct
	 */
	public function __construct() {
		add_action( 'admin_menu', [ $this, 'admin_menu_register' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'rest_api_init', [ $this, 'api_init' ] );
	}
	
	/**
	 * @return void
	 */
	public function api_init() {
		register_rest_route(
			'RC/v1/api',
			'/updateOptions',
			[
				'methods'             => 'POST',
				'callback'            => [ $this, 'rc_update_options' ],
				'permission_callback' => [ $this, 'login_permission_callback' ],
			]
		);
		register_rest_route(
			'RC/v1/api',
			'/getOptions',
			[
				'methods'             => 'GET',
				'callback'            => [ $this, 'rc_get_options' ],
				'permission_callback' => [ $this, 'login_permission_callback' ],
			]
		);
	}
	
	/**
	 * @return true
	 */
	public function login_permission_callback() {
		return current_user_can( 'manage_options' );
	}
	
	/**
	 * @return array
	 */
	public function rc_update_options( $request ) {
		$result       = [
			'message' => esc_html__( 'Update failed. Maybe change not found. ', 'dfsdfd' ),
		];
		$params       = $request->get_params();
		$get_settings = get_option( 'ShadCdn_settings', [] );
		if ( isset( $params['name'] ) ) {
			$get_settings['name'] = $params['name'];
		}
		if ( isset( $params['agree'] ) ) {
			$get_settings['agree'] = $params['agree'];
		}
		$options           = update_option( 'ShadCdn_settings', $get_settings );
		$result['updated'] = boolval( $options );
		if ( $result['updated'] ) {
			$result['message'] = esc_html__( 'Updated.', 'ancenter' );
		}
		return $result;
	}
	
	/**
	 * @return false|string
	 */
	public function rc_get_options() {
		$the_settings = get_option( 'ShadCdn_settings', [] );
		return wp_json_encode( $the_settings );
	}
	
	/**
	 * @return void
	 */
	public function enqueue_scripts() {
		
		$styles = [
			[
				'handle' => 'ShadCdn-connect',
				'src'    => plugin_dir_url( __FILE__ ) . 'assets/admin/admin-settings.css' ,
			],
		];

		// Register public styles.
		foreach ( $styles as $style ) {
			wp_register_style( $style['handle'], $style['src'], '', '1.0.0' );
		}
		
		wp_enqueue_style( 'ShadCdn-connect' );
		
		wp_enqueue_script(
			'ShadCdn-connect',
			plugin_dir_url( __FILE__ ) . 'assets/admin/admin-settings.js',
			[],
			'1.0',
			true
		);

		wp_localize_script(
			'ShadCdn-connect',
			'ShadCdnParam',
			[
				'restApiUrl' => esc_url_raw( rest_url() ),
				'rest_nonce' => wp_create_nonce( 'wp_rest' ),
			]
		);
	}
	
	/**
	 * @return void
	 */
	public function admin_menu_register() {
		add_menu_page(
			'ShadCdn React',
			'ShadCdn React',
			'manage_options',
			'ShadCdn-connect',
			[ $this, 'admin_page_react_connect' ],
			6
		);
	}
	/**
	 * @return void
	 */
	public function admin_page_react_connect() {
		echo '<div class="wrap"><div id="ShadCdn_connect"></div></div>';
	}
}

/**
 * @return object|ShadCdn|null
 */
function ShadCdn_connect() {
	return ShadCdn::instance();
}

add_action( 'plugins_loaded', 'ShadCdn_connect' );
