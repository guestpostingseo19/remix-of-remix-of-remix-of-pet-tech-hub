<?php
/**
 * Blog index — the PawTech Journal.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main">
	<section class="aurora border-b border-hairline">
		<div class="mx-auto max-w-4xl px-5 py-20">
			<span class="text-xs font-semibold uppercase tracking-[0.22em] text-signal"><?php esc_html_e( 'Journal', 'pawtech' ); ?></span>
			<h1 class="mt-4 font-display text-4xl font-bold sm:text-5xl">
				<?php
				$pawtech_posts_page = (int) get_option( 'page_for_posts' );
				echo esc_html( $pawtech_posts_page ? get_the_title( $pawtech_posts_page ) : __( 'Pet tech, explained without the marketing', 'pawtech' ) );
				?>
			</h1>
			<p class="mt-5 max-w-2xl text-muted-foreground">
				<?php esc_html_e( 'What the sensors actually measure, what the models can and cannot see, and how to spend sensibly on connected pet care.', 'pawtech' ); ?>
			</p>
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
