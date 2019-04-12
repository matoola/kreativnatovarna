@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="post-grid-wrap">
    <div class="container-fluid max-width">
      <div class="row justify-content-center">
        <div class="col-12">
          @if (!have_posts())
            <div class="alert alert-warning">
              {{ __('Sorry, no results were found.', 'sage') }}
            </div>
            {!! get_search_form(false) !!}
          @endif

          <div class="row justify-content-start">
            @while (have_posts()) @php the_post() @endphp
            <div class="col-12 col-sm-6 col-xl-4 pb-4">
              @include('partials.content-'.get_post_type())
            </div>
            @endwhile
          </div>

          {!! get_the_posts_navigation() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
