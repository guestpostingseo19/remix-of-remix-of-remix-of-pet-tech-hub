<?php
/**
 * Latest posts preview.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow = isset( $args['eyebrow'] ) ? $args['eyebrow'] : __( 'Journal', 'pawtech' );
$title   = isset( $args['title'] ) ? $args['title'] : __( 'Field notes on pet technology', 'pawtech' );
$count   = isset( $args['count'] ) ? max( 1, min( 12, (int) $args['count'] ) ) : 3;

$query = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => $count,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	)
);

if ( ! $query->have_posts() ) {
	return;
}

$blog_url = get_option( 'page_for_posts' ) ? get_permalink( (int) get_option( 'page_for_posts' ) ) : home_url( '/blog/' );
?>
<section class="border-t border-hairline bg-surface">
	<div class="mx-auto max-w-6xl px-5 py-24">
		<div class="flex flex-wrap items-end justify-between gap-4">
			<div>
				<span class="text-xs font-semibold uppercase tracking-[0.22em] text-signal"><?php echo esc_html( $eyebrow ); ?></span>
				<h2 class="mt-4 font-display text-3xl font-bold sm:text-4xl"><?php echo esc_html( $title ); ?></h2>
			</div>
			<a href="<?php echo esc_url( $blog_url ); ?>" class="text-sm font-semibold text-primary hover:text-signal">
				<?php esc_html_e( 'All articles →', 'pawtech' ); ?>
			</a>
		</div>

		<div class="mt-12 grid gap-6 md:grid-cols-3">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				?>
				<a href="<?php the_permalink(); ?>" class="group overflow-hidden rounded-2xl hairline bg-background transition-colors hover:border-primary/60">
					<?php pawtech_post_cover( 'h-40 w-full object-cover opacity-85 transition-opacity group-hover:opacity-100' ); ?>
					<div class="p-6">
						<span class="text-[11px] font-semibold uppercase tracking-[0.16em] text-primary"><?php echo esc_html( pawtech_primary_category() ); ?></span>
						<h3 class="mt-2.5 font-display text-lg font-semibold leading-snug"><?php the_title(); ?></h3>
						<p class="mt-2.5 text-sm leading-relaxed text-muted-foreground"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
						<span class="mt-4 block text-[11px] uppercase tracking-[0.16em] text-muted-foreground"><?php echo esc_html( pawtech_reading_time() ); ?></span>
					</div>
				</a>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
