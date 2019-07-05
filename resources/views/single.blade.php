@extends('layouts.app')

@section('content')
  <div class="container-fluid max-width">
    <div class="row justify-content-center">
      <div class="col-12">
        @while(have_posts()) @php the_post() @endphp
          @include('partials.content-single-'.get_post_type())
        @endwhile
      </div>
    </div>
  </div>
  @include('partials.content-modules')
@endsection
