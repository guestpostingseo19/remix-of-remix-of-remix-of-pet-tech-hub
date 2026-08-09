<?php
/**
 * Front page — the full PawTech landing experience.
 *
 * If a static page is assigned to the front page and it has Elementor or block
 * content, that content is rendered instead so editors stay in full control.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

get_header();

$pawtech_front_id      = (int) get_option( 'page_on_front' );
$pawtech_has_page_body = false;

if ( $pawtech_front_id && is_page() ) {
	$pawtech_front_post    = get_post( $pawtech_front_id );
	$pawtech_has_page_body = $pawtech_front_post && '' !== trim( (string) $pawtech_front_post->post_content );
}
?>
<main id="main" class="pawtech-main">
	<?php if ( $pawtech_has_page_body ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<div class="pawtech-page-content entry-content">
				<?php the_content(); ?>
			</div>
			<?php
		endwhile;
		?>
	<?php else : ?>
		<?php
		get_template_part( 'template-parts/sections/hero' );
		get_template_part( 'template-parts/sections/stats' );
		get_template_part( 'template-parts/sections/features' );
		get_template_part( 'template-parts/sections/telehealth' );
		get_template_part( 'template-parts/sections/how-it-works' );
		get_template_part( 'template-parts/sections/pricing' );
		get_template_part( 'template-parts/sections/faq' );
		get_template_part( 'template-parts/sections/blog-preview' );
		?>
	<?php endif; ?>
</main>
<?php
get_footer();
