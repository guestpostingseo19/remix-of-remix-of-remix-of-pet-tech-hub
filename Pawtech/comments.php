<?php
/**
 * Comments template.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="mt-16 border-t border-hairline pt-10">
	<?php if ( have_comments() ) : ?>
		<h2 class="font-display text-xl font-semibold">
			<?php
			$pawtech_count = (int) get_comments_number();
			printf(
				/* translators: %d: comment count. */
				esc_html( _n( '%d comment', '%d comments', $pawtech_count, 'pawtech' ) ),
				(int) $pawtech_count
			);
			?>
		</h2>

		<ol class="mt-8 space-y-6">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 40,
				)
			);
			?>
		</ol>

		<?php
		the_comments_pagination(
			array(
				'prev_text' => esc_html__( 'Previous', 'pawtech' ),
				'next_text' => esc_html__( 'Next', 'pawtech' ),
			)
		);
		?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="mt-6 text-sm text-muted-foreground"><?php esc_html_e( 'Comments are closed.', 'pawtech' ); ?></p>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'class_form'         => 'mt-10 space-y-4',
			'title_reply_before' => '<h2 class="font-display text-xl font-semibold mb-4">',
			'title_reply_after'  => '</h2>',
			'comment_field'      => '<p class="comment-form-comment"><label for="comment" class="mb-2 block text-sm text-muted-foreground">' . esc_html__( 'Comment', 'pawtech' ) . '</label><textarea id="comment" name="comment" rows="5" required class="w-full rounded-2xl hairline bg-surface p-4 text-sm text-foreground focus:outline-none focus:ring-2 focus:ring-ring"></textarea></p>',
			'class_submit'       => 'rounded-full bg-primary px-5 py-2.5 text-sm font-semibold text-primary-foreground',
		)
	);
	?>
</section>
