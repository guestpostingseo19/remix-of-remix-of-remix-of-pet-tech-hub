<?php
/**
 * How it works.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow = isset( $args['eyebrow'] ) ? $args['eyebrow'] : __( 'How it works', 'pawtech' );
$title   = isset( $args['title'] ) ? $args['title'] : __( 'Three easy steps, then we stay quiet', 'pawtech' );
$steps   = ! empty( $args['steps'] ) && is_array( $args['steps'] ) ? $args['steps'] : pawtech_default( 'steps' );
?>
<section id="how" class="mx-auto max-w-6xl scroll-mt-20 px-5 py-24">
	<div class="pawtech-reveal">
		<span class="text-xs font-semibold uppercase tracking-[0.22em] text-signal"><?php echo esc_html( $eyebrow ); ?></span>
		<h2 class="mt-4 max-w-xl font-display text-3xl font-bold sm:text-4xl"><?php echo esc_html( $title ); ?></h2>
	</div>

	<div class="mt-14 grid gap-6 md:grid-cols-3">
		<?php foreach ( array_values( $steps ) as $i => $step ) : ?>
			<div class="pawtech-reveal h-full" style="transition-delay: <?php echo esc_attr( (string) ( $i * 110 ) ); ?>ms">
				<div class="group h-full rounded-2xl hairline bg-surface p-7 transition-all duration-500 hover:-translate-y-1.5 hover:border-primary/60">
					<span class="font-display text-sm font-bold tracking-[0.2em] text-primary"><?php echo esc_html( $step['n'] ); ?></span>
					<h3 class="mt-4 font-display text-xl font-semibold transition-colors group-hover:text-primary"><?php echo esc_html( $step['title'] ); ?></h3>
					<p class="mt-2.5 text-sm leading-relaxed text-muted-foreground"><?php echo esc_html( $step['copy'] ); ?></p>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
