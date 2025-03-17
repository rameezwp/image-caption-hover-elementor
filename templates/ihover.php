<div <?php echo esc_attr( $hasAudio ); ?>
        class="wcp-caption-plugin ih-item <?php echo esc_attr( $hovereffect ); ?> <?php echo esc_attr( $audioClass ); ?>"
        ontouchstart=""
        id="wcp-widget-<?php echo esc_attr( $box_id ).'-'.esc_attr( $key ); ?>">
        <div class="wcp-ih-inner">
        <?php do_action( 'ich_start_link', $box_id, $data );
            $infoBack = $this->has_info_class($hovereffect); ?>
            <div class="img">
                <img src="<?php echo esc_attr( $imageurl ); ?>" title="<?php echo esc_attr( $imagetitle ); ?>" alt="<?php echo esc_attr( $imagealt ); ?>" />                
            </div>
            <div class="info">
                <div <?php echo ($infoBack) ? 'class="info-back"' : '' ; ?>>
                    <h3>
                        <?php echo (isset($imagetitle) && $imagetitle != '') ? $imagetitle : 'TITLE HERE' ; ?>
                    </h3>
                    <div class="bottom-caption">
                        <?php
                            if (isset($fgg_settings['caption_shortcodes'])) {
                                echo apply_filters('the_content', $captiontext);
                            } else {
                                echo stripcslashes($captiontext);
                            }
                         ?>
                    </div>
                </div>
            </div>
            <?php do_action( 'ich_end_link', $data ); ?>
        </div>
</div>