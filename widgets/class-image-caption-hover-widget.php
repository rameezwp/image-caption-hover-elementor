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
        return 'eicon-image';
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

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'image-caption-hover-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
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
                    '{{WRAPPER}} .wcp-caption-image' => 'width: {{SIZE}}{{UNIT}};',
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
            'caption-slide-up' => esc_html__('Caption slide Up', 'image-caption-hover-elementor'),
            'slide-left-to-right' => esc_html__('slide-left-to-right', 'image-caption-hover-elementor'),
            'slide-right-to-left' => esc_html__('slide-right-to-left', 'image-caption-hover-elementor'),
            'slide-top-to-bottom' => esc_html__('slide-top-to-bottom', 'image-caption-hover-elementor'),
            'slide-bottom-to-top' => esc_html__('slide-bottom-to-top', 'image-caption-hover-elementor'),
            'image-flip-up' => esc_html__('image-flip-up', 'image-caption-hover-elementor'),
            'image-flip-down' => esc_html__('image-flip-down', 'image-caption-hover-elementor'),
            'image-flip-right' => esc_html__('image-flip-right', 'image-caption-hover-elementor'),
            'image-flip-left' => esc_html__('image-flip-left', 'image-caption-hover-elementor'),
            'rotate-image-down' => esc_html__('rotate-image-down', 'image-caption-hover-elementor'),
            'image-turn-around' => esc_html__('image-turn-around', 'image-caption-hover-elementor'),
            'zoom-and-pan' => esc_html__('zoom-and-pan', 'image-caption-hover-elementor'),
            'tilt-image' => esc_html__('tilt-image', 'image-caption-hover-elementor'),
            'morph' => esc_html__('morph', 'image-caption-hover-elementor'),
            'move-image-right' => esc_html__('move-image-right', 'image-caption-hover-elementor'),
            'move-image-left' => esc_html__('move-image-left', 'image-caption-hover-elementor'),
            'move-image-top' => esc_html__('move-image-top', 'image-caption-hover-elementor'),
            'move-image-bottom' => esc_html__('move-image-bottom', 'image-caption-hover-elementor'),
            'image-squeez-right' => esc_html__('image-squeez-right', 'image-caption-hover-elementor'),
            'image-squeez-left' => esc_html__('image-squeez-left', 'image-caption-hover-elementor'),
            'image-squeez-top' => esc_html__('image-squeez-top', 'image-caption-hover-elementor'),
            'image-squeez-bottom' => esc_html__('image-squeez-bottom', 'image-caption-hover-elementor'),

            'fall-down-caption' => esc_html__('fall-down-caption', 'image-caption-hover-elementor'),
            'fall-down-image' => esc_html__('fall-down-image', 'image-caption-hover-elementor'),
            'swap-caption' => esc_html__('swap-caption', 'image-caption-hover-elementor'),
            'swap-image' => esc_html__('swap-image', 'image-caption-hover-elementor'),
            'puffin-caption' => esc_html__('puffin-caption', 'image-caption-hover-elementor'),
            'puffin-image' => esc_html__('puffin-image', 'image-caption-hover-elementor'),
            'puffout-caption' => esc_html__('puffout-caption', 'image-caption-hover-elementor'),
            'puffout-image' => esc_html__('puffout-image', 'image-caption-hover-elementor'),
            'opendoordown-caption' => esc_html__('opendoordown-caption', 'image-caption-hover-elementor'),
            'opendoordown-image' => esc_html__('opendoordown-image', 'image-caption-hover-elementor'),
            'opendoorup-caption' => esc_html__('opendoorup-caption', 'image-caption-hover-elementor'),
            'opendoorup-image' => esc_html__('opendoorup-image', 'image-caption-hover-elementor'),
            'opendoorright-caption' => esc_html__('opendoorright-caption', 'image-caption-hover-elementor'),
            'opendoorright-image' => esc_html__('opendoorright-image', 'image-caption-hover-elementor'),
            'opendoorleft-caption' => esc_html__('opendoorleft-caption', 'image-caption-hover-elementor'),
            'opendoorleft-image' => esc_html__('opendoorleft-image', 'image-caption-hover-elementor'),
            'rotatedown-caption' => esc_html__('rotatedown-caption', 'image-caption-hover-elementor'),
            'rotatedown-image' => esc_html__('rotatedown-image', 'image-caption-hover-elementor'),
            'rotateup-caption' => esc_html__('rotateup-caption', 'image-caption-hover-elementor'),
            'rotateup-image' => esc_html__('rotateup-image', 'image-caption-hover-elementor'),
            'rotateright-caption' => esc_html__('rotateright-caption', 'image-caption-hover-elementor'),
            'rotateright-image' => esc_html__('rotateright-image', 'image-caption-hover-elementor'),
            'rotateleft-caption' => esc_html__('rotateleft-caption', 'image-caption-hover-elementor'),
            'rotateleft-image' => esc_html__('rotateleft-image', 'image-caption-hover-elementor'),
            'spaceoutup-caption' => esc_html__('spaceoutup-caption', 'image-caption-hover-elementor'),
            'spaceoutup-image' => esc_html__('spaceoutup-image', 'image-caption-hover-elementor'),
            'spaceoutdown-caption' => esc_html__('spaceoutdown-caption', 'image-caption-hover-elementor'),
            'spaceoutdown-image' => esc_html__('spaceoutdown-image', 'image-caption-hover-elementor'),
            'spaceoutright-caption' => esc_html__('spaceoutright-caption', 'image-caption-hover-elementor'),
            'spaceoutright-image' => esc_html__('spaceoutright-image', 'image-caption-hover-elementor'),
            'spaceoutleft-caption' => esc_html__('spaceoutleft-caption', 'image-caption-hover-elementor'),
            'spaceoutleft-image' => esc_html__('spaceoutleft-image', 'image-caption-hover-elementor'),
            'foolish-caption' => esc_html__('foolish-caption', 'image-caption-hover-elementor'),
            'foolish-image' => esc_html__('foolish-image', 'image-caption-hover-elementor'),
            'tinright-caption' => esc_html__('tinright-caption', 'image-caption-hover-elementor'),
            'tinright-image' => esc_html__('tinright-image', 'image-caption-hover-elementor'),
            'tinleft-caption' => esc_html__('tinleft-caption', 'image-caption-hover-elementor'),
            'tinleft-image' => esc_html__('tinleft-image', 'image-caption-hover-elementor'),
            'tinup-caption' => esc_html__('tinup-caption', 'image-caption-hover-elementor'),
            'tinup-image' => esc_html__('tinup-image', 'image-caption-hover-elementor'),
            'tindown-caption' => esc_html__('tindown-caption', 'image-caption-hover-elementor'),
            'tindown-image' => esc_html__('tindown-image', 'image-caption-hover-elementor'),
            'simple-fade' => esc_html__('simple-fade', 'image-caption-hover-elementor'),

            'zoom-in' => esc_html__('zoom-in', 'image-caption-hover-elementor'),
            'zoom-out' => esc_html__('zoom-out', 'image-caption-hover-elementor'),
            'zoom-in-twist' => esc_html__('zoom-in-twist', 'image-caption-hover-elementor'),
            'zoom-out-twist' => esc_html__('zoom-out-twist', 'image-caption-hover-elementor'),
            'zoom-caption-in-image-out' => esc_html__('zoom-caption-in-image-out', 'image-caption-hover-elementor'),
            'zoom-caption-out-image-in' => esc_html__('zoom-caption-out-image-in', 'image-caption-hover-elementor'),
            'zoom-image-out-caption-twist' => esc_html__('zoom-image-out-caption-twist', 'image-caption-hover-elementor'),
            'zoom-image-in-caption-twist' => esc_html__('zoom-image-in-caption-twist', 'image-caption-hover-elementor'),

            'flip-image-vertical' => esc_html__('flip-image-vertical', 'image-caption-hover-elementor'),
            'flip-image-horizontal' => esc_html__('flip-image-horizontal', 'image-caption-hover-elementor'),
            'flip-image-vertical-back' => esc_html__('flip-image-vertical-back', 'image-caption-hover-elementor'),
            'flip-image-horizontal-back' => esc_html__('flip-image-horizontal-back', 'image-caption-hover-elementor'),

            'page-turn-from-top' => esc_html__('page-turn-from-top', 'image-caption-hover-elementor'),
            'page-turn-from-bottom' => esc_html__('page-turn-from-bottom', 'image-caption-hover-elementor'),
            'page-turn-from-left' => esc_html__('page-turn-from-left', 'image-caption-hover-elementor'),
            'page-turn-from-right' => esc_html__('page-turn-from-right', 'image-caption-hover-elementor'),

            'no-effect' => esc_html__('no-effect', 'image-caption-hover-elementor'),
            'no-hover-still-caption' => esc_html__('no-hover-still-caption', 'image-caption-hover-elementor'),
            'visible-caption-blur-image' => esc_html__('visible-caption-blur-image', 'image-caption-hover-elementor'),
            'visible-caption-grayscale-image' => esc_html__('visible-caption-grayscale-image', 'image-caption-hover-elementor'),

            'scroll-image-bottom-caption' => esc_html__('scroll-image-bottom-caption', 'image-caption-hover-elementor'),
            'scroll-image-top-caption' => esc_html__('scroll-image-top-caption', 'image-caption-hover-elementor'),

            'visible-image-title-caption-switch' => esc_html__('visible-image-title-caption-switch', 'image-caption-hover-elementor'),

            'black-dots-overlay' => esc_html__('black-dots-overlay', 'image-caption-hover-elementor'),

            'static-caption-under-image' => esc_html__('static-caption-under-image', 'image-caption-hover-elementor'),
            'static-caption-zoom' => esc_html__('static-caption-zoom', 'image-caption-hover-elementor'),

            'break-pieces-vertical-left' => esc_html__('break-pieces-vertical-left', 'image-caption-hover-elementor'),
            'break-pieces-vertical-right' => esc_html__('break-pieces-vertical-right', 'image-caption-hover-elementor'),
            'break-pieces-vertical-fly-up' => esc_html__('break-pieces-vertical-fly-up', 'image-caption-hover-elementor'),
            'break-pieces-vertical-fly-down' => esc_html__('break-pieces-vertical-fly-down', 'image-caption-hover-elementor'),
            'break-pieces-vertical-ascend' => esc_html__('break-pieces-vertical-ascend', 'image-caption-hover-elementor'),
            'break-pieces-vertical-descend' => esc_html__('break-pieces-vertical-descend', 'image-caption-hover-elementor'),
            'break-pieces-vertical-zoom-in' => esc_html__('break-pieces-vertical-zoom-in', 'image-caption-hover-elementor'),
            'break-pieces-vertical-zoom-out' => esc_html__('break-pieces-vertical-zoom-out', 'image-caption-hover-elementor'),
            'break-pieces-vertical-flush' => esc_html__('break-pieces-vertical-flush', 'image-caption-hover-elementor'),
            'break-pieces-vertical-flush-opposite' => esc_html__('break-pieces-vertical-flush-opposite', 'image-caption-hover-elementor'),
            'break-pieces-vertical-collapse' => esc_html__('break-pieces-vertical-collapse', 'image-caption-hover-elementor'),
            'break-pieces-vertical-drop' => esc_html__('break-pieces-vertical-drop', 'image-caption-hover-elementor'),

            'break-pieces-horizontal-up' => esc_html__('break-pieces-horizontal-up', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-down' => esc_html__('break-pieces-horizontal-down', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-fly-up' => esc_html__('break-pieces-horizontal-fly-up', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-fly-down' => esc_html__('break-pieces-horizontal-fly-down', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-ascend' => esc_html__('break-pieces-horizontal-ascend', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-descend' => esc_html__('break-pieces-horizontal-descend', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-zoom-in' => esc_html__('break-pieces-horizontal-zoom-in', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-zoom-out' => esc_html__('break-pieces-horizontal-zoom-out', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-flush' => esc_html__('break-pieces-horizontal-flush', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-flush-opposite' => esc_html__('break-pieces-horizontal-flush-opposite', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-collapse' => esc_html__('break-pieces-horizontal-collapse', 'image-caption-hover-elementor'),
            'break-pieces-horizontal-drop' => esc_html__('break-pieces-horizontal-drop', 'image-caption-hover-elementor'),
        );
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $template_style = isset($settings['template_style']) ? $settings['template_style'] : 'caption-slide-up';

        if ( ! empty( $settings['link']['url'] ) ) {
            $this->add_link_attributes( 'link', $settings['link'] );
        }

        $image_id = isset($settings['image']['id']) ? $settings['image']['id'] : '';
        $size = isset($settings['image_size']) ? $settings['image_size'] : 'medium';
        if ($image_id) {
            $image_url = wp_get_attachment_image_url( $image_id, $size );
        }

        if (strpos($template_style, 'square') !== false || strpos($template_style, 'circle') !== false) {    
            include CAICHE_PATH.'/templates/ihover.php';
        } elseif (strpos($template_style, 'break-pieces') !== false) {
            include CAICHE_PATH.'/templates/break-pieces.php';
        } elseif ($template_style == 'visible-image-title-caption-switch') {
            include CAICHE_PATH.'/templates/visible-image-title-caption-switch.php';
        } elseif ($template_style == 'static-caption-under-image') {
            include CAICHE_PATH.'/templates/static-caption-under-image.php';
        } elseif ($template_style == 'scroll-image-bottom-caption' || $template_style == 'scroll-image-top-caption') {
            include CAICHE_PATH.'/templates/scroll-image.php';
        } else {
            include CAICHE_PATH.'/templates/default.php';
        }
    }
}
