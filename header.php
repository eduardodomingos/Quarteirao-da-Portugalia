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
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/hamburger.svg" alt="Hamburger Menu">
			</button>

			<a href="/" class="site-logo" rel="home">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.svg" alt="<?php bloginfo( 'name' ); ?>">
			</a>
			
			<nav class="site-main-nav">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'main',
					'menu_id'        => 'primary-menu',
					''
				) );
				?>
			</nav>
		</div>
	</header>

    <nav id="site-side-nav">
        <div class="header">
            <button class="side-nav-close">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="Close Navigation">
            </button>
            <a href="/" class="site-logo" rel="home">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-black.svg" alt="<?php bloginfo( 'name' ); ?>">
            </a>
        </div>
		<?php
		wp_nav_menu( array(
			'theme_location' => 'main',
			'menu_id'        => 'primary-menu',
			''
		) );
		?>
    </nav>

	<div id="site-content">
