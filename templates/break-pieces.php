<div <?php echo esc_attr( $hasAudio ); ?>
    class="wcp-caption-plugin <?php echo esc_attr( $audioClass ); ?>"
    ontouchstart=""
    id="wcp-widget-<?php echo esc_attr( $box_id ).'-'.esc_attr( $key ); ?>">
        <?php do_action( 'ich_start_link', $box_id, $data ); ?>
            <div class="image-caption-box">
                <div class="image-container image-container-disintegrate">
                    <div class="disintegrate-container <?php echo esc_attr( $hovereffect ); ?>">
                        <img src="<?php echo esc_attr( $imageurl ); ?>" alt="<?php echo esc_attr( $imagealt ); ?>">
                        <img src="<?php echo esc_attr( $imageurl ); ?>" alt="<?php echo esc_attr( $imagealt ); ?>" class="image-clip-1 wcp-caption-image">
                        <img src="<?php echo esc_attr( $imageurl ); ?>" alt="<?php echo esc_attr( $imagealt ); ?>" class="image-clip-2 wcp-caption-image">
                        <img src="<?php echo esc_attr( $imageurl ); ?>" alt="<?php echo esc_attr( $imagealt ); ?>" class="image-clip-3 wcp-caption-image">
                        <img src="<?php echo esc_attr( $imageurl ); ?>" alt="<?php echo esc_attr( $imagealt ); ?>" class="image-clip-4 wcp-caption-image">
                        <img src="<?php echo esc_attr( $imageurl ); ?>" alt="<?php echo esc_attr( $imagealt ); ?>" class="image-clip-5 wcp-caption-image">
                    </div>
                    <div class="image-overlay-container caption">
                        <div class="as-tble">
                            <<?php echo esc_attr( $captionwrap ); ?> class="centered-text">
                                <?php
                                    if (isset($fgg_settings['caption_shortcodes'])) {
                                        echo apply_filters('the_content', $captiontext);
                                    } else {
                                        echo stripcslashes($captiontext);
                                    }
                                 ?>
                            </<?php echo esc_attr( $captionwrap ); ?>>
                        </div>
                    </div>
                </div>
            </div>
        <?php do_action( 'ich_end_link', $data ); ?>
</div>