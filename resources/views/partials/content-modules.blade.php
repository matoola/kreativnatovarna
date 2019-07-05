@while(the_flexible_field('main_content'))
	
	{{-- MODULE CONTENT BLOCK --}}
	@if (get_row_layout() === 'content_block')
		<section class="section section-content {{ the_sub_field('background_select') }}">
			@include('modules.module-content')
		</section>
	@endif

	{{-- MODULE CARDS BLOCK --}}
	@if (get_row_layout() === 'cards_block')
		<section class="section section-cards section-{{ the_sub_field('cards_type') }}">
		@include('modules.module-cards')
		</section>
	@endif

	{{-- MODULE BANNER BLOCK --}}
	@if (get_row_layout() === 'banner_block')
		<section class="section section-banner">
			@include('modules.module-banner')
		</section>
	@endif

	{{-- MODULE POSTS BLOCK --}}
	@if (get_row_layout() === 'post_block')
		<section class="section section-posts">
		@include('modules.module-posts')
		</section>
	@endif

	{{-- MODULE HR LINE --}}
	@if (get_row_layout() === 'hr_line')
		<section class="section-hr">
			<div class="container-fluid max-width">
				<div class="row justify-content-center">
					<div class="col-12">
						<hr style="width: {{ the_sub_field('hr_line_size') }}" />
					</div>
				</div>
			</div>
		</section>
	@endif
	
@endwhile
