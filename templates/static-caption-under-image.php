<div <?php echo esc_attr( $hasAudio ); ?> class="wcp-caption-plugin <?php echo esc_attr( $audioClass ); ?>" ontouchstart="" id="wcp-widget-<?php echo esc_attr( $box_id ).'-'.esc_attr( $key ); ?>">
    <?php do_action( 'ich_start_link', $box_id, $data ); ?>
        <div class="image-caption-box">
            <div class="caption <?php echo esc_attr( $hovereffect ); ?>">
                <div class="as-tble">
                </div>
            </div>
            <img class="wcp-caption-image"
                src="<?php echo esc_attr( $imageurl ); ?>"
                title="<?php echo esc_attr( $imagetitle ); ?>"
                alt="<?php echo esc_attr( $imagealt ); ?>"/>
        </div>                
        <?php do_action( 'ich_caption_text', $box_id, $data ); ?>
    <?php do_action( 'ich_end_link', $data ); ?>
</div>