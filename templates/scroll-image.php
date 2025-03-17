<?php
    $scroll_class = 'ich-scroll-image-wrap-'.rand(1,250);
?>
<div <?php echo esc_attr( $hasAudio ); ?>
    class="wcp-caption-plugin <?php echo esc_attr( $audioClass ); ?>"
    ontouchstart=""
    id="wcp-widget-<?php echo esc_attr( $box_id ).'-'.esc_attr( $key ); ?>">
        <?php do_action( 'ich_start_link', $box_id, $data ); ?>
            <div class="image-caption-box <?php echo esc_attr( $scroll_class ); ?> <?php echo esc_attr( $hovereffect ); ?>">
                    <div class="caption">
                        <div class="as-tble">
                            <?php do_action( 'ich_caption_text', $box_id, $data ); ?>
                        </div>
                    </div>
            </div>

        <?php do_action( 'ich_end_link', $data ); ?>
</div>
<style>
    .<?php echo esc_attr($scroll_class); ?> {
        display: block;
        transition: background-position <?php echo ($animationspeed != '') ? esc_attr($animationspeed) : '5s' ; ?> ease-out 0s;
        -webkit-transition: background-position <?php echo ($animationspeed != '') ? esc_attr($animationspeed) : '5s' ; ?> ease-out 0s;
        -moz-transition: background-position <?php echo ($animationspeed != '') ? esc_attr($animationspeed) : '5s' ; ?> ease-out 0s;
        background-color: #ffffff;
        height: <?php echo ($boxheight != '') ? esc_attr($boxheight) : '280px' ; ?>;
        background-position: center 0;
        background-repeat: no-repeat;
        background-size: 100% auto;
        background-image: url('<?php echo esc_attr( $imageurl ); ?>'); 
        overflow: hidden;       
        border-radius: <?php echo esc_attr($border_radius); ?>; 
    }
</style>