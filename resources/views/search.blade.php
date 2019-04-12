@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
  <div class="container-fluid max-width">
    <div class="row justify-content-center">
      <div class="col-12 col-xl-9">
        <div class="alert alert-warning">
          {{ __('Za iskano žal ni nobenega rezultata.', 'kt') }}
        </div>
        @include('partials.searchform')
      </div>
    </div>
  </div>
  @endif

  <div class="container-fluid max-width">
    <div class="row justify-content-center">
      @while(have_posts()) @php the_post() @endphp
        <div class="col-12 col-xl-9">
          @include('partials.content-search')
        </div>
      @endwhile
    </div>
  </div>

@endsection
