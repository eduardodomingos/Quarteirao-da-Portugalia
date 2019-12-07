<section <?php echo $settings['id'] ? 'id="'. $settings['id'] .'"' :  ''; ?> class="block block-content <?php echo $settings['color'] ? $settings['color'] :''; ?> <?php  echo $settings['heading'] ? $settings['heading'] :''; ?>">
    <div class="container">
        <div class="row">
            <div class="col-sm <?php echo $contents['column_1']['animation'] ? 'wow fast '. $contents['column_1']['animation'] : ''; ?>">
                <div class="wyswyg">	
                    <?php echo  $contents['column_1']['content']; ?>
                </div>
            </div>
        </div>
    </div>
</section>