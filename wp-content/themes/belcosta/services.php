<?php               
    // Template Name: Services
?>
<?php get_header();?>

<div class="secondary-nav">
    <div class="container">
        <div class="row">
            <?php

            $args = array(
                'theme_location' => 'services-menu'
            );

            ?>

            <?php wp_nav_menu(  $args ); ?>		
        </div>
    </div>
</div>

<div class="default_page">
    <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <?php the_content();  ?>
            <div class="clearfix"></div>
        </div>
    <?php endwhile; endif; ?>
</div>
<?php  get_footer(); ?>