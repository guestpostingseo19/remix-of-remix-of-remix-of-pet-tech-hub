<?php
/**
 * Day / night toggle.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

if ( ! pawtech_get_option( 'show_mode_toggle', true ) ) {
	return;
}
?>
<button type="button" role="switch" aria-checked="false" data-pawtech-mode-toggle
	aria-label="<?php esc_attr_e( 'Switch colour mode', 'pawtech' ); ?>"
	title="<?php esc_attr_e( 'Switch colour mode', 'pawtech' ); ?>"
	class="group inline-flex items-center gap-1.5 rounded-full hairline bg-surface/70 p-1 transition-all duration-300 hover:-translate-y-0.5 hover:border-primary">
	<span data-pawtech-sun class="flex h-7 w-7 items-center justify-center rounded-full transition-all duration-300 text-muted-foreground group-hover:text-primary">
		<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-3.5 w-3.5" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M6.3 17.7l-1.4 1.4M19.1 4.9l-1.4 1.4"/></svg>
	</span>
	<span data-pawtech-moon class="flex h-7 w-7 items-center justify-center rounded-full transition-all duration-300 bg-primary text-primary-foreground">
		<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5" aria-hidden="true"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
	</span>
	<span class="sr-only" data-pawtech-mode-label><?php esc_html_e( 'Night mode on', 'pawtech' ); ?></span>
</button>
