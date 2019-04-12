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

				@if ($postnum == '1')
					<div class="col-lg-12">
						<article @php post_class('h-100 post-grid post-featured') @endphp>
							<div class="row">
								<div class="col-lg-6 col-xl-7 order-lg-2">
									@if (has_post_thumbnail())
									<a class="entry-image" href="{{ get_permalink() }}" title="{{ the_title() }}">
										{{ the_post_thumbnail('medium_large', array( 'class' => 'img-fluid w-100' ) ) }}
									</a>
									@else
									<a class="entry-image" href="{{ get_permalink() }}" title="{{ the_title() }}">
										<img class="img-fluid w-100" src="@asset('images/placeholder.svg')">
									</a>
									@endif
								</div>
								<div class="col-lg-6 col-xl-5 order-lg-1">
									<div class="entry-item">
										<header>
											@include('partials/entry-meta')
											<h2 class="entry-title pt-2 pb-1"><a href="{{ get_permalink() }}" title="{{ the_title() }}">{{ the_title() }}</a></h2>
										</header>
										{{ the_excerpt() }}
									</div>
								</div>
							</div>
						</article>
					</div>
				@else 
					<div class="col-sm-6 col-lg-4">
						<article @php post_class('h-100 post-grid post') @endphp>
							@if (has_post_thumbnail())
							<a class="entry-image" href="{{ get_permalink() }}" title="{{ the_title() }}">
								{{ the_post_thumbnail('medium_large', array( 'class' => 'img-fluid w-100' ) ) }}
							</a>
							@else
							<a class="entry-image" href="{{ get_permalink() }}" title="{{ the_title() }}">
								<img class="img-fluid w-100" src="@asset('images/placeholder.svg')">
							</a>
							@endif
							<div class="entry-item">
								<header>
									@include('partials/entry-meta')
									<h2 class="entry-title pt-2 pb-1"><a href="{{ get_permalink() }}" title="{{ the_title() }}">{{ the_title() }}</a></h2>
								</header>
								{{ the_excerpt() }}
							</div>
						</article>
					</div>
					@endif
				<?php endwhile; wp_reset_postdata(); endif; ?>	

			</div>
		</div>
	</div>
</div>
