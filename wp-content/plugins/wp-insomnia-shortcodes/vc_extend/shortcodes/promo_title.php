<?php 
/*Promo Title*/
add_shortcode('insomnia_promo', 'insomnia_promo_f');
function insomnia_promo_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_promo_text' => 'Our Portfolio',
			'insomnia_promo_paragraph' => 'Attended no do thoughts me on dissuade scarcely',
			'white' => null,
			"css" => null
		), $atts)
	);
	
	if ($white) $white = 'white';

	$output ='<div class="promo-block '. esc_attr($white) .'">
                	<div class="promo-text">'. esc_attr($insomnia_promo_text) .'</div>
                	<div class="promo-paragraph">'. esc_attr($insomnia_promo_paragraph) .'</div>
                	<div class="center-line"></div>
              </div>';
	return $output;


};


/*Promo Title*/
vc_map( array(
	"name" => __("Promo Title",'insomnia'),
	"base" => "insomnia_promo",
	"admin_enqueue_css" => array(get_template_directory_uri().'/framework/vc_extend/style.css'),
	"class" => "",
	"icon" => "insomnia_icon_dropcap",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_promo_text",
			"heading" => __("Text", 'insomnia'),
			"value" => 'Our Portfolio',
		),
		array(
			"type" => "textarea",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_promo_paragraph",
			"heading" => __("Paragraph", 'insomnia'),
			"value" => 'Attended no do thoughts me on dissuade scarcely',
		),

                    array(
                        "type" => "checkbox",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("White fonts", 'insomnia'),
                        "param_name" => "white",
                                                      "group" => __("Settings", 'insomnia'),

                        "value" => array("Yes" => true),
                    ),	
	)
) );




