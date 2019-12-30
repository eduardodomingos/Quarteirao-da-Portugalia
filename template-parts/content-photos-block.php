<section <?php echo $settings['id'] ? 'id="'. $settings['id'] .'"' :  ''; ?> class="block block-content <?php echo $settings['color'] ? $settings['color'] :''; ?> <?php echo $settings['heading'] ? $settings['heading'] :''; ?>">
    <div class="container">
        <div class="row">
            <div class="col-sm <?php echo $contents['column_1']['animation'] ? 'wow fast '. $contents['column_1']['animation'] : ''; ?> <?php echo $settings['position'] == 'right' ? 'order-md-2' : '';?>" >
                <?php if(count($contents['column_1']['photos']) > 0): ?>
                        <ul class="c-list-images">
                        <?php foreach($contents['column_1']['photos'] as $photos): ?>
                            <?php foreach($photos as $photo): ?>
                                <li><?php echo wp_get_attachment_image($photo, 'large'); ?></li>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="col-sm <?php echo $contents['column_2']['animation'] ? 'wow fast '. $contents['column_2']['animation'] : ''; ?> <?php echo $settings['position'] == 'right' ? 'order-md-1' : '';?>">
                <?php echo  $contents['column_2']['content']; ?>
                <?php if($contents['column_2']['more_link']):?>
                    <p class="more-link">
                        <a href="<?php echo $contents['column_2']['more_link']; ?>">Saber mais</a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>