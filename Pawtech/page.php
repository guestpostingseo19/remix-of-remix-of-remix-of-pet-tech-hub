<?php
/**
 * Static page.
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
			<?php if ( ! pawtech_is_elementor_page() ) : ?>
				<header class="aurora border-b border-hairline">
					<div class="mx-auto max-w-4xl px-5 py-16">
						<h1 class="font-display text-4xl font-bold sm:text-5xl"><?php the_title(); ?></h1>
					</div>
				</header>
			<?php endif; ?>

			<div class="<?php echo pawtech_is_elementor_page() ? '' : 'mx-auto max-w-4xl px-5 py-14'; ?>">
				<div class="entry-content pawtech-prose">
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
