<?php
/**
 * Telehealth section.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow = isset( $args['eyebrow'] ) ? $args['eyebrow'] : __( 'Vet video calls', 'pawtech' );
$title   = isset( $args['title'] ) ? $args['title'] : __( 'Talk to a vet before you get in the car', 'pawtech' );
$intro   = isset( $args['intro'] ) ? $args['intro'] : __( "Most late-night worries can be sorted out on a call. Our vets already have your pet's health notes, so you don't have to explain everything from the start.", 'pawtech' );
$points  = ! empty( $args['points'] ) && is_array( $args['points'] ) ? $args['points'] : pawtech_default( 'points' );
$image   = ! empty( $args['image'] ) ? $args['image'] : pawtech_img( 'feature-telehealth.jpg' );
?>
<section id="telehealth" class="scroll-mt-20 border-y border-hairline bg-surface">
	<div class="mx-auto grid max-w-6xl items-center gap-14 px-5 py-24 lg:grid-cols-2">
		<div class="pawtech-reveal">
			<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr_e( 'Pet owner on a video call with a vet while their dog sits beside the desk', 'pawtech' ); ?>" loading="lazy" width="1024" height="1024" class="w-full rounded-3xl hairline object-cover transition-transform duration-700 hover:scale-[1.02]" />
		</div>

		<div class="pawtech-reveal" style="transition-delay: 120ms">
			<span class="text-xs font-semibold uppercase tracking-[0.22em] text-signal"><?php echo esc_html( $eyebrow ); ?></span>
			<h2 class="mt-4 font-display text-3xl font-bold sm:text-4xl"><?php echo esc_html( $title ); ?></h2>
			<p class="mt-4 text-muted-foreground"><?php echo esc_html( $intro ); ?></p>

			<ul class="mt-8 space-y-4">
				<?php foreach ( $points as $point ) : ?>
					<li class="flex gap-3 text-sm text-muted-foreground">
						<span class="pulse-dot mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-signal"></span>
						<span><?php echo esc_html( is_array( $point ) ? $point['text'] : $point ); ?></span>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
