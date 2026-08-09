<?php
/**
 * Search results.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main">
	<section class="aurora border-b border-hairline">
		<div class="mx-auto max-w-4xl px-5 py-20">
			<span class="text-xs font-semibold uppercase tracking-[0.22em] text-signal"><?php esc_html_e( 'Search', 'pawtech' ); ?></span>
			<h1 class="mt-4 font-display text-4xl font-bold sm:text-5xl">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Results for “%s”', 'pawtech' ), esc_html( get_search_query() ) );
				?>
			</h1>
			<div class="mt-6 max-w-md"><?php get_search_form(); ?></div>
		</div>
	</section>

	<div class="mx-auto max-w-4xl px-5 py-16">
		<?php if ( have_posts() ) : ?>
			<ul class="space-y-6">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'card' );
				endwhile;
				?>
			</ul>
			<?php pawtech_pagination(); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
