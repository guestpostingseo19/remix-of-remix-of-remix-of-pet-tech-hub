<?php
/**
 * Blog sidebar.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'pawtech-sidebar' ) ) {
	return;
}
?>
<aside class="pawtech-sidebar" role="complementary">
	<?php dynamic_sidebar( 'pawtech-sidebar' ); ?>
</aside>
