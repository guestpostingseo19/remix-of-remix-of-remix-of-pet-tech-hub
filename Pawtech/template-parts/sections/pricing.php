<?php
/**
 * Pricing section.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow = isset( $args['eyebrow'] ) ? $args['eyebrow'] : __( 'Plans', 'pawtech' );
$title   = isset( $args['title'] ) ? $args['title'] : __( 'Simple monthly service. Stop any time.', 'pawtech' );
$intro   = isset( $args['intro'] ) ? $args['intro'] : __( 'There is nothing to buy. Prices are per pet, per month. No long contract and no setup fee.', 'pawtech' );
$tiers   = ! empty( $args['tiers'] ) && is_array( $args['tiers'] ) ? $args['tiers'] : pawtech_default( 'tiers' );
?>
<section id="pricing" class="scroll-mt-20 border-y border-hairline bg-surface">
	<div class="mx-auto max-w-6xl px-5 py-24">
		<div class="pawtech-reveal max-w-xl">
			<span class="text-xs font-semibold uppercase tracking-[0.22em] text-signal"><?php echo esc_html( $eyebrow ); ?></span>
			<h2 class="mt-4 font-display text-3xl font-bold sm:text-4xl"><?php echo esc_html( $title ); ?></h2>
			<p class="mt-4 text-muted-foreground"><?php echo esc_html( $intro ); ?></p>
		</div>

		<div class="mt-14 grid gap-6 lg:grid-cols-3">
			<?php
			foreach ( array_values( $tiers ) as $i => $tier ) :
				$featured = ! empty( $tier['featured'] ) && 'no' !== $tier['featured'];
				$features = array();
				if ( ! empty( $tier['features'] ) ) {
					$features = is_array( $tier['features'] ) ? $tier['features'] : preg_split( '/\r\n|\r|\n/', (string) $tier['features'] );
				}
				$url = ! empty( $tier['url'] ) ? $tier['url'] : '#pricing';
				?>
				<div class="pawtech-reveal h-full" style="transition-delay: <?php echo esc_attr( (string) ( $i * 110 ) ); ?>ms">
					<div class="h-full rounded-2xl p-7 transition-all duration-500 hover:-translate-y-2 <?php echo $featured ? 'border border-primary/60 bg-background glow-ring' : 'hairline bg-background hover:border-primary/60'; ?>">
						<div class="flex items-center justify-between">
							<h3 class="font-display text-xl font-semibold"><?php echo esc_html( $tier['name'] ); ?></h3>
							<?php if ( $featured ) : ?>
								<span class="rounded-full bg-signal px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.14em] text-signal-foreground">
									<?php echo esc_html( ! empty( $tier['badge'] ) ? $tier['badge'] : __( 'Most picked', 'pawtech' ) ); ?>
								</span>
							<?php endif; ?>
						</div>
						<p class="mt-2 text-sm text-muted-foreground"><?php echo esc_html( $tier['tagline'] ); ?></p>

						<div class="mt-6 flex items-baseline gap-1.5">
							<span class="font-display text-4xl font-bold text-primary"><?php echo esc_html( $tier['price'] ); ?></span>
							<span class="text-sm text-muted-foreground"><?php echo esc_html( ! empty( $tier['period'] ) ? $tier['period'] : __( '/mo', 'pawtech' ) ); ?></span>
						</div>

						<ul class="mt-7 space-y-3">
							<?php foreach ( $features as $feature ) : ?>
								<?php
								$feature = is_array( $feature ) ? ( isset( $feature['text'] ) ? $feature['text'] : '' ) : $feature;
								if ( '' === trim( (string) $feature ) ) {
									continue;
								}
								?>
								<li class="flex gap-3 text-sm text-muted-foreground">
									<span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-primary"></span>
									<span><?php echo esc_html( $feature ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>

						<a href="<?php echo esc_url( 0 === strpos( (string) $url, '#' ) ? pawtech_home_anchor( ltrim( (string) $url, '#' ) ) : $url ); ?>" class="mt-8 block rounded-full px-5 py-3 text-center text-sm font-semibold transition-all duration-300 <?php echo $featured ? 'bg-primary text-primary-foreground hover:glow-ring' : 'hairline text-foreground hover:border-primary hover:text-primary'; ?>">
							<?php
							/* translators: %s: plan name. */
							echo esc_html( ! empty( $tier['cta'] ) ? $tier['cta'] : sprintf( __( 'Start %s', 'pawtech' ), $tier['name'] ) );
							?>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
