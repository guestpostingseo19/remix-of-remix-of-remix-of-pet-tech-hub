<?php
/**
 * Single post — the PawTech article layout.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main id="main">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="aurora border-b border-hairline">
				<div class="mx-auto max-w-3xl px-5 py-16">
					<a href="<?php echo esc_url( get_option( 'page_for_posts' ) ? get_permalink( (int) get_option( 'page_for_posts' ) ) : home_url( '/blog/' ) ); ?>" class="text-xs font-semibold uppercase tracking-[0.16em] text-primary">
						<?php esc_html_e( '← Journal', 'pawtech' ); ?>
					</a>
					<h1 class="mt-6 font-display text-3xl font-bold leading-tight sm:text-4xl"><?php the_title(); ?></h1>
					<?php if ( has_excerpt() ) : ?>
						<p class="mt-4 text-muted-foreground"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<?php endif; ?>
					<div class="mt-6 flex flex-wrap items-center gap-3 text-xs uppercase tracking-[0.16em] text-muted-foreground">
						<span><?php echo esc_html( pawtech_primary_category() ); ?></span>
						<span class="h-1 w-1 rounded-full bg-signal"></span>
						<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						<span class="h-1 w-1 rounded-full bg-signal"></span>
						<span><?php echo esc_html( pawtech_reading_time() ); ?></span>
					</div>
				</div>
			</header>

			<div class="mx-auto max-w-3xl px-5 py-14">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'full', array( 'class' => 'w-full rounded-2xl hairline object-cover', 'loading' => 'lazy' ) ); ?>
				<?php endif; ?>

				<div class="entry-content pawtech-prose mt-14">
					<?php
					the_content();
					wp_link_pages(
						array(
							'before' => '<nav class="mt-8 text-sm text-muted-foreground">' . esc_html__( 'Pages:', 'pawtech' ) . ' ',
							'after'  => '</nav>',
						)
					);
					?>
				</div>

				<?php if ( has_tag() ) : ?>
					<div class="mt-10 flex flex-wrap gap-2">
						<?php foreach ( get_the_tags() as $pawtech_tag ) : ?>
							<a href="<?php echo esc_url( get_tag_link( $pawtech_tag->term_id ) ); ?>" class="rounded-full hairline px-3 py-1 text-xs text-muted-foreground transition-colors hover:text-primary">
								#<?php echo esc_html( $pawtech_tag->name ); ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<?php get_template_part( 'template-parts/sections/cta' ); ?>

				<nav class="mt-12 flex flex-wrap justify-between gap-4 border-t border-hairline pt-8 text-sm" aria-label="<?php esc_attr_e( 'Post navigation', 'pawtech' ); ?>">
					<div><?php previous_post_link( '%link', '← %title' ); ?></div>
					<div class="text-right"><?php next_post_link( '%link', '%title →' ); ?></div>
				</nav>

				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
			</div>
		</article>
	</main>
	<?php
endwhile;

get_footer();
