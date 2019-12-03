<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Quarteirão_da_Portugália
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="site-header">
		<div class="container">
			<button class="site-cheeseburger">
				<img src="https://via.placeholder.com/50x50" alt="">
			</button>

			<a href="/" class="site-logo" rel="home">
				<img src="assets/images/logo-white.svg" alt="Quarteirão da Portugália">
			</a>

			<nav class="site-main-nav">
				<ul>
					<li><a href="#enquadramento">Enquadramento</a></li>
					<li><a href="#projeto">Projeto</a></li>
					<li><a href="#estudo">Estudo</a></li>
					<li><a href="#participacao">Participação</a></li>
					<li><a href="#noticias">Notícias</a></li>
				</ul>
			</nav>
		</div>
	</header>

    <nav id="site-side-nav">
        <div class="header">
            <button class="side-nav-close">
                <img src="https://via.placeholder.com/50x50" alt="">
            </button>
            <a href="/" class="site-logo" rel="home">
                <img src="assets/images/logo-black.svg" alt="Qurteirão da Portugália">
            </a>
        </div>
        <ul>
            <li><a href="#enquadramento">Enquadramento</a></li>
            <li><a href="#projeto">Projeto</a></li>
            <li><a href="#estudo">Estudo</a></li>
            <li><a href="#participacao">Participação</a></li>
            <li><a href="#noticias">Notícias</a></li>
        </ul>
    </nav>

	<div id="site-content">
