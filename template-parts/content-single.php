<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quarteirão_da_Portugália
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="container">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
	
			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					qpt_posted_on();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>


			<div class="entry-buttons">
				<?php 
				$url = urlencode(get_the_permalink());
				$title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
				?>
				<ul class="share-this">
					<li class="print">
						<button onClick="window.print()">
							<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<rect width="26" height="26" fill="url(#pattern0)"/>
								<defs>
								<pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
								<use xlink:href="#image0" transform="scale(0.0416667)"/>
								</pattern>
								<image id="image0" width="24" height="24" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAgUlEQVRIie2U0QqAIAxF76S/ir7e+i57iIHR2Bw6wuiADzrd5Tod4UkR1jxQPUmdyUwWJUZKTEJ0Hu7gF2gSOHAViAdTnEM6lwn97950MJoVwBYpkFD9oSmv6GMC8zc7zQFjvTLVaYuA96puJAC7sUfrOxZZS+hFPPdqkYe0kHAHJ9CpJaMDBpMCAAAAAElFTkSuQmCC"/>
								</defs>
							</svg>
						</button>
					</li>
					<li class="facebook">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" title="Partilhar no Facebook">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
								<path d="M19 6h5v-6h-5c-3.86 0-7 3.14-7 7v3h-4v6h4v16h6v-16h5l1-6h-6v-3c0-0.542 0.458-1 1-1z"></path>
							</svg>
						</a>
					</li>
					<li class="twitter">
						<a href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>&amp;via=quarteiraodaportugalia" title="Partilhar no Twitter">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
								<path d="M32 7.075c-1.175 0.525-2.444 0.875-3.769 1.031 1.356-0.813 2.394-2.1 2.887-3.631-1.269 0.75-2.675 1.3-4.169 1.594-1.2-1.275-2.906-2.069-4.794-2.069-3.625 0-6.563 2.938-6.563 6.563 0 0.512 0.056 1.012 0.169 1.494-5.456-0.275-10.294-2.888-13.531-6.862-0.563 0.969-0.887 2.1-0.887 3.3 0 2.275 1.156 4.287 2.919 5.463-1.075-0.031-2.087-0.331-2.975-0.819 0 0.025 0 0.056 0 0.081 0 3.181 2.263 5.838 5.269 6.437-0.55 0.15-1.131 0.231-1.731 0.231-0.425 0-0.831-0.044-1.237-0.119 0.838 2.606 3.263 4.506 6.131 4.563-2.25 1.762-5.075 2.813-8.156 2.813-0.531 0-1.050-0.031-1.569-0.094 2.913 1.869 6.362 2.95 10.069 2.95 12.075 0 18.681-10.006 18.681-18.681 0-0.287-0.006-0.569-0.019-0.85 1.281-0.919 2.394-2.075 3.275-3.394z"></path>
							</svg>
						</a>
					</li>
				</ul>

			</div>
		</div>
	</header><!-- .entry-header -->
	<div class="container">
		<?php qpt_post_thumbnail(); ?>
	</div>
	<div class="entry-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-10 offset-lg-1">
					<div class="lead">
					<?php
						$lead = get_field( "lead" );
						if( $lead ) {
							echo $lead;
						} 
					?>
					</div>
					<?php
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'qpt' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );

					// wp_link_pages( array(
					// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'qpt' ),
					// 	'after'  => '</div>',
					// ) );
					?>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-10 offset-lg-1">
					<a class="back-to-blog" href="<?php echo get_permalink( get_option( 'page_for_posts' ) );?>">
						<span>
							<svg width="25" height="11" viewBox="0 0 25 11" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M23.9325 5.2371V5.0871H23.7825H3.61637L7.46609 1.73934L7.59625 1.62615L7.46609 1.51296L6.72809 0.871187L6.62966 0.785591L6.53123 0.871187L1.11886 5.57785L0.988696 5.69104L1.11886 5.80423L6.53123 10.5109L6.62966 10.5965L6.72809 10.5109L7.46609 9.86912L7.59625 9.75593L7.46609 9.64274L3.61636 6.29498H23.7825H23.9325V6.14498V5.2371Z" fill="white" stroke="white" stroke-width="0.3"/>
							</svg>
						</span>Voltar</a>
				</div>
			</div>
		</div>	
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
