<div class="container-fluid max-width">
	<?php if(get_sub_field('section_title')) : ?>					
	<div class="row justify-content-center">
		<div class="col-12">
			<?php if(get_sub_field('section_title_type') == 'Heading 1') : ?>
			<h1 class="section-title <?php the_sub_field('section_title_position'); ?>"><?php the_sub_field('section_title'); ?></h1>
			<?php elseif(get_sub_field('section_title_type') == 'Heading 2') : ?>
			<h2 class="section-title <?php the_sub_field('section_title_position'); ?>"><?php the_sub_field('section_title'); ?></h2>
			<?php elseif(get_sub_field('section_title_type') == 'Heading 3') : ?>
			<h3 class="section-title <?php the_sub_field('section_title_position'); ?>"><?php the_sub_field('section_title'); ?></h3>
			<?php else: ?>
			<h4 class="section-title <?php the_sub_field('section_title_position'); ?>"><?php the_sub_field('section_title'); ?></h4>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<div class="row justify-content-center">
		<div class="col-12">
			<div class="row">
				<?php if( have_rows('content_repeater') ): ?>
					<?php while ( have_rows('content_repeater') ) : the_row(); ?>
					<?php if( get_sub_field('column_select') == 'Column Full Width' ): ?>
						<div class="col-md-12 entry-content">
							<?php the_sub_field('content_column'); ?>
						</div>
					<?php elseif( get_sub_field('column_select') == 'Column 3/4 Width' ) : ?>
						<div class="col-md-9 entry-content">
							<?php the_sub_field('content_column'); ?>
						</div>
					<?php elseif( get_sub_field('column_select') == 'Column 2/3 Width' ) : ?>
						<div class="col-md-8 entry-content">
							<?php the_sub_field('content_column'); ?>
						</div>
					<?php elseif( get_sub_field('column_select') == 'Column Half Width' ) : ?>	
						<div class="col-md-6 entry-content">
							<?php the_sub_field('content_column'); ?>
						</div>
					<?php elseif( get_sub_field('column_select') == 'Column 1/3 Width' ) : ?>
						<div class="col-md-4 entry-content">
							<?php the_sub_field('content_column'); ?>
						</div>
					<?php else : ?>
						<div class="col-sm-6 col-md-3 entry-content">
							<?php the_sub_field('content_column'); ?>
						</div>
					<?php endif; ?>
					<?php endwhile; ?>
				<?php endif;	?>
			</div>
		</div>
	</div>
</div>
