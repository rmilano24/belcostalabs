<?php 
/*Services*/
add_shortcode('insomnia_services_three', 'insomnia_services_three_f');
function insomnia_services_three_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_icons' => 'pe-7s-plugin',
			'insomnia_name' => 'Visual Composer',
			'insomnia_text' => 'Remainder household direction zealously the unwilling. Roused enabl estate old county females',
      		'insomnia_icons_color' => '#5AC8FB',
      		'padding' => null,
      		'font' => null,
			"css" => null
		), $atts)
	);



 
  if ($padding) $padding = 'no-padding';
  if ($font) $font = 'white';





	$output ='
			<div class="services-main '. esc_attr($padding) .' '. esc_attr($font) .'">
              <div class="other-serv">
                <div class="serv-icon"><i class="'. esc_attr($insomnia_icons) .'" style="color:'.$insomnia_icons_color.'"></i></div>
                <div class="serv-block-list"><h2 class="serv-name">'. esc_attr($insomnia_name) .'</h2><p class="serv-desc">'. esc_attr($insomnia_text) .'</p></div>
              </div>
            </div>';
	return $output;


};

/*Services*/
vc_map( array(
	"name" => __("Services Style #3",'insomnia'),
	"base" => "insomnia_services_three",
	"admin_enqueue_css" => array(get_template_directory_uri().'/framework/vc_extend/style.css'),
	"class" => "",
	"icon" => "insomnia_icon_dropcap",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_icons",
			"heading" => __("Icon", 'insomnia'),
			"value" => 'pe-7s-plugin',
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
			"value" => 'Remainder household direction zealously the unwilling. Roused enabl estate old county females',
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_icons_color",
			"heading" => __("Icon Color", 'insomnia'),
			"value" => '#5AC8FB',
			"group" => "Settings"
		),
	    array(
	      "type" => "checkbox",
	      "holder" => "div",
	      "class" => "",
	      "heading" => __("White Font", 'insomnia'),
	      "param_name" => "font",
	      "value" => array("Yes" => true),
	      "group" => __("Settings", 'insomnia'),
	    ), 
	    array(
	      "type" => "checkbox",
	      "holder" => "div",
	      "class" => "",
	      "heading" => __("No padding", 'insomnia'),
	      "param_name" => "padding",
	      "value" => array("Yes" => true),
	      "group" => __("Settings", 'insomnia'),
	    ), 
	)
) );


