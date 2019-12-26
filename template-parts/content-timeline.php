<?php if(!empty($events)): ?>
    <section <?php echo $settings['id'] ? 'id="'. $settings['id'] .'"' :  ''; ?> class="block">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="c-timeline">
                        <div class="events">
                            <ul>
                                <?php foreach($events as $event):?>
                                    <li style="width: calc(100% / <?php echo count($events); ?>);" <?php echo $event['event']['special'] ? 'class="red"' : ''; ?>>
                                        <div class="event<?php echo $event['event']['special'] ? ' red' : ''; ?>" id="event-<?php echo  $event['event']['year']; ?>">
                                            <span class="date"><?php echo  $event['event']['year']; ?></span>
                                        </div>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="modals">
                            <?php foreach($events as $event):?>
                            <div class="c-modal" id="modal-<?php echo $event['event']['year']; ?>">
                                <button class="modal-close"><span class="screen-reader-text">Fechar</span>
                                <svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.1502 25L16.6152 25L10.2102 14.745H10.1402L3.73516 25H0.375158L8.35516 12.575L0.585158 0.57H4.12016L10.2452 10.3H10.3152L16.5802 0.57H19.9402L12.1002 12.47L20.1502 25Z"/>
                                </svg>
                            </button>
                                <div class="modal-inner">
                                
                                    <?php if(!empty($event['event']['photos'])): ?>
                                        <?php if(count($event['event']['photos'])> 1): ?>
                                            <ul class="modal-slider">
                                                <?php foreach($event['event']['photos'] as $photos):?>
                                                    <?php foreach($photos as $photo):?>
                                                        <li><?php echo wp_get_attachment_image($photo, 'modal-gallery'); ?></li>
                                                    <?php endforeach;?>
                                                <?php endforeach;?>
                                            </ul>
                                        <?php else:?>
                                            <figure class="media main-modal-media">
                                                <?php echo wp_get_attachment_image($event['event']['photos'][0]['photo'], 'modal-gallery'); ?>
                                            </figure>
                                        <?php endif;?>
                                    <?php endif;?>

                                    <h1 class="title"><?php echo  $event['event']['year']; ?></h1>
                                    <p class="lead"><?php echo  $event['event']['lead']; ?></p>
                                    <div class="content-wrapper">
                                        <?php echo  $event['event']['content']; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>