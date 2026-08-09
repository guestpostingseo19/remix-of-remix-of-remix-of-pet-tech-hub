<?php
/**
 * Article call-to-action card.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;
?>
<aside class="mt-16 rounded-2xl hairline bg-surface p-8">
	<h2 class="font-display text-xl font-semibold"><?php esc_html_e( 'Put this into practice', 'pawtech' ); ?></h2>
	<p class="mt-2.5 text-sm leading-relaxed text-muted-foreground">
		<?php esc_html_e( 'PawTech tracks location, vitals and sleep continuously, and puts a licensed vet on the line when the numbers drift.', 'pawtech' ); ?>
	</p>
	<a href="<?php echo esc_url( pawtech_home_anchor( 'pricing' ) ); ?>" class="mt-6 inline-block rounded-full bg-primary px-5 py-2.5 text-sm font-semibold text-primary-foreground">
		<?php esc_html_e( 'See plans', 'pawtech' ); ?>
	</a>
</aside>
