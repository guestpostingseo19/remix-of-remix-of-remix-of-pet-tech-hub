<?php
/**
 * Logo / wordmark.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;
?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Home', 'pawtech' ); ?>" class="group inline-flex items-center gap-2.5">
	<?php if ( has_custom_logo() ) : ?>
		<?php
		$pawtech_logo_id = (int) get_theme_mod( 'custom_logo' );
		echo wp_get_attachment_image(
			$pawtech_logo_id,
			'full',
			false,
			array(
				'class' => 'h-9 w-9 object-contain transition-transform duration-500 group-hover:scale-110 group-hover:-rotate-6',
				'alt'   => esc_attr( get_bloginfo( 'name' ) ),
			)
		);
		?>
	<?php else : ?>
		<img src="<?php echo pawtech_img( 'pawtech-logo.png' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="64" height="64" class="h-9 w-9 object-contain transition-transform duration-500 group-hover:scale-110 group-hover:-rotate-6" />
	<?php endif; ?>
	<span class="font-display text-lg font-semibold tracking-[-0.04em] text-foreground">
		<?php bloginfo( 'name' ); ?>
	</span>
</a>
