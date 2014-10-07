<?php
/**
 * @package tdpersona
 * @since tdpersona 1.0
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'tdpersona' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="responsive-date">
				<?php tdpersona_post_date_alt(); ?>
			</div><!-- .responsive-date -->
			<?php tdpersona_post_date(); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">

		<?php if ( has_post_thumbnail() ): ?>
			<div class="post-thumb">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumb -->
		<?php endif; ?>

		<?php the_content( __( 'Continue reading...', 'tdpersona' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tdpersona' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta bottom">
		<?php tdpersona_posted_on(); ?>
		<?php edit_post_link( __( 'Edit', 'tdpersona' ), '<span class="sep"> / </span> <span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->

	<div class="post-seperator">
		<div class="go-top-box border-radius-circle"><i class="fa fa-arrow-up"></i></div>
	</div><!-- .post-seperator -->

</article><!-- #post-<?php the_ID(); ?> -->
