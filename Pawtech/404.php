<?php
/**
 * 404.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="flex min-h-[70vh] items-center justify-center bg-background px-4">
	<div class="max-w-md text-center">
		<h1 class="font-display text-7xl font-bold text-foreground">404</h1>
		<h2 class="mt-4 text-xl font-semibold text-foreground"><?php esc_html_e( 'Page not found', 'pawtech' ); ?></h2>
		<p class="mt-2 text-sm text-muted-foreground">
			<?php esc_html_e( "The page you're looking for doesn't exist or has been moved.", 'pawtech' ); ?>
		</p>
		<div class="mx-auto mt-6 max-w-xs"><?php get_search_form(); ?></div>
		<div class="mt-6">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center justify-center rounded-full bg-primary px-5 py-2.5 text-sm font-semibold text-primary-foreground transition-colors hover:glow-ring">
				<?php esc_html_e( 'Go home', 'pawtech' ); ?>
			</a>
		</div>
	</div>
</main>
<?php
get_footer();
