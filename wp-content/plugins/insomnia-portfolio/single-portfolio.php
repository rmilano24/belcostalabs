<?php get_header(); ?>
<div class="tag_line">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h4 class="tag_line_title"><?php the_title() ?></h4>
				<?php insomnia_breadcrumbs(); ?>
			</div>
		</div>
	</div>
</div>
<div class="container margin">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); do_shortcode(the_content()); ?>
			<div class="insomnia_portfolio_nav">
				<?php previous_post_link('%link', '<i class="fa fa-long-arrow-left"></i>', false); ?> 
				<a href="<?php echo get_theme_mod('insomnia_link_portfolio', 'http://google.com/'); ?>" title="To All Works"><i class="fa fa-th-large"></i></a> 
				<?php next_post_link('%link', '<i class="fa fa-long-arrow-right"></i>', false); ?>
	        </div>
			<?php endwhile; endif;?>
    	</div>
	</div>
</div>
<?php get_footer(); ?>

