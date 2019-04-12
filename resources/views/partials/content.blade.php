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
