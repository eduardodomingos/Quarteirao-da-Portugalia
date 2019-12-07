<section class="block" <?php echo $settings['id'] ? 'id="'. $settings['id'] .'"' :  ''; ?>>
    <div class="container">
        <h2><?php echo $settings['title'] ?></h2>
        <div class="row">
            <?php foreach($contents as $content): ?>
                <?php foreach($content as $communication): ?>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <article class="teaser">
                        <?php if($communication['url']): ?>
                            <a href="<?php echo $communication['url']; ?>">
                        <?php endif;?>
                        <div class="media">
                            <?php echo wp_get_attachment_image($communication['photo'], 'large'); ?>
                        </div>
                        <div class="text-details">
                            <h1><?php echo $communication['title'];?></h1>
                            <p class="meta"><?php echo $communication['date']; ?></p>
                        </div>
                        <?php if($communication['url']): ?>
                            </a>
                        <?php endif;?>
                    </article>
                </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>