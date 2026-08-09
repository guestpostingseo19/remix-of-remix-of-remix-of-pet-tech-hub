<?php
/**
 * Post card used on archives and search.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;
?>
<li>
	<a href="<?php the_permalink(); ?>" class="group grid gap-6 overflow-hidden rounded-2xl hairline bg-surface transition-colors hover:border-primary/60 sm:grid-cols-[240px_1fr]">
		<?php pawtech_post_cover( 'h-44 w-full object-cover opacity-85 transition-opacity group-hover:opacity-100 sm:h-full' ); ?>
		<div class="p-6 sm:pl-0 sm:pr-7">
			<div class="flex items-center gap-3 text-[11px] font-semibold uppercase tracking-[0.16em] text-primary">
				<span><?php echo esc_html( pawtech_primary_category() ); ?></span>
				<span class="text-muted-foreground"><?php echo esc_html( pawtech_reading_time() ); ?></span>
			</div>
			<h2 class="mt-3 font-display text-xl font-semibold leading-snug"><?php the_title(); ?></h2>
			<p class="mt-2.5 text-sm leading-relaxed text-muted-foreground"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 34 ) ); ?></p>
		</div>
	</a>
</li>
