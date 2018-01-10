<?php 
/*Promo Small Title*/
add_shortcode('insomnia_promo_small', 'insomnia_promo_small_f');
function insomnia_promo_small_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_promo_small_text' => 'About Us',
			'biggest' => null,
			"css" => null
		), $atts)
	);

	if ($biggest) $biggest = 'biggest';

	$output ='<div class="about-us-title '. esc_attr($biggest) .'">'. esc_attr($insomnia_promo_small_text) .'</div>';
	return $output;


};


/*Promo Small Title*/
vc_map( array(
	"name" => __("Promo Small Title",'insomnia'),
	"base" => "insomnia_promo_small",
	"admin_enqueue_css" => array(get_template_directory_uri().'/framework/vc_extend/style.css'),
	"class" => "",
	"icon" => "insomnia_icon_dropcap",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_promo_small_text",
			"heading" => __("Text", 'insomnia'),
			"value" => 'About Us',
		),			
        array(
        	"type" => "checkbox",
        	"holder" => "div",
        	"class" => "",
        	"heading" => __("Biggest", 'insomnia'),
        	"param_name" => "biggest",
			"group" => __("Settings", 'insomnia'),
			"value" => array("Yes" => true),
        )
	)
) );


			



