<?php	 		 	

/**
 * Add function to widgets_init that'll load our widget.
 */
add_action('widgets_init', 'insomnia_load_twitter_widgets');

function insomnia_load_twitter_widgets()
{
	register_widget('Insomnia_Twitter_Widget');
}


/**
 * Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update. 
 *
 */
	class Insomnia_Twitter_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */		
	function Insomnia_Twitter_Widget() {
		
		/* Widget settings. */
		$widget_ops = array('classname' => 'insomnia_twitter_widget', 'description' => __( 'Imports latest tweets.', 'dankov' ) );

		/* Widget control settings. */
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'insomnia_twitter_widget' );

		/* Create the widget. */		
		$this->__construct( 'insomnia_twitter_widget', 'Insomnia: Twitter ', $widget_ops);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );

	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	$number_of_posts_to_show = $instance['number_of_posts_to_show'];
	$insomnia_consumer_key = $instance['insomnia_consumer_key'];
	$insomnia_consumer_secret = $instance['insomnia_consumer_secret'];
	$insomnia_user_token = $instance['insomnia_user_token'];
	$insomnia_user_secret = $instance['insomnia_user_secret'];
	$insomnia_account = $instance['insomnia_account'];
	$insomnia_account_count = $instance['insomnia_account_count'];
	
	
	// Before widget (defined by theme functions file)
	echo $before_widget;
	// Display the widget title if one was input
	if ( $title )
		echo $before_title . $title . $after_title;

										if(!require_once('twitteroauth.php')){ 
										echo '<strong>Couldn\'t find twitteroauth.php!</strong>';
										return;
									   }
									   function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
										 $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
										 return $connection;
									   }
									   $connection = getConnectionWithAccessToken($insomnia_consumer_key, $insomnia_consumer_secret, $insomnia_user_token, $insomnia_user_secret);
									   $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$insomnia_account."&count=".$insomnia_account_count."");
									   if(!empty($tweets->errors)){
										if($tweets->errors[0]->message == 'Invalid or expired token'){
										 echo '<strong>'.$tweets->errors[0]->message.'!</strong><br />You\'ll need to regenerate it <a href="https://dev.twitter.com/apps" target="_blank">here</a>!';
										}else{
										 echo '<strong>'.$tweets->errors[0]->message.'</strong>';
										}
									   }
									   if(is_array($tweets)){
									   for($i = 0;$i <= count($tweets); $i++){
										if(!empty($tweets[$i])){
										 $tweets_array[$i]['created_at'] = $tweets[$i]->created_at;
										 $tweets_array[$i]['text'] = $tweets[$i]->text;   
										 $tweets_array[$i]['status_id'] = $tweets[$i]->id_str;   
										} 
									   }
									   function convert_links($status,$targetBlank=true,$linkMaxLen=250){
									   
									   // the target
										$target=$targetBlank ? " target=\"_blank\" " : "";
										
									   // convert link to url
										$status = preg_replace("/((http:\/\/|https:\/\/)[^ )
								]+)/e", "'<a href=\"$1\" title=\"$1\" $target >'. ((strlen('$1')>=$linkMaxLen ? substr('$1',0,$linkMaxLen).'...':'$1')).'</a>'", $status);
										
									   // convert @ to follow
										$status = preg_replace("/(@([_a-z0-9\-]+))/i","<a href=\"http://twitter.com/$2\" title=\"Follow $2\" $target >$1</a>",$status);
										
									   // convert # to search
										$status = preg_replace("/(#([_a-z0-9\-]+))/i","<a href=\"https://twitter.com/search?q=$2\" title=\"Search $1\" $target >$1</a>",$status);
										
									   // return the status
										return $status;
									  }
									  function relative_time($a) {
									   //get current timestampt
									   $b = strtotime("now"); 
									   //get timestamp when tweet created
									   $c = strtotime($a);
									   //get difference
									   $d = $b - $c;
									   //calculate different time values
									   $minute = 60;
									   $hour = $minute * 60;
									   $day = $hour * 24;
									   $week = $day * 7;
										
									   if(is_numeric($d) && $d > 0) {
										//if less then 3 seconds
										if($d < 3) return "right now";
										//if less then minute
										if($d < $minute) return floor($d) . " seconds ago";
										//if less then 2 minutes
										if($d < $minute * 2) return "about 1 minute ago";
										//if less then hour
										if($d < $hour) return floor($d / $minute) . " minutes ago";
										//if less then 2 hours
										if($d < $hour * 2) return "about 1 hour ago";
										//if less then day
										if($d < $day) return floor($d / $hour) . " hours ago";
										//if more then day, but less then 2 days
										if($d > $day && $d < $day * 2) return "yesterday";
										//if less then year
										if($d < $day * 365) return floor($d / $day) . " days ago";
										//else return more than a year
										return "over a year ago";
									   }
									  }  
									   foreach($tweets_array as $tweet){?>                
										 
										<div class="insomnia_tweet">
                                        	<?php if($tweet['text'] !=''){?>
											<div class="insomnia_tweet_content"><?php echo convert_links($tweet['text'])?></div>
                                            <div class="insomnia_tweet_time">
                                            	<a class="twitter_time" target="_blank" href="http://twitter.com/DankovTheme/statuses/<?php echo $tweet['status_id']?>"><?php echo relative_time($tweet['created_at'])?></a>
                                            </div>
                                            <?php  }else{?>
                                            <div class="insomnia_tweet_content">Sorry, but it's too many connections right now. And twitter widget not available now. Please refresh in few minutes.</div>
                                            <?php }; ?>
										</div>
							 <?php }echo $after_widget; }
}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	// Strip tags to remove HTML (important for text inputs)
	$instance['title'] = strip_tags( $new_instance['title'] );
	
	// Stripslashes for html inputs
	$instance['number_of_posts_to_show'] = stripslashes( $new_instance['number_of_posts_to_show']);

	$instance['insomnia_consumer_key'] = stripslashes( $new_instance['insomnia_consumer_key']);
	$instance['insomnia_consumer_secret'] = stripslashes( $new_instance['insomnia_consumer_secret']);
	$instance['insomnia_user_token'] = stripslashes( $new_instance['insomnia_user_token']);
	$instance['insomnia_user_secret'] = stripslashes( $new_instance['insomnia_user_secret']);
	$instance['insomnia_account'] = stripslashes( $new_instance['insomnia_account']);
	$instance['insomnia_account_count'] = stripslashes( $new_instance['insomnia_account_count']);
	

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	 
function form( $instance ) {

		
	// Set up some default widget settings
	$defaults = array( 
		'title' => __( 'Twitter Widget' , 'dankov' ),
		'number_of_posts_to_show' => '3',
		'insomnia_consumer_key' =>'',
		'insomnia_consumer_secret' =>'',
		'insomnia_user_token' =>'',
		'insomnia_user_secret' =>'',
		'insomnia_account' =>'DankovTheme',
		'insomnia_account_count' =>'3',
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'dankov') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

    <p>
		<label for="<?php echo $this->get_field_id( 'insomnia_consumer_key' ); ?>"><?php _e('Consumer Key:', 'dankov') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'insomnia_consumer_key' ); ?>" name="<?php echo $this->get_field_name( 'insomnia_consumer_key' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['insomnia_consumer_key'] ), ENT_QUOTES)); ?>" />
	</p>
    
    <p>
		<label for="<?php echo $this->get_field_id( 'insomnia_consumer_secret' ); ?>"><?php _e('Consumer Secret:', 'dankov') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'insomnia_consumer_secret' ); ?>" name="<?php echo $this->get_field_name( 'insomnia_consumer_secret' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['insomnia_consumer_secret'] ), ENT_QUOTES)); ?>" />
	</p>
    
	<p>
		<label for="<?php echo $this->get_field_id( 'insomnia_user_token' ); ?>"><?php _e('User Token:', 'dankov') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'insomnia_user_token' ); ?>" name="<?php echo $this->get_field_name( 'insomnia_user_token' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['insomnia_user_token'] ), ENT_QUOTES)); ?>" />
	</p>
    
    <p>
		<label for="<?php echo $this->get_field_id( 'insomnia_user_secret' ); ?>"><?php _e('User Secret:', 'dankov') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'insomnia_user_secret' ); ?>" name="<?php echo $this->get_field_name( 'insomnia_user_secret' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['insomnia_user_secret'] ), ENT_QUOTES)); ?>" />
	</p>
    
    <p>
		<label for="<?php echo $this->get_field_id( 'insomnia_account' ); ?>"><?php _e('Twitter Username:', 'dankov') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'insomnia_account' ); ?>" name="<?php echo $this->get_field_name( 'insomnia_account' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['insomnia_account'] ), ENT_QUOTES)); ?>" />
	</p>
    
    <p>
		<label for="<?php echo $this->get_field_id( 'insomnia_account_count' ); ?>"><?php _e('Amount of tweets:', 'dankov') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'insomnia_account_count' ); ?>" name="<?php echo $this->get_field_name( 'insomnia_account_count' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['insomnia_account_count'] ), ENT_QUOTES)); ?>" />
	</p>
    
    

	<?php	 		 	
	}
}
?>