@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-slider')
    <section id="heading" class="section section-home">@include('partials.content-page')</section>
  @endwhile
@endsection
