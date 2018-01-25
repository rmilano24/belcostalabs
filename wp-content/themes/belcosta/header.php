<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php $allowed_html_array = wp_kses_allowed_html( 'post' )?>
  <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {?><link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('insomnia_logo_favicon', get_template_directory_uri() . '/assets/images/favicon.png')); ?>"> <?php };?>
	<?php if(get_theme_mod('insomnia_logo_favicon_iphone', 'enable'))  : ?><link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(get_theme_mod('insomnia_logo_favicon_iphone', get_template_directory_uri() . '/assets/images/114.png')); ?>" /><?php endif; ?>
	<?php if(get_theme_mod('insomnia_logo_favicon_ipad', 'enable'))  : ?><link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(get_theme_mod('insomnia_logo_favicon_ipad', get_template_directory_uri() . '/assets/images/144.png')); ?>" /><?php endif; ?>
    <link rel="stylesheet" href="https://use.typekit.net/ykv2zxd.css">
    <link rel="stylesheet" href=" <?php echo get_stylesheet_directory_uri(); ?>/assets/css/belcosta.css">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="preloader"><div id="status"></div></div>
<?php if(get_theme_mod('insomnia_scroll_up','enable') == true)  { ?><a href="#top" class="scroll-top scroll-top-hidden"><i class="fa fa-angle-up"></i></a><?php }; ?>  
<div class="wrapper">
<div class="header">  
<?php
    $insomnia_menu_style = get_theme_mod( 'insomnia_menu_style', 'style8' );
    if ($insomnia_menu_style == 'style1') {
        get_template_part( 'framework/content/top/style1');
    } elseif ($insomnia_menu_style == 'style2') {
        get_template_part( 'framework/content/top/style2');
    } elseif ($insomnia_menu_style == 'style3') {
        get_template_part( 'framework/content/top/style3');
    } elseif ($insomnia_menu_style == 'style4') {
        get_template_part( 'framework/content/top/style4');
    } elseif ($insomnia_menu_style == 'style5') {
        get_template_part( 'framework/content/top/style5');
    } elseif ($insomnia_menu_style == 'style6') {
        get_template_part( 'framework/content/top/style6');
    } elseif ($insomnia_menu_style == 'style7') {
        get_template_part( 'framework/content/top/style7');
    } elseif ($insomnia_menu_style == 'style8') {
        get_template_part( 'framework/content/top/style8');   
    } else {
        get_template_part( 'framework/content/top/style8');
    }
?>
	</div>