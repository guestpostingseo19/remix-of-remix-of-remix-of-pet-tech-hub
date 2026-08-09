<?php
/**
 * Site header.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'min-h-screen bg-background text-foreground' ); ?>>
<?php wp_body_open(); ?>

<a class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-[100] focus:rounded-full focus:bg-primary focus:px-4 focus:py-2 focus:text-sm focus:font-semibold focus:text-primary-foreground" href="#pawtech-content">
	<?php esc_html_e( 'Skip to content', 'pawtech' ); ?>
</a>

<div id="page" class="min-h-screen bg-background">
	<header class="sticky top-0 z-50 border-b border-hairline bg-background/80 backdrop-blur-xl">
		<div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-5">
			<?php get_template_part( 'template-parts/wordmark' ); ?>

			<nav aria-label="<?php esc_attr_e( 'Primary', 'pawtech' ); ?>" class="hidden items-center gap-8 md:flex">
				<?php
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'      => false,
							'menu_class'     => 'flex items-center gap-8',
							'depth'          => 2,
							'fallback_cb'    => false,
						)
					);
				} else {
					$pawtech_links = array(
						array( 'label' => __( 'Services', 'pawtech' ), 'href' => pawtech_home_anchor( 'platform' ) ),
						array( 'label' => __( 'Vet calls', 'pawtech' ), 'href' => pawtech_home_anchor( 'telehealth' ) ),
						array( 'label' => __( 'Plans', 'pawtech' ), 'href' => pawtech_home_anchor( 'pricing' ) ),
					);
					foreach ( $pawtech_links as $pawtech_link ) {
						printf(
							'<a href="%1$s" class="story-link text-sm text-muted-foreground transition-colors hover:text-primary">%2$s</a>',
							esc_url( $pawtech_link['href'] ),
							esc_html( $pawtech_link['label'] )
						);
					}
					$pawtech_posts_page = get_option( 'page_for_posts' ) ? get_permalink( (int) get_option( 'page_for_posts' ) ) : home_url( '/blog/' );
					printf(
						'<a href="%1$s" class="story-link text-sm %2$s transition-colors hover:text-primary">%3$s</a>',
						esc_url( $pawtech_posts_page ),
						is_home() || is_singular( 'post' ) || is_archive() ? 'text-primary' : 'text-muted-foreground',
						esc_html__( 'Journal', 'pawtech' )
					);
				}
				?>
			</nav>

			<div class="flex items-center gap-3">
				<?php get_template_part( 'template-parts/theme-toggle' ); ?>
				<?php
				$pawtech_cta_url   = (string) pawtech_get_option( 'header_cta_url', '#pricing' );
				$pawtech_cta_href  = ( 0 === strpos( $pawtech_cta_url, '#' ) ) ? pawtech_home_anchor( ltrim( $pawtech_cta_url, '#' ) ) : esc_url( $pawtech_cta_url );
				?>
				<a href="<?php echo esc_url( $pawtech_cta_href ); ?>" class="rounded-full bg-primary px-4 py-2 text-sm font-semibold text-primary-foreground transition-all duration-300 hover:-translate-y-0.5 hover:glow-ring">
					<?php echo esc_html( pawtech_get_option( 'header_cta_label', __( 'Join PawTech', 'pawtech' ) ) ); ?>
				</a>
				<button type="button" class="md:hidden inline-flex h-9 w-9 items-center justify-center rounded-full hairline text-foreground" data-pawtech-menu-toggle aria-expanded="false" aria-controls="pawtech-mobile-nav" aria-label="<?php esc_attr_e( 'Toggle menu', 'pawtech' ); ?>">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-4 w-4" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/></svg>
				</button>
			</div>
		</div>

		<div id="pawtech-mobile-nav" class="hidden border-t border-hairline bg-background md:hidden" data-pawtech-mobile-nav>
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'flex flex-col gap-4 px-5 py-5 text-sm text-muted-foreground',
						'depth'          => 2,
						'fallback_cb'    => false,
					)
				);
			} else {
				echo '<div class="flex flex-col gap-4 px-5 py-5 text-sm text-muted-foreground">';
				printf( '<a href="%s" class="hover:text-primary">%s</a>', esc_url( pawtech_home_anchor( 'platform' ) ), esc_html__( 'Services', 'pawtech' ) );
				printf( '<a href="%s" class="hover:text-primary">%s</a>', esc_url( pawtech_home_anchor( 'telehealth' ) ), esc_html__( 'Vet calls', 'pawtech' ) );
				printf( '<a href="%s" class="hover:text-primary">%s</a>', esc_url( pawtech_home_anchor( 'pricing' ) ), esc_html__( 'Plans', 'pawtech' ) );
				printf( '<a href="%s" class="hover:text-primary">%s</a>', esc_url( home_url( '/blog/' ) ), esc_html__( 'Journal', 'pawtech' ) );
				echo '</div>';
			}
			?>
		</div>
	</header>

	<div id="pawtech-content">
