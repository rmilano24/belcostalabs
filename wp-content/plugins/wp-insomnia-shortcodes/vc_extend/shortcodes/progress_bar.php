<?php
/*Progress bar*/
add_shortcode('insomnia_progress', 'insomnia_progress_f');
function insomnia_progress_f( $atts, $content = null)
{
	extract(shortcode_atts(
		array(
			'progress_title' => "Marketing",
         'progress_per' => '69',
         'biggest' => '69',
		), $atts)
	);


   if ($biggest) $biggest = 'biggest';

	$output ='<div class="progress-per"><div class="prog-name">'.$progress_title.'</div><div class="prog-per">'.$progress_per.'%</div></div>
	<div class="progress '. esc_attr($biggest) .'"><div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$progress_per.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$progress_per.'%"></div></div>';
	return $output;
};

vc_map( array(
   "name" => __("Progress Bar",'insomnia'),
   "base" => "insomnia_progress",
   "class" => "",
   "icon" => "icon-wpb-team_member",
   "admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/style.css'),
   "category" => __('Insomnia','insomnia'),
   "params" => array(
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Progress Title",'insomnia'),
         "param_name" => "progress_title",
         "value" => "Marketing",
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Progress Value",'insomnia'),
         "param_name" => "progress_per",
         "value" => "69",
      ),

 
                    array(
                        "type" => "checkbox",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Biggest gap", 'insomnia'),
                        "param_name" => "biggest",
                        "group" => __("Settings", 'insomnia'),
                        "value" => array("Yes" => true),
                    ),  
   )
) );





