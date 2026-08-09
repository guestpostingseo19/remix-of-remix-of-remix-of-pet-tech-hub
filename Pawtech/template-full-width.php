<?php
/**
 * Template Name: Full width (Elementor canvas friendly)
 * Template Post Type: page, post
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="pawtech-main">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<div class="entry-content pawtech-page-content">
			<?php the_content(); ?>
		</div>
		<?php
	endwhile;
	?>
</main>
<?php
get_footer();
