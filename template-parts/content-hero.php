<section id="hero" <?php echo $settings['color'] ? 'class="'. $settings['color'] .'"': ''; ?>>
    <div class="hero-bg">
        <?php if($content['video_mp4'] || $content['video_webm'] ): ?>
            <video autoplay loop muted playsinline>
            <?php if($content['video_mp4']): ?>
                    <source src="<?php echo $content['video_mp4'];  ?>" type="video/mp4">
                <?php endif; ?>
                <?php if($content['video_webm']): ?>
                    <source src="<?php echo $content['video_webm'];  ?>" type="video/webm">
                <?php endif; ?>
            </video>
        <?php endif; ?>
    </div>
    <ul>
        <?php foreach($content['taglines'] as $taglines):?>
            <li class="animated"><?php echo preg_replace('/<p>(.*?)<\/p>/','<h1>$1</h1>', $taglines['tagline']) ?></li>
        <?php endforeach;?>
    </ul>
</section>