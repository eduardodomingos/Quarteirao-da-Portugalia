<section <?php echo $settings['id'] ? 'id="'. $settings['id'] .'"' :  ''; ?> class="block block-content <?php echo $settings['color'] ? $settings['color'] :''; ?> <?php  echo $settings['heading'] ? $settings['heading'] :''; ?>">
    <div class="container">
        <div class="row">
            <div class="col-sm col-lg-7 <?php echo $contents['left_column']['animation'] ? 'wow fast '. $contents['left_column']['animation'] : ''; ?>">
                <div class="wyswyg">	
                    <?php echo  $contents['left_column']['content']; ?>
                    <?php if($contents['left_column']['more_link']):?>
                        <p class="more-link">
                            <a href="<?php echo  $contents['left_column']['more_link']; ?>">Saber mais</a>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm col-lg-4 offset-lg-1 <?php echo $contents['right_column']['animation'] ? 'wow fast '. $contents['right_column']['animation'] : ''; ?>">
                <div class="wyswyg">
                    <?php echo  $contents['right_column']['content']; ?>
                    <?php if($contents['right_column']['more_link']):?>
                        <p class="more-link">
                            <a href="<?php echo  $contents['right_column']['more_link']; ?>">Saber mais</a>
                        </p>
                     <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>