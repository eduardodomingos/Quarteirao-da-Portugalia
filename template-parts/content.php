<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quarteirão_da_Portugália
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('teaser'); ?>>
	<header class="entry-header">
		<?php qpt_post_thumbnail(); ?>
		<?php 
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				qpt_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php qpt_posted_in();?>

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			if( get_field('external_url', get_the_ID() )) {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_field('external_url', get_the_ID())) . '" rel="bookmark">', '</a></h2>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		endif;
		?>
	</header><!-- .entry-header -->

</article><!-- #post-<?php the_ID(); ?> -->
