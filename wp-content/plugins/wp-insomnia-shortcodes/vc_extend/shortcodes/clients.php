<?php
add_shortcode('vc_clients_item', 'vc_clients_item_f');
function vc_clients_item_f( $atts, $content = null)
{
	extract(shortcode_atts(
		array(
			'logo' => '',
			'opacity' => null,
		), $atts)
	);

	if ($opacity) $opacity = 'opacity';

	$image_done = wp_get_attachment_image($logo, 'img-responsive logos ' . $opacity. '');


	$output =''.$image_done.'';
	return $output;
};

vc_map( array(
	"name" => __("Clients Logo",'insomnia'),
	"base" => "vc_clients_item",
	"admin_enqueue_css" => array(get_template_directory_uri().'/framework/vc_extend/style.css'),
	"class" => "",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "attach_image",
			"class" => "",
			"param_name" => "logo",
			"heading" => __("Clients", 'insomnia'),
			"value" => '',
			"description" => __( "Select logo", 'insomnia' )
		),
        array(
            "type" => "checkbox",
            "holder" => "div",
            "class" => "",
            "heading" => __("Opacity", 'insomnia'),
            "param_name" => "opacity",
            "group" => __("Settings", 'insomnia'),
            "value" => array("Yes" => true),
            ),
        )
	) 
);