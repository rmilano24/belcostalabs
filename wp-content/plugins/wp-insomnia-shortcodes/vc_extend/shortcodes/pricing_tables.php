<?php 
/*Pricing Tables*/
add_shortcode('insomnia_pricing_tables', 'insomnia_pricing_tables_f');
function insomnia_pricing_tables_f( $atts, $content = null)
{

	extract(shortcode_atts(
		array(
			'insomnia_pricing_tables_name' => 'Free',
			'insomnia_pricing_tables_price' => '7',
			'insomnia_pricing_tables_currency' => '$',
			'insomnia_pricing_tables_date' => 'day',
			'insomnia_pricing_tables_desc1' => '24/7 Tech Support',
			'insomnia_pricing_tables_desc2' => '80 GB Storage',
			'insomnia_pricing_tables_desc3' => '1 GB Bandwidth',
			'insomnia_pricing_tables_desc4' => '100 GB Storage',
			'insomnia_pricing_tables_button_a' => 'http://google.com/',
			'insomnia_pricing_tables_button' => 'Get Started',
			'best' => null,
			"css" => null
		), $atts)
	);
	
	if ($best) $best = 'best';

	$output ='<div class="pricing_tables_wrap '. esc_attr($best) .'">
                	<div class="pricing_tables_name">'. esc_attr($insomnia_pricing_tables_name) .'</div>
                	<div class="pricing_tables_price"><span>'. esc_attr($insomnia_pricing_tables_currency) .'</span>'. esc_attr($insomnia_pricing_tables_price) .'<i>/ '. esc_attr($insomnia_pricing_tables_date) .'</i></div>
                	<div class="pricing_tables_desc">
                		<ul>
                			<li>'. esc_attr($insomnia_pricing_tables_desc1) .'</li>
                			<li>'. esc_attr($insomnia_pricing_tables_desc2) .'</li>
                			<li>'. esc_attr($insomnia_pricing_tables_desc3) .'</li>
                			<li>'. esc_attr($insomnia_pricing_tables_desc4) .'</li>
                		</ul>
                	</div>
                	<div class="pricing_tables_buttons"><a href="'. esc_url($insomnia_pricing_tables_button_a) .'">'. esc_attr($insomnia_pricing_tables_button) .'</a></div>
              </div>';
	return $output;


};

/*Pricing Tables*/
vc_map( array(
	"name" => __("Pricing Tables",'insomnia'),
	"base" => "insomnia_pricing_tables",
	"admin_enqueue_css" => array(get_template_directory_uri().'/framework/vc_extend/style.css'),
	"class" => "",
	"icon" => "insomnia_icon_dropcap",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_pricing_tables_name",
			"heading" => __("Name", 'insomnia'),
			"value" => 'Free',
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_pricing_tables_price",
			"heading" => __("Price", 'insomnia'),
			"value" => '7',
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_pricing_tables_currency",
			"heading" => __("Сurrency", 'insomnia'),
			"value" => '$',
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_pricing_tables_date",
			"heading" => __("Time", 'insomnia'),
			"value" => 'Day',
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_pricing_tables_desc1",
			"heading" => __("Value 1", 'insomnia'),
			"value" => '24/7 Tech Support',
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_pricing_tables_desc2",
			"heading" => __("Value 2", 'insomnia'),
			"value" => '80 GB Storage',
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_pricing_tables_desc3",
			"heading" => __("Value 3", 'insomnia'),
			"value" => '1 GB Bandwidth',
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_pricing_tables_desc4",
			"heading" => __("Value 4", 'insomnia'),
			"value" => '100 GB Storage',
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_pricing_tables_button_a",
			"heading" => __("Button Link", 'insomnia'),
			"value" => 'http://google.com/',
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "insomnia_pricing_tables_button",
			"heading" => __("Button", 'insomnia'),
			"value" => 'Get Started',
		),
        array(
			"type" => "checkbox",
			"holder" => "div",
			"class" => "",
			"heading" => __("Best Options", 'insomnia'),
			"param_name" => "best",
			"value" => array("Yes" => true),
		),	
	)
) );




