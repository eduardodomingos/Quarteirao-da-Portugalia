<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Quarteirão_da_Portugália
 */

?>

	</div><!-- #site-content -->

	<footer id="site-footer">
		<div class="container">
			<?php if( have_rows('faqs', 'option') ): ?>
				<section id="faqs">
					<div class="row">
						<div class="col-sm-12 col-md-6">
							<h2>FAQs</h2>
						</div>
						<div class="col-sm-12 col-md-6">
							<ul class="accordion faqs-list">
								<?php while( have_rows('faqs', 'option') ): the_row(); ?>
									<li <?php echo get_row_index() <= get_field('active_faqs','option') ? 'class="active"' : ''; ?> >
										<p class="toggle question"><?php the_sub_field('question'); ?></p>
										<div class="inner answer"><?php the_sub_field('answer'); ?></div>
									</li>
								<?php endwhile; ?>
							</ul>
							<div class="button-wrapper">
								<button class="btn-more"><span class="screen-reader-text">Ver todos</span></button>
							</div>
						</div>
					</div>
				</section>

			<?php endif; ?>

			<section class="contacts">
				<h2>Contactos</h2>
				<div class="row">
					<?php if(get_field('address', 'option')):?>
					<div class="col-sm-12 col-md-4">
						<p><?php the_field('address', 'option'); ?></p>
					</div>
					<?php endif; ?>

					<?php if( have_rows('emails', 'option') || have_rows('phones', 'option')  ): ?>

						<div class="col-sm-12 col-md-4">
							<p>
							<?php if( have_rows('emails', 'option') ): ?>
								Email:
								<?php while( have_rows('emails', 'option') ): the_row(); ?>
									<a href="mailto:<?php the_sub_field('email');?>"><?php the_sub_field('email');?></a><br>
								<?php endwhile; ?>
							<?php endif; ?>
							<?php if( have_rows('phones', 'option') ): ?>
								<?php while( have_rows('phones', 'option') ): the_row(); ?>
									Tlfn. <a href="tel:<?php echo str_replace(" ", "", get_sub_field('phone'));?>"><?php the_sub_field('phone');?></a><br>
								<?php endwhile; ?>
							<?php endif; ?>
							<?php if( have_rows('mobiles', 'option') ): ?>
								<?php while( have_rows('mobiles', 'option') ): the_row(); ?>
									Tlmv. <a href="tel:<?php echo str_replace(" ", "", get_sub_field('mobile'));?>"><?php the_sub_field('mobile');?></a><br>
								<?php endwhile; ?>
							<?php endif; ?>
							</p>
						</div>
					
					<?php endif; ?>

					<div class="col-sm-12 col-md-4">
						<a href="/" class="site-logo" rel="home">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-footer.svg" alt="<?php bloginfo( 'name' ); ?>">
						</a>
					</div>
				</div>
			</section>

			<section class="legal">
				<p>copyright &copy; <?php echo  date('Y'); ?> essentia &copy; of their respective owners</p>
			</section>
		</div>
	</footer>


<?php wp_footer(); ?>

</body>
</html>
