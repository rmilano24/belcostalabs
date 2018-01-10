<?php 
/*Contacts Us*/
add_shortcode('insomnia_contacts_us', 'insomnia_contacts_us_f');
function insomnia_contacts_us_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_contacts_us_icon' => 'pe-7s-headphones',
			'insomnia_contacts_us_name' => 'Call us',
			'insomnia_contacts_us_text' => '+ 3 (044) 645 23 54',
			"css" => null
		), $atts)
	);


				$output ='<div class="contact-info">
                                    <div class="contact-icon"><i class="'. esc_attr($insomnia_contacts_us_icon) .'"></i></div>
                                    <div class="contact-bg">
                                        <div class="contact-name">'. esc_attr($insomnia_contacts_us_name) .'</div>
                                        <div class="contact-tel">'. esc_attr($insomnia_contacts_us_text) .'</div>
                                    </div>
                                </div>';
              return $output;


              





};


/*Contacts Us*/
vc_map( array(
	"name" => __("Contacts Us",'insomnia'),
	"base" => "insomnia_contacts_us",
	"admin_enqueue_css" => array(get_template_directory_uri().'/framework/vc_extend/style.css'),
	"class" => "",
	"icon" => "insomnia_icon_dropcap",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_contacts_us_icon",
			"heading" => __("Icon", 'insomnia'),
			"value" => 'pe-7s-headphones',
			'description' => __( 'Select icon from <a href="https://dankov-themes.com/icon/insomnia/index.html" target="_blank">here</a>.', 'insomnia' ),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_contacts_us_name",
			"heading" => __("Name", 'insomnia'),
			"value" => 'Call us',
		),
		array(
			"type" => "textarea",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_contacts_us_text",
			"heading" => __("Text", 'insomnia'),
			"value" => '+ 3 (044) 645 23 54',
		),

	)
) );

