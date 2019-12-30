<section class="block" <?php echo $settings['id'] ? 'id="'. $settings['id'] .'"' :  ''; ?>>
    <div class="container">
        <div class="row">
            <div class="col-sm col-lg-11 lg-offset-1">
                <div class="row">
                    <?php foreach($contents as $content): ?>
                        <?php foreach($content as $counter): ?>
                            <div class="col-sm">
                                <div class="c-counter">
                                    <img src="<?php echo $counter['icon'];?>" alt="">
                                    <p><span class="numscroller-wrapper"><span class="numscroller" data-min='1' data-max='<?php echo $counter['value'];?>' data-delay='5' data-increment='2'><?php echo $counter['value'];?></span><?php echo $counter['unit'];?></span><?php echo $counter['text'];?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
                <?php if($more_link):?>
                    <div class="row">
                        <div class="col-sm">
                            <p class="more-link">
                                <a href="<?php echo $more_link; ?>">Saber mais</a>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>