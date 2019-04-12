<div class="container-fluid max-width">
	<div class="row justify-content-center">
		<div class="col-12">
			@if(get_sub_field('section_title'))
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<h2 class="section-title"><?php the_sub_field('section_title'); ?> </h2>
				</div>
			</div>
			@endif

			<?php $cards_type = get_sub_field('cards_type'); ?>

			@if ($cards_type == 'article-card')

			<div class="row justify-content-center <?php echo $cards_type; ?>-wrap">
				<?php if( have_rows('cards_repeater') ): ?>
				<?php while ( have_rows('cards_repeater') ) : the_row(); ?>
					<article class="col-sm-6 col-md-4 col-xl-3 text-center">
						<div class="card h-100">
							<?php if(get_sub_field('cards_image')) :
								$image = get_sub_field('cards_image');
								$size = 'medium_large';
								$thumb = $image['sizes'][ $size ];
							?>
							<span class="card-image" style="background-image: url('<?php echo $thumb; ?>');"></span>
							<?php endif; ?>
							<div class="card-body p-0">
								<?php if(get_sub_field('cards_button_link')) : ?>
								<a title="<?php if(get_sub_field('cards_title')) :  the_sub_field('cards_title'); endif; ?>" href="<?php the_sub_field('cards_button_link'); ?>">
								<?php endif; ?>
								<?php if(get_sub_field('cards_title')) : ?>
									<h3 class="card-title p-3"><?php the_sub_field('cards_title'); ?></h3>
								<?php endif; ?>
								<?php if(get_sub_field('cards_button_link')) : ?>
								</a>
								<?php endif; ?>
							</div>
						</div>
					</article>
				<?php endwhile; endif; ?>
			</div>

			@elseif ($cards_type == 'article-usp')

			<div class="row justify-content-center <?php echo $cards_type; ?>-wrap">
				<?php if( have_rows('cards_repeater') ): ?>
				<?php while ( have_rows('cards_repeater') ) : the_row(); ?>
					<article class="col-sm-6 col-md-4 text-center">
						<div class="card h-100">
							<?php if(get_sub_field('cards_icon')) :	?>
								<span class="card-icon p-3"><i class="<?php the_sub_field('cards_icon'); ?> fa-4x"></i></span>
							<?php endif; ?>
							<div class="card-body">
								<?php if(get_sub_field('cards_title')) : ?>
								<h3 class="card-title"><?php the_sub_field('cards_title'); ?></h3>
								<?php endif; ?>
								<?php if(get_sub_field('cards_text')) : ?>
								<p class="card-text"><?php the_sub_field('cards_text'); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</article>
				<?php endwhile; endif; ?>

			@elseif ($cards_type == 'article-team')

			<div class="row justify-content-start <?php echo $cards_type; ?>-wrap">
				<?php if( have_rows('cards_repeater') ): ?>
				<?php while ( have_rows('cards_repeater') ) : the_row(); ?>
					<article class="col-sm-6 col-md-4 col-xl-3 text-center">
						<div class="card h-100">
							<?php if(get_sub_field('cards_image')) :
									$image = get_sub_field('cards_image');
									$size = 'medium';
									$thumb = $image['sizes'][ $size ];
								?>
								<img class="card-img-top" src="<?php echo $thumb; ?>" <?php if(get_sub_field('cards_title')) : ?>alt="<?php the_sub_field('cards_title'); ?>"<?php endif; ?>>
							<?php endif; ?>
							<div class="card-body">
								<?php if(get_sub_field('cards_title')) : ?>
								<h3 class="card-title"><?php the_sub_field('cards_title'); ?></h3>
								<?php endif; ?>
								<?php if(get_sub_field('cards_text')) : ?>
								<p class="card-text"><?php the_sub_field('cards_text'); ?></p>
								<?php endif; ?>
								<?php if(get_sub_field('cards_phone')) : ?>
								<p class="card-phone"><?php the_sub_field('cards_phone'); ?></p>
								<?php endif; ?>
								<?php if(get_sub_field('cards_email')) : ?>
								<p class="card-email"><a href="mailto:<?php echo esc_html( antispambot( the_sub_field('cards_email') ) ); ?>"><?php echo esc_html( antispambot( the_sub_field('cards_email') ) ); ?></a></p>
								<?php endif; ?>
							</div>
						</div>
					</article>
				<?php endwhile; endif; ?>

			</div>

			@endif

		</div>
	</div>
</div>   
