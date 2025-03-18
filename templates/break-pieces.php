<div class="wcp-caption-plugin" ontouchstart="">

    <?php if ( ! empty( $settings['link']['url'] ) ) { ?>
        <a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
    <?php } ?>

            <div class="image-caption-box">
                <div class="image-container image-container-disintegrate">
                    <div class="disintegrate-container <?php echo esc_attr( $template_style ); ?>">
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="">
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="" class="image-clip-1 wcp-caption-image">
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="" class="image-clip-2 wcp-caption-image">
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="" class="image-clip-3 wcp-caption-image">
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="" class="image-clip-4 wcp-caption-image">
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="" class="image-clip-5 wcp-caption-image">
                    </div>
                    <div class="image-overlay-container caption <?php echo esc_attr($overlay_class); ?>">
                        <div class="as-tble">
                            <div class="centered-text">
                                <?php echo wp_kses_post($settings['caption']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php if ( ! empty( $settings['link']['url'] ) ) { ?>
        </a>
    <?php } ?>
</div>