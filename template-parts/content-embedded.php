<?php if($embed): ?>
    <section class="block" <?php echo $settings['id'] ? 'id="'. $settings['id'] .'"' :  ''; ?>>
        <div class="container">
            <div class="embedded-content">
                <div class="embedded-content-container">
                    <div>
                        <?php echo $embed; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>