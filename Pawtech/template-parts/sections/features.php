<?php
/**
 * Services grid.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

$args     = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow  = isset( $args['eyebrow'] ) ? $args['eyebrow'] : __( 'Our services', 'pawtech' );
$title    = isset( $args['title'] ) ? $args['title'] : __( 'Four services, one caring team', 'pawtech' );
$intro    = isset( $args['intro'] ) ? $args['intro'] : __( 'Everything we do goes into one simple timeline, so you can see location, health, behaviour and food in one place.', 'pawtech' );
$services = ! empty( $args['services'] ) && is_array( $args['services'] ) ? $args['services'] : pawtech_default( 'services' );
?>
<section id="platform" class="mx-auto max-w-6xl scroll-mt-20 px-5 py-24">
	<div class="pawtech-reveal max-w-2xl">
		<span class="text-xs font-semibold uppercase tracking-[0.22em] text-signal"><?php echo esc_html( $eyebrow ); ?></span>
		<h2 class="mt-4 font-display text-3xl font-bold sm:text-4xl"><?php echo esc_html( $title ); ?></h2>
		<p class="mt-4 text-muted-foreground"><?php echo esc_html( $intro ); ?></p>
	</div>

	<div class="mt-14 grid gap-6 sm:grid-cols-2">
		<?php
		foreach ( array_values( $services ) as $i => $service ) :
			$src = ! empty( $service['image_url'] ) ? $service['image_url'] : pawtech_img( isset( $service['image'] ) ? $service['image'] : 'feature-gps.jpg' );
			?>
			<div class="pawtech-reveal h-full" style="transition-delay: <?php echo esc_attr( (string) ( $i * 90 ) ); ?>ms">
				<article class="group h-full overflow-hidden rounded-2xl hairline bg-surface transition-all duration-500 hover:-translate-y-1.5 hover:border-primary/60 hover:glow-soft">
					<div class="overflow-hidden">
						<img src="<?php echo esc_url( $src ); ?>" alt="<?php echo esc_attr( isset( $service['alt'] ) ? $service['alt'] : $service['title'] ); ?>" loading="lazy" width="1024" height="1024" class="h-56 w-full object-cover opacity-90 transition-all duration-700 group-hover:scale-105 group-hover:opacity-100" />
					</div>
					<div class="p-6">
						<h3 class="font-display text-xl font-semibold transition-colors group-hover:text-primary"><?php echo esc_html( $service['title'] ); ?></h3>
						<p class="mt-2.5 text-sm leading-relaxed text-muted-foreground"><?php echo esc_html( $service['copy'] ); ?></p>
					</div>
				</article>
			</div>
		<?php endforeach; ?>
	</div>
</section>
