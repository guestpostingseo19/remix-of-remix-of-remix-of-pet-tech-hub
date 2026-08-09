<?php
/**
 * Search form.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;
?>
<form role="search" method="get" class="flex items-center gap-2" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="sr-only" for="pawtech-search-<?php echo esc_attr( (string) wp_rand( 1000, 9999 ) ); ?>"><?php esc_html_e( 'Search', 'pawtech' ); ?></label>
	<input type="search" class="w-full rounded-full hairline bg-surface px-4 py-2.5 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring"
		placeholder="<?php esc_attr_e( 'Search the journal…', 'pawtech' ); ?>"
		value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
	<button type="submit" class="rounded-full bg-primary px-4 py-2.5 text-sm font-semibold text-primary-foreground">
		<?php esc_html_e( 'Search', 'pawtech' ); ?>
	</button>
</form>
