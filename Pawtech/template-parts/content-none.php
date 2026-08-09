<?php
/**
 * Empty state.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="rounded-2xl hairline bg-surface p-10 text-center">
	<h2 class="font-display text-2xl font-semibold"><?php esc_html_e( 'Nothing here yet', 'pawtech' ); ?></h2>
	<p class="mt-3 text-sm text-muted-foreground"><?php esc_html_e( 'Try another search, or head back to the journal.', 'pawtech' ); ?></p>
	<div class="mx-auto mt-6 max-w-sm"><?php get_search_form(); ?></div>
</div>
