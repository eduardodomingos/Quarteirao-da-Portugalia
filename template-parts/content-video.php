<?php if($video_url): ?>
    <section class="block" <?php echo $settings['id'] ? 'id="'. $settings['id'] .'"' :  ''; ?>>
        <div class="container">
            <div class="video-wrapper">
                <video controls>
                    <source src="<?php echo $video_url; ?>" type="video/mp4">
                </video>
            </div>
        </div>
    </section>
<?php endif; ?>