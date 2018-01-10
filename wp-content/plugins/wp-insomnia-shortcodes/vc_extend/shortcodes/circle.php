<?php 
/*Services*/
add_shortcode('insomnia_circle', 'insomnia_circle_f');
function insomnia_circle_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_title' => 'Marketing',
			'insomnia_think' => '5',
			'insomnia_value' => '0.85',
			"css" => null,
		), $atts)
	);


	$output ='<div class="progress-circle">
				<div data-thickness="'. esc_attr($insomnia_think) .'" data-value="'. esc_attr($insomnia_value) .'" class="circle"><span></span></div>
              	<div class="agenda">'. esc_attr($insomnia_title) .'</div>
            </div>';
	return $output;

};

/*Circle*/
vc_map( array(
	"name" => __("Animated Circle",'insomnia'),
	"base" => "insomnia_circle",
	"admin_enqueue_css" => array(get_template_directory_uri().'/framework/vc_extend/style.css'),
	"class" => "",
	"icon" => "insomnia_icon_dropcap",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_title",
			"heading" => __("Icon", 'insomnia'),
			"value" => 'Marketing',
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_think",
			"heading" => __("Level of thinkness", 'insomnia'),
			"value" => '5',
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_value",
			"heading" => __("Value", 'insomnia'),
			"value" => '0.85',
			"description" => __( 'From 0.1 to 1', 'insomnia' ),
		),
	)
) );



























