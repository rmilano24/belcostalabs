<?php 
/*Purpose Block*/
add_shortcode('insomnia_purpose', 'insomnia_purpose');
function insomnia_purpose( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_purpose_icon' => 'pe-7s-paper-plane',
			'insomnia_purpose_title' => 'Our Purpose',
			'insomnia_purpose_text' => 'Projecting surrounded literature yet delightful alteration but bed men. Open are from long why cold. If must snug by upon sang loud left. As me do preference it differed repeated property. Extremity now strangers breakfast.',
			"css" => null
		), $atts)
	);


	$output ='<div class="text-block-title color">'. esc_attr($insomnia_purpose_title) .'</div>
            <div class="text-block-text color">'. esc_attr($insomnia_purpose_text) .'</div>
            <div class="text-block-icon"><i class="'. esc_attr($insomnia_purpose_icon) .'"></i></div>';
	return $output;


};


/*Purpose Block*/
vc_map( array(
	"name" => __("Purpose Block",'insomnia'),
	"base" => "insomnia_purpose",
	"admin_enqueue_css" => array(get_template_directory_uri().'/framework/vc_extend/style.css'),
	"class" => "",
	"icon" => "insomnia_icon_dropcap",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_purpose_icon",
			"heading" => __("Text", 'insomnia'),
			"value" => 'pe-7s-paper-plane',
			"description" => __( 'Select icon from <a href="https://dankov-themes.com/icon/insomnia/index.html" target="_blank">here</a>.', 'insomnia' ),
		),

		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_purpose_title",
			"heading" => __("Text", 'insomnia'),
			"value" => 'Our Purpose',
		),

		array(
			"type" => "textarea",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_purpose_text",
			"heading" => __("Text", 'insomnia'),
			"value" => 'Projecting surrounded literature yet delightful alteration but bed men. Open are from long why cold. If must snug by upon sang loud left. As me do preference it differed repeated property. Extremity now strangers breakfast.',
		),
		
	)
) );


