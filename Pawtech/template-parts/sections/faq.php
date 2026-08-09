<?php
/**
 * FAQ section (also emits FAQPage schema).
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow = isset( $args['eyebrow'] ) ? $args['eyebrow'] : __( 'Questions', 'pawtech' );
$title   = isset( $args['title'] ) ? $args['title'] : __( 'Answers before you join', 'pawtech' );
$faqs    = ! empty( $args['faqs'] ) && is_array( $args['faqs'] ) ? $args['faqs'] : pawtech_default( 'faqs' );

$schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => array(),
);
foreach ( $faqs as $faq ) {
	$schema['mainEntity'][] = array(
		'@type'          => 'Question',
		'name'           => wp_strip_all_tags( $faq['q'] ),
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => wp_strip_all_tags( $faq['a'] ),
		),
	);
}
?>
<section id="faq" class="mx-auto max-w-3xl scroll-mt-20 px-5 py-24">
	<div class="pawtech-reveal">
		<span class="text-xs font-semibold uppercase tracking-[0.22em] text-signal"><?php echo esc_html( $eyebrow ); ?></span>
		<h2 class="mt-4 font-display text-3xl font-bold sm:text-4xl"><?php echo esc_html( $title ); ?></h2>
	</div>

	<dl class="mt-12 divide-y divide-hairline border-y border-hairline">
		<?php foreach ( array_values( $faqs ) as $i => $faq ) : ?>
			<div class="pawtech-reveal" style="transition-delay: <?php echo esc_attr( (string) ( $i * 70 ) ); ?>ms">
				<div class="group py-7">
					<dt class="font-display text-lg font-semibold transition-colors group-hover:text-primary"><?php echo esc_html( $faq['q'] ); ?></dt>
					<dd class="mt-2.5 text-sm leading-relaxed text-muted-foreground"><?php echo esc_html( $faq['a'] ); ?></dd>
				</div>
			</div>
		<?php endforeach; ?>
	</dl>
</section>
<script type="application/ld+json"><?php echo wp_json_encode( $schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded. ?></script>
