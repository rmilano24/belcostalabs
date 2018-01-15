  <nav class="navbar navbar-wrap navbar-custom navbar-fixed-top menu-wrap style1">
    <div class="container full">
        <div class="row">
          <div class="col-lg-2 col-md-3 col-sm-6 col-xs-9">
            <?php if(get_theme_mod('insomnia_logo_image', 'enable') == true)  { ?>
              <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo esc_url(get_theme_mod('insomnia_logo_upload', get_template_directory_uri() . '/assets/images/logo.png')); ?>" data-rjs="<?php echo esc_url(get_theme_mod('insomnia_retina_logo_upload',get_template_directory_uri() . '/assets/images/logo@2x.png')); ?>" class="logowhite" alt="<?php bloginfo( 'name' ) ?>" />
                  <img src="<?php echo esc_url(get_theme_mod('insomnia_logo_dark_upload', get_template_directory_uri() . '/assets/images/logo.png')); ?>" data-rjs="<?php echo esc_url(get_theme_mod('insomnia_retina_logo_dark_upload',get_template_directory_uri() . '/assets/images/logo@2x.png')); ?>" class="logodark" alt="<?php bloginfo( 'name' ) ?>" /> <span><?php echo get_theme_mod('insomnia_logo_text', esc_html__( 'Insomnia', 'insomnia' )); ?></span>
                </a>
              </div>
              <?php } else  { ?>
                <?php if(get_theme_mod('insomnia_logo') == true) { ?>
                  <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_theme_mod('insomnia_logo_text', esc_html__( 'Insomnia', 'insomnia' )); ?></a></div>
                <?php  } ?> 
            <?php } ?> 
          </div>
          <div class="col-lg-8 col-md-7 col-sm-6 col-xs-3">
            <div class="menu-responsive desktop">
              <div class="menu-center">
                <div class="collapse navbar-collapse navbar-main-collapse pull-left responsive-menu">
                      <?php wp_nav_menu( array(
                        'theme_location' => 'menu',
                        'container' => false,
                        'menu_class' => 'nav navbar-nav',
                        'sort_column' => 'menu_order',
                        'walker' => new Insomnia_My_Walker_Nav_Menu(),
                        'fallback_cb' => 'insomnia_MenuFallback'
                      )); ?> 
                </div>
              </div>
            </div>
            <div class="menu-responsive mobile">
              <div class="burger_insomnia_normal_holder"><a href="#" class="nav-icon3" id="open-button"><span></span><span></span><span></span><span></span><span></span><span></span></a></div>
                <div class="burger_insomnia_menu_overlay_normal">
                  <div class="burger_insomnia_menu_vertical">
                    <?php wp_nav_menu( array(
                      'theme_location' => 'menu',
                      'container' => true,
                      'menu_class' => 'burger_insomnia_main_menu',
                      'depth' => 2,
                    )); ?>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 hidden-sm hidden-xs">
            <ul class="cart_search_block">
              <li>
                <div class="search-icon-header">
                  <a href="#"><i class="pe-7s-search"></i></a>
                  <div class="black-search-block">
                    <div class="black-search-table">
                      <div class="black-search-table-cell">
                        <div>
                          <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" >
                            <input type="text" class="focus-input" placeholder="Enter Keyword" value="<?php echo get_search_query() ?>" name="s" id="s" />
                            <input type="submit" id="searchsubmit" value="" />
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="close-black-block"><a href="#"><i class="pe-7s-close"></i></a></div>
                  </div>
                </div>
              </li>
              <?php if (class_exists( 'WooCommerce' )) {?> 
                <li>
                  <div class="insomnia_woo_cart">
                    <div class="insomnia_head_holder_inner">
                      <div class="insomnia_head_cart">
                          <a class="" href="<?php echo WC()->cart->get_cart_url(); ?>"><i class="pe-7s-shopbag"></i> <span class="insomnia_cart_icon"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'insomnia' ), WC()->cart->cart_contents_count ); ?></span></a>
                      </div>
                    </div>
                    <div class="insomnia_cart_widget">
                      <?php the_widget( 'WC_Widget_Cart', 'title=' );?>
                    </div>
                  </div>
                </li>
                <?php } ?>
            </ul>
          </div>
        </div> 
      </div>
      </nav>