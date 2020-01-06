<section class="block" <?php echo $settings['id'] ? 'id="'. $settings['id'] .'"' :  ''; ?>>
    <div class="c-slider">
        <?php foreach($contents as $content): ?>
            <?php foreach($content as $photo): ?>
                <div class="photo-wrapper">
                    <?php echo wp_get_attachment_image($photo, 'large'); ?>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</section>