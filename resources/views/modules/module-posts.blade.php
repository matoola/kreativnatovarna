<div class="container-fluid max-width">				
	<div class="row justify-content-center">
		<div class="col-12">

			<?php if(get_sub_field('section_title')) : ?>			
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<h2 class="section-title"><?php the_sub_field('section_title'); ?> </h2>
				</div>
			</div>
			<?php endif; ?>
			
			<?php 
			$posttype = get_sub_field('post_type');
			$cat = get_sub_field('category_select'); 
			//$obj = get_object_taxonomies( $posttype );
			//$taxonomy = $obj[0];
			//$term = get_sub_field($taxonomy);
			$postnum = get_sub_field('post_number');
			?>
			
			
			<div class="row justify-content-center">
			
				<?php 
				if( $posttype == 'post' ) :
				$query1 = new WP_Query( array(
						'posts_per_page' => $postnum,
						'post_type'=> 'post',
						'cat' => $cat,
						)
				); 
				else : 
				$query1 = new WP_Query( array(
						'posts_per_page' => $postnum,
						'post_type'=> $posttype,	
								//'tax_query' => array(
								//    array(
								//        'taxonomy' => $taxonomy,
								//        'field' => 'id',
								//        'terms'    => $term
								//    ),
								//),
						)
				);
				endif; ?>
				
				<?php if ( $query1->have_posts() ) : while ( $query1->have_posts() ) : $query1->the_post(); ?>
				<div class="col-lg-3">
						<article class="post post-<?php echo $posttype; ?>">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?></a>
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p><?php echo get_the_excerpt(); ?></p>
						</article> 	 	
				</div>		
				<?php endwhile; wp_reset_postdata(); endif; ?>	

			</div>
		</div>
	</div>
</div>
