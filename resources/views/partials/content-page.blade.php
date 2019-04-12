<div class="container-fluid max-width">
  <div class="row justify-content-start">
    @if (is_front_page())
    <div class="col-12 col-xl-8">
      <img class="m-logo img-fluid" src="@asset('images/logo-m.svg')" alt="{{ get_bloginfo('name', 'display') }}" title="{{ get_bloginfo('name', 'display') }}">
      @php the_content() @endphp
    </div>
    @else
      @if (has_post_thumbnail())
      <div class="col-12 col-md-6 col-xl-7 order-md-2">@php the_post_thumbnail('large', ['class' => 'img-fluid']) @endphp</div>
      @endif
      <div class="col-12 col-md-6 col-xl-5 order-md-1">@php the_content() @endphp</div>
    @endif
  </div>
</div>
