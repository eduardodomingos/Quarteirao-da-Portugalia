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
			<?php qpt_get_template_part('template-parts/content', 'hero', array(
				'settings' => get_sub_field('settings'),
				'content' => get_sub_field('content')
				));
			?>
		<?php elseif( get_row_layout() == 'content_block' ): ?>
			<?php qpt_get_template_part('template-parts/content', 'content-block', array(
				'settings' => get_sub_field('settings'),
				'contents' => get_sub_field('contents')
				));
			?>
		<?php elseif( get_row_layout() == 'content_block_1_col' ): ?>
			<?php qpt_get_template_part('template-parts/content', 'content-block-1-col', array(
				'settings' => get_sub_field('settings'),
				'contents' => get_sub_field('contents')
				));
			?>
		<?php elseif( get_row_layout() == 'map' ): ?>			
			<?php qpt_get_template_part('template-parts/content', 'map', array(
				'settings' => get_sub_field('settings'),
				'map' => get_sub_field('map')
				));
			?>

		<?php elseif( get_row_layout() == 'timeline' ): ?>
			<?php qpt_get_template_part('template-parts/content', 'timeline', array(
				'settings' => get_sub_field('settings'),
				'events' => get_sub_field('events')
				));
			?>
			
		<?php elseif( get_row_layout() == 'photos_block' ): ?>
			<?php qpt_get_template_part('template-parts/content', 'photos-block', array(
				'settings' => get_sub_field('settings'),
				'contents' => get_sub_field('contents')
				));
			?>
			
		<?php elseif( get_row_layout() == 'blueprint' ): ?>
			<?php qpt_get_template_part('template-parts/content', 'blueprint', array(
				'settings' => get_sub_field('settings'),
				'contents' => get_sub_field('contents')
				));
			?>
			
		<?php elseif( get_row_layout() == 'gallery' ): ?>
			<?php qpt_get_template_part('template-parts/content', 'gallery', array(
				'settings' => get_sub_field('settings'),
				'contents' => get_sub_field('photos')
				));
			?>

		<?php elseif( get_row_layout() == 'counters' ): ?>
			<?php qpt_get_template_part('template-parts/content', 'counters', array(
				'settings' => get_sub_field('settings'),
				'contents' => get_sub_field('counters'),
				'more_link' => get_sub_field('more_link')
				));
			?>
		<?php elseif( get_row_layout() == 'communication' ): ?>
			<?php qpt_get_template_part('template-parts/content', 'communications', array(
				'settings' => get_sub_field('settings'),
				'contents' => get_sub_field('communications')
				));
			?>

		<?php elseif( get_row_layout() == 'blog' ): ?>
			<?php qpt_get_template_part('template-parts/content', 'blog-teasers', array(
				'settings' => get_sub_field('settings'),
				'contents' => get_sub_field('contents')
				));
			?>
		<?php endif; ?>
		
    <?php endwhile; ?>
<?php endif; ?>




<?php
get_footer();
