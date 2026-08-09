<?php
/**
 * Helpers used across templates and Elementor widgets.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

/**
 * Read a theme mod with a default.
 *
 * @param string $key     Option key (without prefix).
 * @param mixed  $default Fallback value.
 * @return mixed
 */
function pawtech_get_option( $key, $default = '' ) {
	$value = get_theme_mod( 'pawtech_' . $key, $default );
	return ( '' === $value || null === $value ) ? $default : $value;
}

/**
 * Theme image URL helper.
 *
 * @param string $file File name inside assets/images.
 * @return string
 */
function pawtech_img( $file ) {
	return esc_url( PAWTECH_URI . 'assets/images/' . ltrim( $file, '/' ) );
}

/**
 * Default section content, filterable so child themes can override.
 *
 * @return array
 */
function pawtech_defaults() {
	$defaults = array(
		'stats'    => array(
			array( 'value' => '2.4s', 'label' => __( 'Map updates', 'pawtech' ) ),
			array( 'value' => '24/7', 'label' => __( 'Team on duty', 'pawtech' ) ),
			array( 'value' => '94%', 'label' => __( 'Early warnings caught', 'pawtech' ) ),
			array( 'value' => '< 4 min', 'label' => __( 'Wait for a vet', 'pawtech' ) ),
		),
		'services' => array(
			array(
				'title' => __( 'Live pet tracking', 'pawtech' ),
				'copy'  => __( 'See where your pet is on a map, updated every few seconds. Draw a safe zone around your home and get a text if they leave it.', 'pawtech' ),
				'image' => 'feature-gps.jpg',
				'alt'   => __( 'Dog walking on a golden trail while the PawTech app tracks the route', 'pawtech' ),
			),
			array(
				'title' => __( 'Daily health watch', 'pawtech' ),
				'copy'  => __( 'We check heart rate, breathing and sleep every day. When the numbers change, we let you know in plain words.', 'pawtech' ),
				'image' => 'hero-collar.jpg',
				'alt'   => __( 'Dog resting on linen while PawTech checks daily health numbers', 'pawtech' ),
			),
			array(
				'title' => __( 'Home check-ins', 'pawtech' ),
				'copy'  => __( "Send us a short clip from your home camera and our team tells you what your pet's behaviour means.", 'pawtech' ),
				'image' => 'feature-camera.jpg',
				'alt'   => __( 'Cat sitting in warm afternoon light during a PawTech home check-in', 'pawtech' ),
			),
			array(
				'title' => __( 'Food and routine coaching', 'pawtech' ),
				'copy'  => __( "Get a simple feeding and walking plan built around your pet's age, weight and how busy their day was.", 'pawtech' ),
				'image' => 'feature-feeder.jpg',
				'alt'   => __( 'Bowl of food being measured for a PawTech feeding plan', 'pawtech' ),
			),
		),
		'points'   => array(
			__( 'Real vets on video, day and night. Most calls start in under four minutes.', 'pawtech' ),
			__( "Your pet's last 60 days of health notes are shared with the vet before the call.", 'pawtech' ),
			__( 'Clear advice: wait at home, book a visit, or go now.', 'pawtech' ),
			__( 'As many calls as you need on the Care and Family plans.', 'pawtech' ),
		),
		'steps'    => array(
			array(
				'n'     => '01',
				'title' => __( 'Sign up', 'pawtech' ),
				'copy'  => __( 'Tell us about your pet and link the tracker or tag you already use. It takes about two minutes.', 'pawtech' ),
			),
			array(
				'n'     => '02',
				'title' => __( 'We learn their normal', 'pawtech' ),
				'copy'  => __( 'For the first few weeks we learn how your pet moves, sleeps and rests. Every pet is different.', 'pawtech' ),
			),
			array(
				'n'     => '03',
				'title' => __( 'We tell you early', 'pawtech' ),
				'copy'  => __( 'If things start to change, you get one clear message and a vet you can call about it.', 'pawtech' ),
			),
		),
		'tiers'    => array(
			array(
				'name'     => __( 'Track', 'pawtech' ),
				'price'    => '$9',
				'tagline'  => __( 'Just know where they are.', 'pawtech' ),
				'featured' => false,
				'features' => array(
					__( 'Live map, updated every 2.4 seconds', 'pawtech' ),
					__( 'As many safe zones as you like', 'pawtech' ),
					__( 'Alerts when your pet wanders off', 'pawtech' ),
					__( '90 days of past routes', 'pawtech' ),
				),
			),
			array(
				'name'     => __( 'Care', 'pawtech' ),
				'price'    => '$19',
				'tagline'  => __( 'Tracking plus daily health checks.', 'pawtech' ),
				'featured' => true,
				'features' => array(
					__( 'Everything in Track', 'pawtech' ),
					__( 'Daily heart, breathing and sleep checks', 'pawtech' ),
					__( 'Early warnings in plain words', 'pawtech' ),
					__( 'Unlimited vet video calls', 'pawtech' ),
					__( 'A health summary you can share with your vet', 'pawtech' ),
				),
			),
			array(
				'name'     => __( 'Family', 'pawtech' ),
				'price'    => '$34',
				'tagline'  => __( 'For homes with more than one pet.', 'pawtech' ),
				'featured' => false,
				'features' => array(
					__( 'Everything in Care', 'pawtech' ),
					__( 'Up to 8 pets on one account', 'pawtech' ),
					__( 'Home check-ins and feeding plans', 'pawtech' ),
					__( 'You skip the line for vet calls', 'pawtech' ),
					__( 'A yearly health review', 'pawtech' ),
				),
			),
		),
		'faqs'     => array(
			array(
				'q' => __( 'How close is the pet tracking?', 'pawtech' ),
				'a' => __( 'In open sky we can place your pet within about three metres, and the map updates every 2.4 seconds. In a city or under thick trees it can be closer to eight metres. If the signal drops, we fall back to phone towers so you still get a rough spot.', 'pawtech' ),
			),
			array(
				'q' => __( 'Does the service work for cats?', 'pawtech' ),
				'a' => __( "Yes. It works with light cat tags and safe break-away collars. We use different health ranges for cats, because a cat's normal heart rate and sleep are not the same as a dog's.", 'pawtech' ),
			),
			array(
				'q' => __( 'What can the health watch really see?', 'pawtech' ),
				'a' => __( 'It sees change, not illness. We learn what is normal for your pet, then tell you when a few things move at once. That often shows up days before you would notice anything. It is an early heads-up, not a diagnosis.', 'pawtech' ),
			),
			array(
				'q' => __( 'Do vet video calls replace my own vet?', 'pawtech' ),
				'a' => __( 'No. Video calls are great for advice, small worries, behaviour, food and follow-ups. Anything that needs hands, X-rays or blood tests needs a clinic, and our vets will say so on the call.', 'pawtech' ),
			),
			array(
				'q' => __( 'Do I need to buy anything?', 'pawtech' ),
				'a' => __( 'No. PawTech is a service only. It works with most common pet trackers, tags and home cameras you may already own, and we help you set it up on your first call.', 'pawtech' ),
			),
			array(
				'q' => __( 'Can I stop when I want?', 'pawtech' ),
				'a' => __( 'Yes. Plans are month to month. You can pause or cancel from your account page and you will not be charged again.', 'pawtech' ),
			),
		),
	);

	return apply_filters( 'pawtech_defaults', $defaults );
}

