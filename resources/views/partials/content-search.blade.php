<article @php post_class('row') @endphp>
  @if (has_post_thumbnail())
  <a class="col-4 col-sm-3 col-xl-2 entry-image text-right" href="{{ get_permalink() }}" title="{{ the_title() }}">
    {{ the_post_thumbnail('thumbnail', array( 'class' => 'img-fluid mw-150' ) ) }}
  </a>
  @else
  <div class="col-4 col-sm-3 col-xl-2"></div>
  @endif
  <div class="col-8 col-sm-9 col-xl-10">
    <header class="pb-2">
      @if (get_post_type() === 'post')
        <small class="h6 small text-uppercase text-black-50">{{ __('novica', 'kt') }}</small>
      @elseif (get_post_type() === 'dogodek')
        <small class="h6 small text-uppercase text-black-50">{{ __('dogodek', 'kt') }}</small>
      @elseif (get_post_type() === 'dejavnost')
        <small class="h6 small text-uppercase text-black-50">{{ __('dejavnost', 'kt') }}</small>
      @elseif (get_post_type() === 'uporabni-vir')
        <small class="h6 small text-uppercase text-black-50">{{ __('uporabni vir', 'kt') }}</small>
      @elseif (get_post_type() === 'page')
        <small class="h6 small text-uppercase text-black-50">{{ __('stran', 'kt') }}</small>
      @endif
      <h2 class="search-entry-title h3"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
      @if (get_post_type() === 'post' || get_post_type() === 'dogodek')
        @include('partials/entry-meta')
      @endif
    </header>
    <div class="entry-content">
      @php the_excerpt() @endphp
      <hr>
    </div>
  </div>
</article>
