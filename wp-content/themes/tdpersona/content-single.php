<?php
/**
 * @package tdpersona
 * @since tdpersona 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
			<?php tdpersona_post_date(); ?>
		<?php endif; ?>

		<?php if ( has_post_thumbnail() ): ?>
		<div class="post-thumb">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumb -->
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>

		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tdpersona' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta bottom">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'tdpersona' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'tdpersona' ) );

			if ( ! tdpersona_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'Heard at %2$s |', 'tdpersona' );
				} else {
					$meta_text = __( '', 'tdpersona' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( '%1$s | Heard at %2$s |', 'tdpersona' );
				} else {
					$meta_text = __( '%1$s |', 'tdpersona' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'tdpersona' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->