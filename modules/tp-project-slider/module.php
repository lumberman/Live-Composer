<?php
/**
 * Project Slider module class
 */

/**
 * Class DSLC_TP_Project_Slider
 */
class DSLC_TP_Project_Slider extends DSLC_Module {

	var $module_id;
	var $module_title;
	var $module_icon;
	var $module_category;

	/**
	 * @inherited
	 */
	function __construct( $settings = [], $atts = [] ) {

		$this->module_ver = 2;
		$this->module_id = __CLASS__;
		$this->module_title = __( 'Project Images Slider', 'live-composer-page-builder' );
		$this->module_icon = 'picture';
		$this->module_category = 'single';

		parent::__construct( $settings, $atts );
	}

	/**
	 * @inherited
	 */
	function options() {

		$dslc_options = array(

			array(
				'label' => __( 'Show On', 'live-composer-page-builder' ),
				'id' => 'css_show_on',
				'std' => 'desktop tablet phone',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Desktop', 'live-composer-page-builder' ),
						'value' => 'desktop'
					),
					array(
						'label' => __( 'Tablet', 'live-composer-page-builder' ),
						'value' => 'tablet'
					),
					array(
						'label' => __( 'Phone', 'live-composer-page-builder' ),
						'value' => 'phone'
					),
				),
			),
			array(
				'label' => __( 'Animation', 'live-composer-page-builder' ),
				'id' => 'animation',
				'std' => 'fade',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Fade', 'live-composer-page-builder' ),
						'value' => 'fade'
					),
					array(
						'label' => __( 'Fade Up Slide', 'live-composer-page-builder' ),
						'value' => 'fadeUp'
					),
					array(
						'label' => __( 'Slide', 'live-composer-page-builder' ),
						'value' => 'false'
					),
					array(
						'label' => __( 'Back Slide', 'live-composer-page-builder' ),
						'value' => 'backSlide'
					),
					array(
						'label' => __( 'Go Down', 'live-composer-page-builder' ),
						'value' => 'goDown'
					),
				)
			),
			array(
				'label' => __( 'Animation Speed (ms)', 'live-composer-page-builder' ),
				'id' => 'animation_speed',
				'std' => '800',
				'type' => 'text',
			),
			array(
				'label' => __( 'Autoplay Speed (ms)', 'live-composer-page-builder' ),
				'id' => 'autoplay',
				'std' => '0',
				'type' => 'text',
			),
			array(
				'label' => __( 'Flexible Height', 'live-composer-page-builder' ),
				'id' => 'flexible_height',
				'std' => 'true',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'live-composer-page-builder' ),
						'value' => 'true'
					),
					array(
						'label' => __( 'Disabled', 'live-composer-page-builder' ),
						'value' => 'false'
					)
				)
			),
			array(
				'label' => __( 'Lightbox', 'live-composer-page-builder' ),
				'help' => __( 'Enabling will make clicking an image open up the image in a lightbox.', 'live-composer-page-builder' ),
				'id' => 'lightbox_state',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'live-composer-page-builder' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'live-composer-page-builder' ),
						'value' => 'disabled'
					),
				)
			),

			/**
			 * General Styling
			 */

			array(
				'label' => __( 'BG Color', 'live-composer-page-builder' ),
				'id' => 'css_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Color', 'live-composer-page-builder' ),
				'id' => 'css_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Width', 'live-composer-page-builder' ),
				'id' => 'css_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Borders', 'live-composer-page-builder' ),
				'id' => 'css_border_trbl',
				'std' => 'top right bottom left',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Top', 'live-composer-page-builder' ),
						'value' => 'top'
					),
					array(
						'label' => __( 'Right', 'live-composer-page-builder' ),
						'value' => 'right'
					),
					array(
						'label' => __( 'Bottom', 'live-composer-page-builder' ),
						'value' => 'bottom'
					),
					array(
						'label' => __( 'Left', 'live-composer-page-builder' ),
						'value' => 'left'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Radius - Top', 'live-composer-page-builder' ),
				'id' => 'css_border_radius_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
				'section' => 'styling',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Border Radius - Bottom', 'live-composer-page-builder' ),
				'id' => 'css_border_radius_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
				'section' => 'styling',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Margin Bottom', 'live-composer-page-builder' ),
				'id' => 'css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Minimum Height', 'live-composer-page-builder' ),
				'id' => 'css_min_height',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'min-height',
				'section' => 'styling',
				'ext' => 'px',
				'min' => 0,
				'max' => 1000,
				'increment' => 5
			),
			array(
				'label' => __( 'Padding Vertical', 'live-composer-page-builder' ),
				'id' => 'css_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Horizontal', 'live-composer-page-builder' ),
				'id' => 'css_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
			),

			/**
			 * Slider
			 */

			array(
				'label' => __( 'BG Color', 'live-composer-page-builder' ),
				'id' => 'css_slider_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => __( 'slider', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Border Color', 'live-composer-page-builder' ),
				'id' => 'css_slider_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'slider', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Border Width', 'live-composer-page-builder' ),
				'id' => 'css_slider_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'slider', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Borders', 'live-composer-page-builder' ),
				'id' => 'css_slider_border_trbl',
				'std' => 'top right bottom left',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Top', 'live-composer-page-builder' ),
						'value' => 'top'
					),
					array(
						'label' => __( 'Right', 'live-composer-page-builder' ),
						'value' => 'right'
					),
					array(
						'label' => __( 'Bottom', 'live-composer-page-builder' ),
						'value' => 'bottom'
					),
					array(
						'label' => __( 'Left', 'live-composer-page-builder' ),
						'value' => 'left'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => __( 'slider', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Border Radius - Top', 'live-composer-page-builder' ),
				'id' => 'css_slider_border_radius_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main',
				'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'slider', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Border Radius - Bottom', 'live-composer-page-builder' ),
				'id' => 'css_slider_border_radius_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main',
				'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'slider', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Padding Vertical', 'live-composer-page-builder' ),
				'id' => 'css_slider_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'slider', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Padding Horizontal', 'live-composer-page-builder' ),
				'id' => 'css_slider_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'slider', 'live-composer-page-builder' ),
			),

			/**
			 * Slides
			 */

			array(
				'label' => __( 'BG Color', 'live-composer-page-builder' ),
				'id' => 'css_slider_item_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main .dslc-slider-item',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => __( 'item', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Border Color', 'live-composer-page-builder' ),
				'id' => 'css_slider_item_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main .dslc-slider-item',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'item', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Border Width', 'live-composer-page-builder' ),
				'id' => 'css_slider_item_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main .dslc-slider-item',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'item', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Borders', 'live-composer-page-builder' ),
				'id' => 'css_slider_item_border_trbl',
				'std' => 'top right bottom left',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Top', 'live-composer-page-builder' ),
						'value' => 'top'
					),
					array(
						'label' => __( 'Right', 'live-composer-page-builder' ),
						'value' => 'right'
					),
					array(
						'label' => __( 'Bottom', 'live-composer-page-builder' ),
						'value' => 'bottom'
					),
					array(
						'label' => __( 'Left', 'live-composer-page-builder' ),
						'value' => 'left'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main .dslc-slider-item',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => __( 'item', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Border Radius - Top', 'live-composer-page-builder' ),
				'id' => 'css_slider_item_border_radius_top',
				'std' => '5',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main .dslc-slider-item,.dslc-tp-project-slider-main .dslc-slider-item img',
				'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'item', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Border Radius - Bottom', 'live-composer-page-builder' ),
				'id' => 'css_slider_item_border_radius_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main .dslc-slider-item,.dslc-tp-project-slider-main .dslc-slider-item img',
				'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'item', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Padding Vertical', 'live-composer-page-builder' ),
				'id' => 'css_slider_item_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main .dslc-slider-item',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'item', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Padding Horizontal', 'live-composer-page-builder' ),
				'id' => 'css_slider_item_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main .dslc-slider-item',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'item', 'live-composer-page-builder' ),
			),

			/**
			 * Navigation
			 */

			array(
				'label' => __( 'Border Radius', 'live-composer-page-builder' ),
				'id' => 'css_circles_bradius',
				'std' => '50',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-pagination .owl-page span',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Navigation', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Color', 'live-composer-page-builder' ),
				'id' => 'css_circles_color',
				'std' => '#b9b9b9',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-pagination .owl-page span',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => __( 'Navigation', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Color - Active', 'live-composer-page-builder' ),
				'id' => 'css_circles_color_active',
				'std' => '#5890e5',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-pagination .owl-page.active span',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => __( 'Navigation', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Margin Vertical', 'live-composer-page-builder' ),
				'id' => 'css_circles_margin_top',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-controls',
				'affect_on_change_rule' => 'margin',
				'section' => 'styling',
				'tab' => __( 'Navigation', 'live-composer-page-builder' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Size', 'live-composer-page-builder' ),
				'id' => 'css_circles_size',
				'std' => '7',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-pagination .owl-page span',
				'affect_on_change_rule' => 'width,height',
				'section' => 'styling',
				'tab' => __( 'Navigation', 'live-composer-page-builder' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Spacing', 'live-composer-page-builder' ),
				'id' => 'css_circles_spacing',
				'std' => '3',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-pagination .owl-page',
				'affect_on_change_rule' => 'margin-left,margin-right',
				'section' => 'styling',
				'tab' => __( 'Navigation', 'live-composer-page-builder' ),
				'ext' => 'px'
			),

			/**
			 * Responsive Tablet
			 */

			array(
				'label' => __( 'Responsive Styling', 'live-composer-page-builder' ),
				'id' => 'css_res_t',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Disabled', 'live-composer-page-builder' ),
						'value' => 'disabled'
					),
					array(
						'label' => __( 'Enabled', 'live-composer-page-builder' ),
						'value' => 'enabled'
					),
				),
				'section' => 'responsive',
				'tab' => __( 'tablet', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Margin Bottom', 'live-composer-page-builder' ),
				'id' => 'css_res_t_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'live-composer-page-builder' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'live-composer-page-builder' ),
				'id' => 'css_res_t_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'live-composer-page-builder' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Horizontal', 'live-composer-page-builder' ),
				'id' => 'css_res_t_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'live-composer-page-builder' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Slider - Padding Vertical', 'live-composer-page-builder' ),
				'id' => 'css_res_t_slider_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Slider - Padding Horizontal', 'live-composer-page-builder' ),
				'id' => 'css_res_t_slider_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Slider Item - Padding Vertical', 'live-composer-page-builder' ),
				'id' => 'css_res_t_slider_item_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main .dslc-slider-item',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Slider Item - Padding Horizontal', 'live-composer-page-builder' ),
				'id' => 'css_res_t_slider_item_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main .dslc-slider-item',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Nav - Margin Vertical', 'live-composer-page-builder' ),
				'id' => 'css_res_t_circles_margin_top',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-controls',
				'affect_on_change_rule' => 'margin',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'live-composer-page-builder' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Nav - Size', 'live-composer-page-builder' ),
				'id' => 'css_res_t_circles_size',
				'std' => '7',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-pagination .owl-page span',
				'affect_on_change_rule' => 'width,height',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'live-composer-page-builder' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Nav - Spacing', 'live-composer-page-builder' ),
				'id' => 'css_res_t_circles_spacing',
				'std' => '3',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-pagination .owl-page',
				'affect_on_change_rule' => 'margin-left,margin-right',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'live-composer-page-builder' ),
				'ext' => 'px'
			),

			/**
			 * Responsive phone
			 */

			array(
				'label' => __( 'Responsive Styling', 'live-composer-page-builder' ),
				'id' => 'css_res_p',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Disabled', 'live-composer-page-builder' ),
						'value' => 'disabled'
					),
					array(
						'label' => __( 'Enabled', 'live-composer-page-builder' ),
						'value' => 'enabled'
					),
				),
				'section' => 'responsive',
				'tab' => __( 'phone', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Margin Bottom', 'live-composer-page-builder' ),
				'id' => 'css_res_p_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'phone', 'live-composer-page-builder' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'live-composer-page-builder' ),
				'id' => 'css_res_p_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => __( 'phone', 'live-composer-page-builder' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Horizontal', 'live-composer-page-builder' ),
				'id' => 'css_res_p_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => __( 'phone', 'live-composer-page-builder' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Slider - Padding Vertical', 'live-composer-page-builder' ),
				'id' => 'css_res_p_slider_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Slider - Padding Horizontal', 'live-composer-page-builder' ),
				'id' => 'css_res_p_slider_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Slider Item - Padding Vertical', 'live-composer-page-builder' ),
				'id' => 'css_res_p_slider_item_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main .dslc-slider-item',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Slider Item - Padding Horizontal', 'live-composer-page-builder' ),
				'id' => 'css_res_p_slider_item_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-tp-project-slider-main .dslc-slider-item',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'live-composer-page-builder' ),
			),
			array(
				'label' => __( 'Nav - Margin Vertical', 'live-composer-page-builder' ),
				'id' => 'css_res_p_circles_margin_top',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-controls',
				'affect_on_change_rule' => 'margin',
				'section' => 'responsive',
				'tab' => __( 'phone', 'live-composer-page-builder' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Nav - Size', 'live-composer-page-builder' ),
				'id' => 'css_res_p_circles_size',
				'std' => '7',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-pagination .owl-page span',
				'affect_on_change_rule' => 'width,height',
				'section' => 'responsive',
				'tab' => __( 'phone', 'live-composer-page-builder' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Nav - Spacing', 'live-composer-page-builder' ),
				'id' => 'css_res_p_circles_spacing',
				'std' => '3',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-pagination .owl-page',
				'affect_on_change_rule' => 'margin-left,margin-right',
				'section' => 'responsive',
				'tab' => __( 'phone', 'live-composer-page-builder' ),
				'ext' => 'px'
			),


		);

		$dslc_options = array_merge( $dslc_options, $this->shared_options( 'animation_options', array( 'hover_opts' => false ) ) );
		$dslc_options = array_merge( $dslc_options, $this->presets_options() );

		return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

	}

	/**
	 * @inherited
	 */
	function afterRegister()
	{
		add_action( 'wp_enqueue_scripts', function(){

			global $LC_Registry;

			$path = explode( '/', __DIR__ );
			$path = array_pop( $path );

			if ( $LC_Registry->get( 'dslc_active' ) == true ) {

				wp_enqueue_script( 'js-project-slider-extender', DS_LIVE_COMPOSER_URL . '/modules/' . $path . '/editor-script.js', array( 'jquery' ) );
			}

			wp_enqueue_script( 'js-project-slider-production', DS_LIVE_COMPOSER_URL . '/modules/' . $path . '/script.js', array( 'jquery' ) );
		});
	}

	/**
	 * Returns Slider HTML.
	 */
	function get_sliders() {

		ob_start();

		if ( get_post_type() == 'dslc_projects' ) {

			$options = $this->getPropsValues();

			$img_class = '';
			if ( $options['lightbox_state'] == 'enabled' ) {
				$img_class = 'dslc-trigger-lightbox-gallery';
			}

			$project_images = get_post_meta( get_the_ID(), 'dslc_project_images', true );

			if ( $project_images != null ) {
				$project_images = explode( ' ', trim( $project_images ) );

				foreach ( $project_images as $project_image ) {

					$project_image_src = wp_get_attachment_image_src( $project_image, 'full' );
					$project_image_src = $project_image_src[0];

					$thumb_alt = get_post_meta( $project_image, '_wp_attachment_image_alt', true );
					if ( ! $thumb_alt ) $thumb_alt = '';

					?><div class="dslc-slider-item"><img class="<?php echo $img_class; ?>" src="<?php echo $project_image_src; ?>" alt="<?php echo $thumb_alt; ?>" /></div><?php
				}
			}
		}

		return ob_get_clean();
	}

	/**
	 * Returns Gallery lightbox.
	 */
	function get_gallery_lightbox() {

		ob_start();

		if ( get_post_type() == 'dslc_projects' ) {

			$project_images = get_post_meta( get_the_ID(), 'dslc_project_images', true );

			if ( $project_images != null ) {

				$project_images = explode( ' ', trim( $project_images ) );

				foreach ( $project_images as $project_image ) {

					$project_image_src = wp_get_attachment_image_src( $project_image, 'full' );
					$project_image_src = $project_image_src[0];

					?><a href="<?php echo $project_image_src; ?>"></a><?php
				}
			}
		}

		return ob_get_clean();
	}

	/**
	 * @inherited
	 */
	function output( $options = [] ) {

		$this->module_start();

		/* Module output stars here */
		echo $this->renderModule();
		/* Module output ends here */

		$this->module_end();
	}

}

/// Register module
( new DSLC_TP_Project_Slider )->register();