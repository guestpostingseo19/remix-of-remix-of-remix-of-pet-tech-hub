<?php
/**
 * Asset loading.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

/**
 * Cache-busting version based on file mtime.
 *
 * @param string $relative_path Path relative to the theme root.
 * @return string
 */
function pawtech_asset_version( $relative_path ) {
	$file = PAWTECH_DIR . ltrim( $relative_path, '/' );
	if ( file_exists( $file ) ) {
		return PAWTECH_VERSION . '.' . (string) filemtime( $file );
	}
	return PAWTECH_VERSION;
}

/**
 * Front-end styles and scripts.
 */
function pawtech_enqueue_assets() {
	wp_enqueue_style(
		'pawtech-fonts',
		'https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,600;12..96,700&family=Instrument+Sans:wght@400;500;600&display=swap',
		array(),
		null // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
	);

	wp_enqueue_style(
		'pawtech-theme',
		PAWTECH_URI . 'assets/css/theme.css',
		array( 'pawtech-fonts' ),
		pawtech_asset_version( 'assets/css/theme.css' )
	);

	// style.css carries the theme header; keep it loaded for child themes.
	wp_enqueue_style( 'pawtech-style', get_stylesheet_uri(), array( 'pawtech-theme' ), pawtech_asset_version( 'style.css' ) );

	wp_enqueue_script(
		'pawtech-theme',
		PAWTECH_URI . 'assets/js/theme.js',
		array(),
		pawtech_asset_version( 'assets/js/theme.js' ),
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pawtech_enqueue_assets' );

/**
 * Preconnect to the Google Fonts hosts.
 *
 * @param array  $urls          Resource URLs.
 * @param string $relation_type Relation type.
 * @return array
 */
function pawtech_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array( 'href' => 'https://fonts.googleapis.com' );
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'pawtech_resource_hints', 10, 2 );

/**
 * Inline the theme-mode bootstrap so there is no flash of the wrong palette.
 */
function pawtech_theme_mode_bootstrap() {
	$default = 'day' === pawtech_get_option( 'default_mode', 'night' ) ? 'light' : 'dark';
	?>
	<script id="pawtech-mode-bootstrap">
	try{var s=localStorage.getItem('pawtech-theme');var m=s?(s==='day'?'light':'dark'):'<?php echo esc_js( $default ); ?>';document.documentElement.classList.add(m)}catch(e){document.documentElement.classList.add('<?php echo esc_js( $default ); ?>')}
	</script>
	<?php
}
add_action( 'wp_head', 'pawtech_theme_mode_bootstrap', 1 );

/**
 * Editor + Elementor canvas gets the same tokens.
 */
function pawtech_editor_assets() {
	wp_enqueue_style( 'pawtech-theme', PAWTECH_URI . 'assets/css/theme.css', array(), pawtech_asset_version( 'assets/css/theme.css' ) );
}
add_action( 'enqueue_block_editor_assets', 'pawtech_editor_assets' );
add_action( 'elementor/editor/after_enqueue_styles', 'pawtech_editor_assets' );
