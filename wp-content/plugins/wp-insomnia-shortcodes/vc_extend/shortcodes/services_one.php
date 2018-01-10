<?php 
/*Services*/
add_shortcode('insomnia_services', 'insomnia_services_f');
function insomnia_services_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_icons' => 'pe-7s-light',
			'insomnia_name' => 'Minimal Design',
			'insomnia_text' => 'Remainder household zealously the own unwilling roused escalate beautiful',
			'biggest' => null,
			'wow' => null,
			'wow_delay' => '0.1',
			'wow_animate' => 'fadeIn',
			"css" => null
		), $atts)
	);

	if ($wow) $wow = 'wow';
	if ($biggest) $biggest = 'biggest';

	$output ='
			<div class="'. esc_attr($wow) .' '. esc_attr($wow_animate) .'" data-wow-delay="'. esc_attr($wow_delay) .'s">
				<div class="hi-icon-effect '. esc_attr($biggest) .'">
	              	<div class="hi-icon '. esc_attr($insomnia_icons) .'"></div>
	              	<div class="service-name">'. esc_attr($insomnia_name) .'</div>
	              	<div class="service-text">'. esc_attr($insomnia_text) .'</div>
	            </div>
            </div>';
	return $output;
};

vc_map( array(
	"name" => __("Services Style #1",'insomnia'),
	"base" => "insomnia_services",
	"admin_enqueue_css" => array(get_template_directory_uri().'/framework/vc_extend/style.css'),
	"class" => "",    
	'icon' => 'icon-wpb-row',
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_icons",
			"heading" => __("Icon", 'insomnia'),
			"value" => 'pe-7s-light',
			'description' => __( 'Select icon from <a href="https://dankov-themes.com/icon/insomnia/index.html" target="_blank">here</a>.', 'insomnia' ),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_name",
			"heading" => __("Name", 'insomnia'),
			"value" => 'Minimal Design',
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_text",
			"heading" => __("Text", 'insomnia'),
			"value" => 'Remainder household zealously the own unwilling roused escalate beautiful',
		),
		array(
			"type" => "checkbox",
			"holder" => "div",
			"class" => "",
			"heading" => __("Biggest Icon", 'insomnia'),
			"param_name" => "biggest",
			"value" => array("Yes" => true),
            "group" => __("Settings", 'insomnia'),
		),
		array(
			"type" => "checkbox",
			"holder" => "div",
			"class" => "",
			"heading" => __("Animate", 'insomnia'),
			"param_name" => "wow",
			"value" => array("Yes" => true),
            "group" => __("Settings", 'insomnia'),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Delay", 'insomnia'),
			"param_name" => "wow_delay",
			"value" => '100',
			"description" => 'in s',
            "group" => __("Settings", 'insomnia'),
    		"dependency" => array(
        		"element" => "wow",
        		"value" => "1"
    		),
		),
	    array(
	        'type' => 'dropdown',
	        'heading' => __( 'Animate', 'insomnia' ),
	        'param_name' => 'wow_animate',
	        'value' => array(
	            __( 'fadeIn', 'insomnia' ) => 'fadeIn',
	            __( 'slideInUp', 'insomnia' ) => 'slideInUp',
	        ),
			'std' => 'fadeIn',
            "group" => __("Settings", 'insomnia'),
    		"dependency" => array(
        		"element" => "wow",
        		"value" => "1"
    		),
	    ),
	)
) 
);