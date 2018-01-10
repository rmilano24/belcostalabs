<?php
/*TESTIMONIAL  ITEM*/
add_shortcode('vc_testimonial_item', 'vc_testimonial_item_f');
function vc_testimonial_item_f( $atts, $content = null)
{
	extract(shortcode_atts(
		array(
			'id' => '',
			'box' => null,
			'white' => null,
		), $atts)
	);
	if ($white) $white = 'white';
	if ($box) $box = 'box';

	$post = get_post($id);
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'wall-portfolio-squre'); 
	$title = $post->post_title;
	$content = $post->post_content;
	$output ='<div class="insomnia_testimonial_holder '. esc_attr($box) .'">';
		$output .='<span class="insomnia_testimonial_content_holder '. esc_attr($white) .'"><div class="insomnia_tesimonial_content">'.$content.'</div></span>';
		$output .='<div class="clearfix"></div>';
		$output .='<div class="insomnia_testimonial_author_holder"><div class="insomnia_tesimonial_title">'.$title.'</div></div>';
		if ($image[0]!=false)   { $output .='<div class="insomnia_testimonial_image_holder"><div class="insomnia_tesimonial_image"><img src="'.$image[0].'" alt=""></div></div>';};
	$output .='</div>';

	return $output;
};





vc_map( array(
	"name" => __("Testimonial Item",'insomnia'),
	"base" => "vc_testimonial_item",
	"admin_enqueue_css" => array(get_template_directory_uri().'/framework/vc_extend/style.css'),
	"class" => "",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"param_name" => "id",
			"heading" => __("Testimonial Item", 'insomnia'),
			"value" => '',
			"description" => __( "Tesimonial ID", 'insomnia' )
		),
                    array(
                        "type" => "checkbox",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Box Style", 'insomnia'),
                        "param_name" => "box",
                        "group" => __("Settings", 'insomnia'),

                        "value" => array("Yes" => true),
                    ),
                    array(
                        "type" => "checkbox",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("White font", 'insomnia'),
                        "param_name" => "white",
                        "group" => __("Settings", 'insomnia'),

                        "value" => array("Yes" => true),
                    ),
		
	)
) );
