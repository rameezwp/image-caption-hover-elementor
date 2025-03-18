<?php
    $scroll_class = 'ich-scroll-image-wrap-'.rand(1,250);
?>
<div class="wcp-caption-plugin" ontouchstart="">

    <?php if ( ! empty( $settings['link']['url'] ) ) { ?>
        <a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
    <?php } ?>

            <div class="image-caption-box ich-scroll-box <?php echo esc_attr( $template_style ); ?>">
                    <div class="caption <?php echo esc_attr($overlay_class); ?>">
                        <div class="as-tble">
                            <?php echo wp_kses_post($settings['caption']); ?>
                        </div>
                    </div>
            </div>

    <?php if ( ! empty( $settings['link']['url'] ) ) { ?>
        </a>
    <?php } ?>
</div>