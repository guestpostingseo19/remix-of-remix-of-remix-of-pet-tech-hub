<?php
/**
 * Stat band.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$stats = ! empty( $args['stats'] ) && is_array( $args['stats'] ) ? $args['stats'] : pawtech_default( 'stats' );
?>
<section aria-label="<?php esc_attr_e( 'Service numbers', 'pawtech' ); ?>" class="border-y border-hairline bg-surface">
	<div class="mx-auto grid max-w-6xl grid-cols-2 gap-px px-5 md:grid-cols-4">
		<?php foreach ( array_values( $stats ) as $i => $stat ) : ?>
			<div class="pawtech-reveal" style="transition-delay: <?php echo esc_attr( (string) ( $i * 80 ) ); ?>ms">
				<div class="group px-2 py-8">
					<div class="font-display text-3xl font-bold text-primary transition-transform duration-300 group-hover:scale-105 sm:text-4xl">
						<?php echo esc_html( $stat['value'] ); ?>
					</div>
					<div class="mt-1.5 text-xs uppercase tracking-[0.16em] text-muted-foreground">
						<?php echo esc_html( $stat['label'] ); ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
