<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package digitalia
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('w-full'); ?>>
	<div class="entry-content max-w-none prose prose-lg mx-auto">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'digitalia' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>
</article>
