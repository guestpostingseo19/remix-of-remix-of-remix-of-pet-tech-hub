<?php
/**
 * Site footer.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;
?>
	</div><!-- #pawtech-content -->

	<footer class="border-t border-hairline bg-surface">
		<div class="mx-auto max-w-6xl px-5 py-14">
			<div class="flex flex-col gap-10 md:flex-row md:justify-between">
				<div class="max-w-xs">
					<?php get_template_part( 'template-parts/wordmark' ); ?>
					<p class="mt-4 text-sm leading-relaxed text-muted-foreground">
						<?php echo esc_html( pawtech_get_option( 'footer_about', __( 'A pet care service. We track your pet, watch their health every day, and put a real vet on the line when you need one.', 'pawtech' ) ) ); ?>
					</p>
				</div>

				<div class="grid grid-cols-2 gap-10 text-sm sm:grid-cols-3">
					<?php
					$pawtech_columns = array(
						'footer-services' => array(
							'title' => __( 'Services', 'pawtech' ),
							'links' => array(
								array( __( 'Live tracking', 'pawtech' ), pawtech_home_anchor( 'platform' ) ),
								array( __( 'Daily health watch', 'pawtech' ), pawtech_home_anchor( 'platform' ) ),
								array( __( 'Home check-ins', 'pawtech' ), pawtech_home_anchor( 'platform' ) ),
								array( __( 'Food coaching', 'pawtech' ), pawtech_home_anchor( 'platform' ) ),
							),
						),
						'footer-care'     => array(
							'title' => __( 'Care', 'pawtech' ),
							'links' => array(
								array( __( 'Vet video calls', 'pawtech' ), pawtech_home_anchor( 'telehealth' ) ),
								array( __( 'How it works', 'pawtech' ), pawtech_home_anchor( 'how' ) ),
								array( __( 'FAQ', 'pawtech' ), pawtech_home_anchor( 'faq' ) ),
							),
						),
						'footer-company'  => array(
							'title' => __( 'Company', 'pawtech' ),
							'links' => array(
								array( __( 'Journal', 'pawtech' ), home_url( '/blog/' ) ),
								array( __( 'Plans', 'pawtech' ), pawtech_home_anchor( 'pricing' ) ),
							),
						),
					);

					foreach ( $pawtech_columns as $pawtech_location => $pawtech_column ) :
						?>
						<div>
							<h3 class="mb-3 text-xs font-semibold uppercase tracking-[0.18em] text-primary">
								<?php echo esc_html( $pawtech_column['title'] ); ?>
							</h3>
							<?php if ( has_nav_menu( $pawtech_location ) ) : ?>
								<?php
								wp_nav_menu(
									array(
										'theme_location' => $pawtech_location,
										'container'      => false,
										'menu_class'     => 'space-y-2 text-muted-foreground',
										'depth'          => 1,
										'fallback_cb'    => false,
									)
								);
								?>
							<?php else : ?>
								<ul class="space-y-2 text-muted-foreground">
									<?php foreach ( $pawtech_column['links'] as $pawtech_link ) : ?>
										<li>
											<a href="<?php echo esc_url( $pawtech_link[1] ); ?>" class="transition-colors hover:text-foreground">
												<?php echo esc_html( $pawtech_link[0] ); ?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<?php if ( is_active_sidebar( 'pawtech-footer' ) ) : ?>
				<div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
					<?php dynamic_sidebar( 'pawtech-footer' ); ?>
				</div>
			<?php endif; ?>

			<p class="mt-12 border-t border-hairline pt-6 text-xs text-muted-foreground">
				<?php
				printf(
					/* translators: 1: year, 2: site name, 3: legal note. */
					esc_html__( '© %1$s %2$s. %3$s', 'pawtech' ),
					esc_html( gmdate( 'Y' ) ),
					esc_html( get_bloginfo( 'name' ) ),
					esc_html( pawtech_get_option( 'footer_note', __( 'PawTech does not replace emergency vet care.', 'pawtech' ) ) )
				);
				?>
			</p>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
