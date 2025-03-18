<div class="wcp-caption-plugin" ontouchstart="">
    <?php if ( ! empty( $settings['link']['url'] ) ) { ?>
        <a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
    <?php } ?>

        <div class="image-caption-box">
            <div class="caption <?php echo esc_attr( $template_style ); ?> <?php echo esc_attr($overlay_class); ?>">
                <div class="as-tble">
                </div>
            </div>
            <img class="wcp-caption-image"
            src="<?php echo esc_url( $image_url ); ?>"
            title=""
            alt=""/>
        </div>
        
        <?php echo wp_kses_post($settings['caption']); ?>

        <?php if ( ! empty( $settings['link']['url'] ) ) { ?>
            </a>
        <?php } ?>
</div>