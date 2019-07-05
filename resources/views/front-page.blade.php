@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-slider')
  @endwhile
  @include('partials.content-modules')
@endsection
