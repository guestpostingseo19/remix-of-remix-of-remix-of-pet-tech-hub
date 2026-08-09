<?php
/**
 * Hero section.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow = isset( $args['eyebrow'] ) ? $args['eyebrow'] : pawtech_get_option( 'hero_eyebrow', __( 'Pet care service · open 24 hours', 'pawtech' ) );
$accent  = isset( $args['title_accent'] ) ? $args['title_accent'] : pawtech_get_option( 'hero_title_accent', __( 'Watch your pet', 'pawtech' ) );
$rest    = isset( $args['title_rest'] ) ? $args['title_rest'] : pawtech_get_option( 'hero_title_rest', __( 'and talk to a vet, any time', 'pawtech' ) );
$subtitle = isset( $args['subtitle'] ) ? $args['subtitle'] : pawtech_get_option( 'hero_subtitle', __( 'PawTech is a pet care service. We keep an eye on where your pet is and how they feel. If something looks wrong, we tell you and a real vet joins the call.', 'pawtech' ) );
$cta1    = isset( $args['cta_label'] ) ? $args['cta_label'] : pawtech_get_option( 'hero_primary_cta', __( 'See our plans', 'pawtech' ) );
$cta1url = isset( $args['cta_url'] ) ? $args['cta_url'] : pawtech_get_option( 'hero_primary_url', '#pricing' );
$cta2    = isset( $args['cta2_label'] ) ? $args['cta2_label'] : pawtech_get_option( 'hero_secondary_cta', __( 'Read the journal', 'pawtech' ) );
$cta2url = isset( $args['cta2_url'] ) ? $args['cta2_url'] : home_url( '/blog/' );
$note    = isset( $args['note'] ) ? $args['note'] : pawtech_get_option( 'hero_note', __( 'No gear to buy. Works with the collar or tag you already have.', 'pawtech' ) );
$image   = ! empty( $args['image'] ) ? $args['image'] : pawtech_img( 'hero-collar.jpg' );
$image_alt = isset( $args['image_alt'] ) ? $args['image_alt'] : __( 'Happy dog resting in warm evening light while the PawTech care service watches over them', 'pawtech' );
$badge_title = isset( $args['badge_title'] ) ? $args['badge_title'] : __( 'All good today', 'pawtech' );
$badge_copy  = isset( $args['badge_copy'] ) ? $args['badge_copy'] : __( 'Heart rate is normal', 'pawtech' );
?>
<section class="relative overflow-hidden aurora">
	<div class="pointer-events-none absolute inset-0 grid-field opacity-40"></div>
	<div class="pointer-events-none absolute -left-24 top-10 h-72 w-72 rounded-full bg-primary/15 blur-3xl float-slow"></div>
	<div class="pointer-events-none absolute -right-16 bottom-0 h-64 w-64 rounded-full bg-signal/10 blur-3xl float-slow [animation-delay:1.5s]"></div>

	<div class="relative mx-auto grid max-w-6xl items-center gap-14 px-5 py-20 lg:grid-cols-[1.05fr_1fr] lg:py-28">
		<div class="rise-in">
			<span class="inline-flex items-center gap-2 rounded-full hairline bg-surface/70 px-3 py-1.5 text-xs font-medium tracking-wide text-muted-foreground">
				<span class="pulse-dot h-1.5 w-1.5 rounded-full bg-signal"></span>
				<?php echo esc_html( $eyebrow ); ?>
			</span>

			<h1 class="mt-6 font-display text-4xl font-bold leading-[1.05] sm:text-5xl lg:text-6xl">
				<span class="text-gradient shimmer"><?php echo esc_html( $accent ); ?></span> <?php echo esc_html( $rest ); ?>
			</h1>

			<p class="mt-6 max-w-xl text-base leading-relaxed text-muted-foreground sm:text-lg">
				<?php echo esc_html( $subtitle ); ?>
			</p>

			<div class="mt-9 flex flex-wrap items-center gap-4">
				<a href="<?php echo esc_url( 0 === strpos( (string) $cta1url, '#' ) ? pawtech_home_anchor( ltrim( (string) $cta1url, '#' ) ) : $cta1url ); ?>" class="rounded-full bg-primary px-6 py-3 text-sm font-semibold text-primary-foreground transition-all duration-300 hover:-translate-y-0.5 hover:glow-ring">
					<?php echo esc_html( $cta1 ); ?>
				</a>
				<a href="<?php echo esc_url( $cta2url ); ?>" class="rounded-full hairline px-6 py-3 text-sm font-semibold text-foreground transition-all duration-300 hover:-translate-y-0.5 hover:border-primary hover:text-primary">
					<?php echo esc_html( $cta2 ); ?>
				</a>
			</div>

			<p class="mt-6 text-xs text-muted-foreground"><?php echo esc_html( $note ); ?></p>
		</div>

		<div class="group relative rise-in [animation-delay:150ms]">
			<div class="absolute -inset-6 rounded-4xl bg-primary/10 blur-3xl transition-all duration-700 group-hover:bg-primary/20"></div>
			<img src="<?php echo esc_url( $image ); ?>" width="1600" height="1200" alt="<?php echo esc_attr( $image_alt ); ?>" class="relative w-full rounded-3xl hairline object-cover glow-soft transition-transform duration-700 group-hover:scale-[1.02]" />
			<div class="absolute -bottom-6 -left-4 flex items-center gap-3 rounded-2xl hairline bg-surface/90 px-4 py-3 backdrop-blur-md float-slow">
				<img src="<?php echo pawtech_img( 'pawtech-logo.png' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="" width="64" height="64" class="h-8 w-8 object-contain" />
				<div>
					<div class="text-xs font-semibold text-foreground"><?php echo esc_html( $badge_title ); ?></div>
					<div class="text-[11px] text-muted-foreground"><?php echo esc_html( $badge_copy ); ?></div>
				</div>
			</div>
		</div>
	</div>
</section>
