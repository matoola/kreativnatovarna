<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-12 text-center px-0">
			<?php 
				if(get_sub_field('banner_image')) :
					$image = get_sub_field('banner_image');
					$size = 'large';
					$thumb = $image['sizes'][ $size ];
				else:
					$thumb = '';
				endif;
			?>
			<div class="banner-block pt-4 p-3 p-sm-5" style="background-image: url('<?php echo $thumb; ?>')">
				<div class="max-width centered">
					<div class="row justify-content-center">
						<div class="col-12 col-md-11 col-lg-9 col-xl-7 py-3">
							<h2><?php echo get_sub_field('section_title'); ?></h2>
							<p class="banner-text"><?php echo get_sub_field('banner_text'); ?></p>
							<?php if (get_sub_field('banner_button_link')) : ?>
								<a class="btn btn-secondary" href="<?php echo get_sub_field('banner_button_link'); ?>"><?php echo get_sub_field('banner_button_text'); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
