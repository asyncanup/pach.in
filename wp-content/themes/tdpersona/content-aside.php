<?php
/**
 * The template used for displaying quote content
 *
 * @package tdpersona
 * @since tdpersona 1.0
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('post-index'); ?>>
	<header class="entry-header">
	
	<?php if ( 'post' == get_post_type() ) : ?>
		<?php tdpersona_post_date(); ?>	
	<?php endif; ?>
		
	</header>
	
	<div class="entry-content">
		<?php 
			$content = get_post_field('post_content', $post->ID);
			echo $content;
		?>
	</div><!-- .quote-entry-content -->
	
	<footer class="entry-meta bottom">
		<?php edit_post_link( __( 'Edit', 'tdpersona' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
  	
  	<div class="post-seperator">
		<div class="go-top-box border-radius-circle"><i class="fa fa-arrow-up"></i></div>
	</div>
  	
</article><!-- #post-<?php the_ID(); ?> -->