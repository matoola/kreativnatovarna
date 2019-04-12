@extends('layouts.app')

@section('content')

<div id="fourohfour">
  <div class="container-fluid max-width h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-sm-8 col-md-6 col-xl-5 text-center">
        @if (!have_posts())
          <h2>{{ __('404', 'kt') }}</h2>
          <h6>{{ __('Žal stran, ki ste jo iskali ne obstaja več ali pa sploh ni nikoli obstajala. Poiščite željeno vsebino v meniju ali pa se vrnite na', 'kt') }} <a href="{{ home_url('/') }}">{{ __('domačo stran', 'kt') }}</a>.</h6>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
