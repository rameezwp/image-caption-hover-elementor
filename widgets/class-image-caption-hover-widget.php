<?php
namespace CA_Image_Caption_Hover_Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Widget extends Widget_Base {
    public function get_name() {
        return 'ca_image_caption_hover';
    }

    public function get_title() {
        return esc_html__('Image Caption Hover', 'image-caption-hover-elementor');
    }

    public function get_icon() {
        return 'eicon-featured-image';
    }

    public function get_categories() {
        return ['basic'];
    }

    public function get_keywords() {
        return [ 'image', 'hover', 'effect', 'caption', 'img', 'hover text' ];
    }

    public function get_style_depends(): array {
        return [ 'caiche-style' ];
    }

    public function get_script_depends(): array {
        return [ 'caiche-script' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_image',
            [
                'label' => esc_html__('Image and Style', 'image-caption-hover-elementor'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'template_style',
            [
                'label' => esc_html__( 'Style', 'image-caption-hover-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_template_styles(),
                'default' => 'caption-slide-up',
            ]
        );

        $this->add_responsive_control(
            'box_height',
            [
                'label' => esc_html__('Box Height', 'image-caption-hover-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 300,
                ],
                'condition' => [
                    'template_style' => ['scroll-image-bottom-caption', 'scroll-image-top-caption'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ich-scroll-box' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'image-caption-hover-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'selectors' => [
                    '{{WRAPPER}} .ich-scroll-box' => 'background-image: url({{URL}});',
                ],                
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_caption',
            [
                'label' => esc_html__('Caption', 'image-caption-hover-elementor'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'caption',
            [
                'label' => esc_html__('Caption', 'image-caption-hover-elementor'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('Provide some caption here', 'image-caption-hover-elementor'),
            ]
        );

        $this->add_control(
            'overlay',
            [
                'label' => esc_html__( 'Overlay Position', 'image-caption-hover-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'full'   => esc_html__('Full', 'image-caption-hover-elementor'),
                    'top'   => esc_html__('Top', 'image-caption-hover-elementor'),
                    'bottom'   => esc_html__('Bottom', 'image-caption-hover-elementor'),
                ),
                'default' => 'full',
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'image-caption-hover-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'animation_speed',
            [
                'label' => esc_html__('Animation Speed', 'image-caption-hover-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['ms'],
                'range' => [
                    'ms' => [
                        'min' => 1,
                        'max' => 5000,
                    ],
                ],
                'default' => [
                    'unit' => 'ms',
                    'size' => 1000,
                ],
                'selectors' => [
                    '{{WRAPPER}} .caption, {{WRAPPER}} .wcp-caption-image' => 'transition-duration: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .caption, {{WRAPPER}} .wcp-caption-image' => '-webkit-transition-duration: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Image Size', 'image-caption-hover-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'image_size',
            [
                'label' => esc_html__('Image Size', 'image-caption-hover-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_image_sizes(),
                'default' => 'large'
            ]
        );

        $this->add_control(
            'image_dimension',
            [
                'label' => esc_html__('Image Dimension', 'image-caption-hover-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'responsive' => esc_html__('Responsive', 'image-caption-hover-elementor'),
                    'custom' => esc_html__('Custom', 'image-caption-hover-elementor'),
                ],
                'default' => 'responsive',
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__('Custom Width', 'image-caption-hover-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 300,
                ],
                'condition' => [
                    'image_dimension' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .image-caption-box' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'caption_settings',
            [
                'label' => esc_html__('Caption Settings', 'image-caption-hover-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'caption_align',
            [
                'label' => esc_html__( 'Alignment', 'image-caption-hover-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'image-caption-hover-elementor' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'image-caption-hover-elementor' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'image-caption-hover-elementor' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'image-caption-hover-elementor' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .as-tble' => 'text-align: {{VALUE}};',
                ],
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'caption_color',
            [
                'label' => esc_html__('Caption Color', 'classic-addons-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .wcp-caption-plugin .image-caption-box .as-tble *' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'caption_typo',
                'label' => esc_html__('Typography', 'image-caption-hover-elementor'),
                'selector' => '{{WRAPPER}} .as-tble *',
            ]
        );

        $this->add_control(
            'caption_bg_color',
            [
                'label' => esc_html__('Background Color', 'classic-addons-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.5)',
                'selectors' => [
                    '{{WRAPPER}} .wcp-caption-plugin .image-caption-box .caption' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
    }

    function get_image_sizes(){
        $sizes = array();
        $wpsizes = get_intermediate_image_sizes();
        foreach ($wpsizes as $size) {
            $sizes[$size] = $size;
        }
        return $sizes;
    }

    function get_template_styles(){
        return array(
            'caption-slide-up' => esc_html__('Caption Slide Up', 'image-caption-hover-elementor'),
            'slide-left-to-right' => esc_html__('Slide Left To Right', 'image-caption-hover-elementor'),
            'slide-right-to-left' => esc_html__('Slide Right To Left', 'image-caption-hover-elementor'),
            'slide-top-to-bottom' => esc_html__('Slide Top To Bottom', 'image-caption-hover-elementor'),
            'slide-bottom-to-top' => esc_html__('Slide Bottom To Top', 'image-caption-hover-elementor'),
            'image-flip-up' => esc_html__('Image Flip Up', 'image-caption-hover-elementor'),
            'image-flip-down' => esc_html__('Image Flip Down', 'image-caption-hover-elementor'),
            'image-flip-right' => esc_html__('Image Flip Right', 'image-caption-hover-elementor'),
            'image-flip-left' => esc_html__('Image Flip Left', 'image-caption-hover-elementor'),
            'rotate-image-down' => esc_html__('Rotate Image Down', 'image-caption-hover-elementor'),
            'image-turn-around' => esc_html__('Image Turn Around', 'image-caption-hover-elementor'),
            'zoom-and-pan' => esc_html__('Zoom And Pan', 'image-caption-hover-elementor'),
            'tilt-image' => esc_html__('Tilt Image', 'image-caption-hover-elementor'),
            'morph' => esc_html__('Morph', 'image-caption-hover-elementor'),
            'move-image-right' => esc_html__('Move Image Right', 'image-caption-hover-elementor'),
            'move-image-left' => esc_html__('Move Image Left', 'image-caption-hover-elementor'),
            'move-image-top' => esc_html__('Move Image Top', 'image-caption-hover-elementor'),
            'move-image-bottom' => esc_html__('Move Image Bottom', 'image-caption-hover-elementor'),
            'image-squeez-right' => esc_html__('Image Squeez Right', 'image-caption-hover-elementor'),
            'image-squeez-left' => esc_html__('Image Squeez Left', 'image-caption-hover-elementor'),
            'image-squeez-top' => esc_html__('Image Squeez Top', 'image-caption-hover-elementor'),
            'image-squeez-bottom' => esc_html__('Image Squeez Bottom', 'image-caption-hover-elementor'),
            'fall-down-caption' => esc_html__('Fall Down Caption', 'image-caption-hover-elementor'),
            'fall-down-image' => esc_html__('Fall Down Image', 'image-caption-hover-elementor'),
            'swap-caption' => esc_html__('Swap Caption', 'image-caption-hover-elementor'),
            'swap-image' => esc_html__('Swap Image', 'image-caption-hover-elementor'),
            'puffin-caption' => esc_html__('Puffin Caption', 'image-caption-hover-elementor'),
            'puffin-image' => esc_html__('Puffin Image', 'image-caption-hover-elementor'),
            'puffout-caption' => esc_html__('Puffout Caption', 'image-caption-hover-elementor'),
            'puffout-image' => esc_html__('Puffout Image', 'image-caption-hover-elementor'),
            'opendoordown-caption' => esc_html__('Opendoordown Caption', 'image-caption-hover-elementor'),
            'opendoordown-image' => esc_html__('Opendoordown Image', 'image-caption-hover-elementor'),
            'opendoorup-caption' => esc_html__('Opendoorup Caption', 'image-caption-hover-elementor'),
            'opendoorup-image' => esc_html__('Opendoorup Image', 'image-caption-hover-elementor'),
            'opendoorright-caption' => esc_html__('Opendoorright Caption', 'image-caption-hover-elementor'),
            'opendoorright-image' => esc_html__('Opendoorright Image', 'image-caption-hover-elementor'),
            'opendoorleft-caption' => esc_html__('Opendoorleft Caption', 'image-caption-hover-elementor'),
            'opendoorleft-image' => esc_html__('Opendoorleft Image', 'image-caption-hover-elementor'),
            'rotatedown-caption' => esc_html__('Rotatedown Caption', 'image-caption-hover-elementor'),
            'rotatedown-image' => esc_html__('Rotatedown Image', 'image-caption-hover-elementor'),
            'rotateup-caption' => esc_html__('Rotateup Caption', 'image-caption-hover-elementor'),
            'rotateup-image' => esc_html__('Rotateup Image', 'image-caption-hover-elementor'),
            'rotateright-caption' => esc_html__('Rotateright Caption', 'image-caption-hover-elementor'),
            'rotateright-image' => esc_html__('Rotateright Image', 'image-caption-hover-elementor'),
            'rotateleft-caption' => esc_html__('Rotateleft Caption', 'image-caption-hover-elementor'),
            'rotateleft-image' => esc_html__('Rotateleft Image', 'image-caption-hover-elementor'),
            'spaceoutup-caption' => esc_html__('Spaceoutup Caption', 'image-caption-hover-elementor'),
            'spaceoutup-image' => esc_html__('Spaceoutup Image', 'image-caption-hover-elementor'),
            'spaceoutdown-caption' => esc_html__('Spaceoutdown Caption', 'image-caption-hover-elementor'),
            'spaceoutdown-image' => esc_html__('Spaceoutdown Image', 'image-caption-hover-elementor'),
            'spaceoutright-caption' => esc_html__('Spaceoutright Caption', 'image-caption-hover-elementor'),
            'spaceoutright-image' => esc_html__('Spaceoutright Image', 'image-caption-hover-elementor'),
            'spaceoutleft-caption' => esc_html__('Spaceoutleft Caption', 'image-caption-hover-elementor'),
            'spaceoutleft-image' => esc_html__('Spaceoutleft Image', 'image-caption-hover-elementor'),
            'foolish-caption' => esc_html__('Foolish Caption', 'image-caption-hover-elementor'),
            'foolish-image' => esc_html__('Foolish Image', 'image-caption-hover-elementor'),
            'tinright-caption' => esc_html__('Tinright Caption', 'image-caption-hover-elementor'),
            'tinright-image' => esc_html__('Tinright Image', 'image-caption-hover-elementor'),
            'tinleft-caption' => esc_html__('Tinleft Caption', 'image-caption-hover-elementor'),
            'tinleft-image' => esc_html__('Tinleft Image', 'image-caption-hover-elementor'),
            'tinup-caption' => esc_html__('Tinup Caption', 'image-caption-hover-elementor'),
            'tinup-image' => esc_html__('Tinup Image', 'image-caption-hover-elementor'),
            'tindown-caption' => esc_html__('Tindown Caption', 'image-caption-hover-elementor'),
            'tindown-image' => esc_html__('Tindown Image', 'image-caption-hover-elementor'),
            'simple-fade' => esc_html__('Simple Fade', 'image-caption-hover-elementor'),
            'zoom-in' => esc_html__('Zoom In', 'image-caption-hover-elementor'),
            'zoom-out' => esc_html__('Zoom Out', 'image-caption-hover-elementor'),
            'zoom-in-twist' => esc_html__('Zoom In Twist', 'image-caption-hover-elementor'),
            'zoom-out-twist' => esc_html__('Zoom Out Twist', 'image-caption-hover-elementor'),
            'zoom-caption-in-image-out' => esc_html__('Zoom Caption In Image Out', 'image-caption-hover-elementor'),
            'zoom-caption-out-image-in' => esc_html__('Zoom Caption Out Image In', 'image-caption-hover-elementor'),
            'zoom-image-out-caption-twist' => esc_html__('Zoom Image Out Caption Twist', 'image-caption-hover-elementor'),
            'zoom-image-in-caption-twist' => esc_html__('Zoom Image In Caption Twist', 'image-caption-hover-elementor'),
            'flip-image-vertical' => esc_html__('Flip Image Vertical', 'image-caption-hover-elementor'),
            'flip-image-horizontal' => esc_html__('Flip Image Horizontal', 'image-caption-hover-elementor'),
            'flip-image-vertical-back' => esc_html__('Flip Image Vertical Back', 'image-caption-hover-elementor'),
            'flip-image-horizontal-back' => esc_html__('Flip Image Horizontal Back', 'image-caption-hover-elementor'),
            'page-turn-from-top' => esc_html__('Page Turn From Top', 'image-caption-hover-elementor'),
            'page-turn-from-bottom' => esc_html__('Page Turn From Bottom', 'image-caption-hover-elementor'),
            'page-turn-from-left' => esc_html__('Page Turn From Left', 'image-caption-hover-elementor'),
            'page-turn-from-right' => esc_html__('Page Turn From Right', 'image-caption-hover-elementor'),
            'no-effect' => esc_html__('No Effect', 'image-caption-hover-elementor'),
            'no-hover-still-caption' => esc_html__('No Hover Still Caption', 'image-caption-hover-elementor'),
            'visible-caption-blur-image' => esc_html__('Visible Caption Blur Image', 'image-caption-hover-elementor'),
            'visible-caption-grayscale-image' => esc_html__('Visible Caption Grayscale Image', 'image-caption-hover-elementor'),

            'scroll-image-bottom-caption' => esc_html__('Scroll Image Bottom Caption', 'image-caption-hover-elementor'),
            'scroll-image-top-caption' => esc_html__('Scroll Image Top Caption', 'image-caption-hover-elementor'),

            'black-dots-overlay' => esc_html__('Black Dots Overlay', 'image-caption-hover-elementor'),

            'static-caption-under-image' => esc_html__('Static Caption Under Image', 'image-caption-hover-elementor'),
            'static-caption-zoom' => esc_html__('Static Caption Zoom', 'image-caption-hover-elementor'),

            'break-pieces-vertical-left' => esc_html__('Break Pieces Vertical Left', 'image-caption-hover-elementor'),
            'break-pieces-vertical-right' => esc_html__('Break Pieces Vertical Right', 'image-caption-hover-elementor'),
            'break-pieces-vertical-fly-up' => esc_html__('Break Pieces Vertical Fly Up', 'image-caption-hover-elementor'),
            'break-pieces-vertical-fly-down' => esc_html__('Break Pieces Vertical Fly Down', 'image-caption-hover-elementor'),
            'break-pieces-vertical-ascend' => esc_html__('Break Pieces Vertical Ascend', 'image-caption-hover-elementor'),
            'break-pieces-vertical-descend' => esc_html__('Break Pieces Vertical Descend', 'image-caption-hover-elementor'),
            'break-pieces-vertical-zoom-in' => esc_html__('Break Pieces Vertical Zoom In', 'image-caption-hover-elementor'),
            'break-pieces-vertical-zoom-out' => esc_html__('Break Pieces Vertical Zoom Out', 'image-caption-hover-elementor'),
            'break-pieces-vertical-flush' => esc_html__('Break Pieces Vertical Flush', 'image-caption-hover-elementor'),
            'break-pieces-vertical-flush-opposite' => esc_html__('Break Pieces Vertical Flush Opposite', 'image-caption-hover-elementor'),
            'break-pieces-vertical-collapse' => esc_html__('Break Pieces Vertical Collapse', 'image-caption-hover-elementor'),
            'break-pieces-vertical-drop' => esc_html__('Break Pieces Vertical Drop', 'image-caption-hover-elementor'),

            'break-pieces-horizontal-up' => esc_html__('Break Pieces Horizontal Up', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-down' => esc_html__('Break Pieces Horizontal Down', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-fly-up' => esc_html__('Break Pieces Horizontal Fly Up', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-fly-down' => esc_html__('Break Pieces Horizontal Fly Down', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-ascend' => esc_html__('Break Pieces Horizontal Ascend', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-descend' => esc_html__('Break Pieces Horizontal Descend', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-zoom-in' => esc_html__('Break Pieces Horizontal Zoom In', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-zoom-out' => esc_html__('Break Pieces Horizontal Zoom Out', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-flush' => esc_html__('Break Pieces Horizontal Flush', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-flush-opposite' => esc_html__('Break Pieces Horizontal Flush Opposite', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-collapse' => esc_html__('Break Pieces Horizontal Collapse', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-drop' => esc_html__('Break Pieces Horizontal Drop', 'image-caption-hover-elementor'),
        );
    }


    protected function render() {
        $settings = $this->get_settings_for_display();

        $template_style = isset($settings['template_style']) ? $settings['template_style'] : 'caption-slide-up';
        $overlay_class = isset($settings['overlay']) ? $settings['overlay'] : 'full';

        if ( ! empty( $settings['link']['url'] ) ) {
            $this->add_link_attributes( 'link', $settings['link'] );
        }

        $image_id = isset($settings['image']['id']) ? $settings['image']['id'] : '';
        $size = isset($settings['image_size']) ? $settings['image_size'] : 'medium';
        if ($image_id) {
            $image_url = wp_get_attachment_image_url( $image_id, $size );
        }

        if (strpos($template_style, 'break-pieces') !== false) {
            include CAICHE_PATH.'/templates/break-pieces.php';
        } elseif ($template_style == 'static-caption-under-image') {
            include CAICHE_PATH.'/templates/static-caption-under-image.php';
        } elseif ($template_style == 'scroll-image-bottom-caption' || $template_style == 'scroll-image-top-caption') {
            include CAICHE_PATH.'/templates/scroll-image.php';
        } else {
            include CAICHE_PATH.'/templates/default.php';
        }
    }

    protected function content_template() {
        ?>
        <# 
        var imageUrl = ( settings.image && settings.image.url ) ? settings.image.url : '';
        var linkUrl = ( settings.link && settings.link.url ) ? settings.link.url : '';
        var templateStyle = settings.template_style || 'caption-slide-up';
        #>

        <div class="wcp-caption-plugin" ontouchstart="">
            <# if ( linkUrl ) { #>
                <a href="{{ linkUrl }}" class="caiche-image-link">
            <# } #>

            <# if ( templateStyle.indexOf('break-pieces') !== -1 ) { #>
                <div class="image-caption-box">
                    <div class="image-container image-container-disintegrate">
                        <div class="disintegrate-container {{ templateStyle }}">
                            <img src="{{ imageUrl }}" alt="">
                            <img src="{{ imageUrl }}" alt="" class="image-clip-1 wcp-caption-image">
                            <img src="{{ imageUrl }}" alt="" class="image-clip-2 wcp-caption-image">
                            <img src="{{ imageUrl }}" alt="" class="image-clip-3 wcp-caption-image">
                            <img src="{{ imageUrl }}" alt="" class="image-clip-4 wcp-caption-image">
                            <img src="{{ imageUrl }}" alt="" class="image-clip-5 wcp-caption-image">
                        </div>
                        <div class="image-overlay-container caption">
                            <div class="as-tble">
                                <div class="centered-text">
                                    {{{ settings.caption }}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <# } else if ( templateStyle == 'static-caption-under-image' ) { #>
                <div class="image-caption-box">
                    <div class="caption {{ templateStyle }} {{settings.overlay}}">
                        <div class="as-tble"></div>
                    </div>
                    <img class="wcp-caption-image" src="{{ imageUrl }}" alt="">
                </div>
                {{{ settings.caption }}}
            <# } else if ( templateStyle == 'scroll-image-bottom-caption' || templateStyle == 'scroll-image-top-caption' ) { #>
                <div class="image-caption-box ich-scroll-box {{ templateStyle }}">
                    <div class="caption {{settings.overlay}}">
                        <div class="as-tble">
                            {{{ settings.caption }}}
                        </div>
                    </div>
                </div>
            <# } else { #>
                <div class="image-caption-box">
                    <div class="caption {{ templateStyle }} {{settings.overlay}}">
                        <div class="as-tble">
                            {{{ settings.caption }}}
                        </div>
                    </div>
                    <img class="wcp-caption-image" src="{{ imageUrl }}" alt="">
                </div>
            <# } #>

            <# if ( linkUrl ) { #>
                </a>
            <# } #>
        </div>
        <?php
    }

}
