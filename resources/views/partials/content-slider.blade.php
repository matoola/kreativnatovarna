<section class="section section-slider">
	<div class="container-fluid max-width">
		<div class="row justify-content-center">
			<div class="col-12 text-center">
				<h2 class="section-title">{{ __('Aktualno', 'kt') }}</h2>
			</div>
			<div class="col-12">
				<div id="carouselLatest" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<?php
						$args = array( 
							'post_type' => 'drsnik', 
							'posts_per_page' => 8,
						);
						$loop = new WP_Query( $args );
						$i = 0;
						while ( $loop->have_posts() ) : $loop->the_post(); 
						?>
							<div class="carousel-item <?php if($i == 0) { echo 'active'; } ?>">
								<div class="row">
									<div class="col-12 col-md-6 col-lg-7 h-100 pl-md-0 order-md-2">
										<div class="slider-image">
											<?php if ( get_field('link') ) : ?><a href="<?php the_field('link'); ?>"><?php endif; ?>
												<?php the_post_thumbnail('slider', ['class' => 'img-fluid']); ?>
												<?php if ( get_field('link') ) : ?></a><?php endif; ?>
										</div>
									</div>
									<div class="col-12 col-md-6 col-lg-5 pr-md-0 order-md-1">
										<div class="slider-content<?php if ( get_field('font_color') == 'white' ) : ?> white<?php endif; ?> h-100" <?php if ( get_field('bg_color') ) : ?>style="background-color:<?php the_field('bg_color'); ?>"<?php endif; ?>>
											<div class="slider-content-text">
												<?php if ( get_field('link') ) : ?><a href="<?php the_field('link'); ?>"><?php endif; ?>
													<?php if ( get_field('subtitle') ) : ?><span class="slider-content-subtitle"><?php the_field('subtitle'); ?></span><?php endif; ?>
													<h3 class="h2"><?php the_title(); ?></h3>
													<?php the_excerpt(); ?>
												<?php if ( get_field('link') ) : ?></a><?php endif; ?>
											</div>
											<span class="counter"><span class="counter-current"><?php echo $i+1; ?></span><span class="counter-separator">/</span><span class="counter-total"></span></span>
											<a class="carousel-control-prev" href="#carouselLatest" role="button" data-slide="prev">
												<i class="far fa-angle-left"></i>
												<span class="sr-only">Previous</span>
											</a>
											<a class="carousel-control-next" href="#carouselLatest" role="button" data-slide="next">
												<i class="far fa-angle-right"></i>
												<span class="sr-only">Next</span>
											</a>
										</div>
									</div>
								</div>
							</div>
							
						<?php
						$i++;
						endwhile; ?>
						<?php
						wp_reset_query();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>