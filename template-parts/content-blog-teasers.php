<section class="block" <?php echo $settings['id'] ? 'id="'. $settings['id'] .'"' :  ''; ?>>
    <div class="container">
        <h2><?php echo $settings['title'] ?></h2>
        <div class="row">
        <?php foreach($contents['articles'] as $article): ?>

            <div class="col-sm-12 col-md-6 col-lg-3">
                <article class="teaser">
                    <?php if( get_field('external_url', $article->ID )):?>
                        <a href="<?php echo get_field('external_url', $article->ID )?>" target="_blank">
                    <?php else:?>
                        <a href="<?php echo esc_url( get_permalink($article->ID)); ?>">
                    <?php endif;?>
                        <div class="media">
                            <?php echo get_the_post_thumbnail($article->ID, 'large'); ?>
                        </div>
                        <div class="text-details">
                            <h1><?php echo $article->post_title;?></h1>
                            <p class="meta"><?php echo $article->post_date; ?></p>
                        </div>
                    </a>
                </article>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>