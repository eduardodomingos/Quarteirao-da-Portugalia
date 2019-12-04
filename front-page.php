<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quarteirão_da_Portugália
 */

get_header();
?>


<?php if( have_rows('homepage_content') ): ?>
    <?php while( have_rows('homepage_content') ): the_row(); ?>
        <?php if( get_row_layout() == 'hero' ): ?>

			<section id="hero" <?php echo get_sub_field('tagline_interval') ? 'data-tagline-interval="' . get_sub_field('tagline_interval')*1000 .'"' : ''; ?> <?php echo get_sub_field('highlight_color') ? 'class="'. get_sub_field('highlight_color') .'"' : ''; ?>>
				<div class="hero-bg">
					<video autoplay="" loop="" muted="" poster="">
						<source src="<?php the_sub_field('video_mp4'); ?>" type="video/mp4">
						<?php if(get_sub_field('video_webm')): ?>
							<source src="<?php the_sub_field('video_webm'); ?>" type="video/webm">
						<?php endif; ?>
					</video>
				</div>
				<?php if( have_rows('taglines') ): ?>
					<ul>
					<?php while( have_rows('taglines') ): the_row();?>
						<li class="animated c-title"><?php the_sub_field('tagline') ?></li>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</section>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>




<?php
get_footer();
