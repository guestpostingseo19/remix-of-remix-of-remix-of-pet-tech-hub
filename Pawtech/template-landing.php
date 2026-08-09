<?php
/**
 * Template Name: PawTech Landing (all sections)
 * Template Post Type: page
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="pawtech-main">
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
</main>
<?php
get_footer();
