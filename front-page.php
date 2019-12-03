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

<section id="hero">
	<div class="hero-bg">
		<video autoplay="" loop="" muted="" poster="">
			<source src="assets/video/video.mp4" type="video/mp4">
		</video>
	</div>
	<ul>
		<li class="c-title">Um novo quarteirão para os <span class="orange">Lisboetas</span></li>
	</ul>
</section>



<?php
get_footer();
