<div <?php echo esc_attr( $hasAudio ); ?>
    class="wcp-caption-plugin <?php echo esc_attr( $audioClass ); ?>"
    ontouchstart=""
    id="wcp-widget-<?php echo esc_attr( $box_id ).'-'.esc_attr( $key ); ?>">
        <?php do_action( 'ich_start_link', $box_id, $data ); ?>
            <div class="image-caption-box">
                <div class="caption <?php echo esc_attr( $hovereffect ); ?>">
                    <div class="as-tble">
                        <<?php echo esc_attr( $captionwrap ); ?> class="centered-text">
                            <h2 class="heading"><?php echo esc_attr( $imagetitle ); ?></h2>
                            <div class="desc">
                                <?php
                                    if (isset($fgg_settings['caption_shortcodes'])) {
                                        echo apply_filters('the_content', $captiontext);
                                    } else {
                                        echo stripcslashes($captiontext);
                                    }
                                 ?>
                            </div>
                        </<?php echo esc_attr( $captionwrap ); ?>>
                    </div>
                </div>
                <img class="wcp-caption-image"
                    src="<?php echo esc_attr( $imageurl ); ?>"
                    title="<?php echo esc_attr( $imagetitle ); ?>"
                    alt="<?php echo esc_attr( $imagealt ); ?>"/>
            </div>
        <?php do_action( 'ich_end_link', $data ); ?>
</div>