/**
 * Fetch one default group.
 *
 * @param string $key Group key.
 * @return array
 */
function pawtech_default( $key ) {
	$all = pawtech_defaults();
	return isset( $all[ $key ] ) ? $all[ $key ] : array();
}

/**
 * Estimated reading time for the current post.
 *
 * @param int|WP_Post|null $post Post.
 * @return string
 */
function pawtech_reading_time( $post = null ) {
	$post    = get_post( $post );
	$words   = $post ? str_word_count( wp_strip_all_tags( (string) $post->post_content ) ) : 0;
	$minutes = max( 1, (int) ceil( $words / 200 ) );
	/* translators: %d: number of minutes. */
	return sprintf( _n( '%d min read', '%d min read', $minutes, 'pawtech' ), $minutes );
}

/**
 * Primary category name for a post.
 *
 * @param int|WP_Post|null $post Post.
 * @return string
 */
function pawtech_primary_category( $post = null ) {
	$post       = get_post( $post );
	$categories = $post ? get_the_category( $post->ID ) : array();
	if ( ! empty( $categories ) ) {
		return $categories[0]->name;
	}
	return esc_html__( 'Journal', 'pawtech' );
}

/**
 * Cover image markup for archive/preview cards, with a bundled fallback.
 *
 * @param string $classes Image classes.
 * @param string $size    Image size.
 */
function pawtech_post_cover( $classes = '', $size = 'pawtech-card' ) {
	if ( has_post_thumbnail() ) {
		the_post_thumbnail(
			$size,
			array(
				'class'   => $classes,
				'loading' => 'lazy',
				'alt'     => the_title_attribute( array( 'echo' => false ) ),
			)
		);
		return;
	}
	printf(
		'<img src="%1$s" alt="%2$s" loading="lazy" width="1280" height="720" class="%3$s" />',
		pawtech_img( 'blog-monitoring.jpg' ),
		esc_attr( get_the_title() ),
		esc_attr( $classes )
	);
}

/**
 * Numbered pagination in the PawTech style.
 */
function pawtech_pagination() {
	$links = paginate_links(
		array(
			'type'      => 'array',
			'mid_size'  => 1,
			'prev_text' => esc_html__( 'Previous', 'pawtech' ),
			'next_text' => esc_html__( 'Next', 'pawtech' ),
		)
	);
	if ( empty( $links ) ) {
		return;
	}
	echo '<nav class="mt-14 flex flex-wrap items-center justify-center gap-2" aria-label="' . esc_attr__( 'Posts navigation', 'pawtech' ) . '">';
	foreach ( $links as $link ) {
		echo '<span class="pawtech-page-link">' . wp_kses_post( $link ) . '</span>';
	}
	echo '</nav>';
}

/**
 * Escaped anchor to a homepage section (works from any page).
 *
 * @param string $anchor Anchor id.
 * @return string
 */
function pawtech_home_anchor( $anchor ) {
	return esc_url( trailingslashit( home_url( '/' ) ) . '#' . sanitize_html_class( $anchor ) );
}

/**
 * Body classes.
 *
 * @param array $classes Classes.
 * @return array
 */
function pawtech_body_classes( $classes ) {
	$classes[] = 'bg-background';
	$classes[] = 'text-foreground';
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'pawtech_body_classes' );

/**
 * Excerpt tweaks.
 *
 * @return string
 */
function pawtech_excerpt_more() {
	return '…';
}
add_filter( 'excerpt_more', 'pawtech_excerpt_more' );

/**
 * Force rel="noopener noreferrer" on links that open a new tab.
 *
 * @param string $content Content HTML.
 * @return string
 */
function pawtech_safe_external_links( $content ) {
	return wp_targeted_link_rel( (string) $content );
}
add_filter( 'comment_text', 'pawtech_safe_external_links', 20 );
