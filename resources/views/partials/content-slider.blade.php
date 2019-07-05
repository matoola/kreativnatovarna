<?php
	$args = array( 
		'post_type' => 'drsnik', 
		'posts_per_page' => 5,
	);
	$loop = new WP_Query( $args );
?>
<section class="section section-slider">
	<div id="carouselHome" class="carousel slide" data-ride="carousel" data-interval="7000">
		<ol class="carousel-indicators">
			<?php	$ii = 0; while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<li data-target="#carouselHome" data-slide-to="<?php echo $ii; ?>"<?php if($ii === 0) { echo ' class="active"'; } ?>></li>
			<?php	$ii++; endwhile; ?>
		</ol>
		<div class="carousel-inner">
		<?php	$i = 0; while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="carousel-item<?php if($i == 0) { echo ' active'; } ?><?php if ( get_field('link') ) : echo ' carousel-item-hover'; endif; ?>">
				<?php if ( get_field('link') ) : ?><a href="<?php the_field('link'); ?>"><?php endif; ?>	
					<div class="slider-image" style="background-image: url('<?php the_post_thumbnail_url('slider'); ?>');"></div>
						<div class="slider-content<?php if ( get_field('font_color') === 'white' ) : echo ' white'; endif; ?>">

							<?php
								$hex = get_field('bg_color');
								list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
							?>

							<div class="slider-content-text" <?php if ( get_field('bg_color') ) : ?>style="background-color:rgba(<?php echo $r.', '.$g.', '.$b; ?>, 0.875);"<?php endif; ?>>
								<?php if ( get_field('subtitle') ) : ?><span class="slider-content-subtitle"><?php the_field('subtitle'); ?></span><?php endif; ?>
								<h3 class="h2"><?php the_title(); ?></h3>
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>
				<?php if ( get_field('link') ) : ?></a><?php endif; ?>
			<?php	$i++; endwhile; ?>
			<a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
				<i class="fal fa-angle-left"></i>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
				<i class="fal fa-angle-right"></i>
				<span class="sr-only">Next</span>
			</a>
			<?php wp_reset_query(); ?></div>
	</div>
</section>