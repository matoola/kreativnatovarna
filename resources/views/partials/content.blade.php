<article @php post_class('h-100 post-grid post') @endphp>
  <a class="post-link h-100" href="{{ get_permalink() }}" title="{{ the_title() }}">
    @if (has_post_thumbnail())
      {{ the_post_thumbnail('medium_large', array( 'class' => 'img-fluid w-100' ) ) }}
    @else
      <img class="img-fluid w-100" src="@asset('images/placeholder.svg')">
    @endif
    <span class="entry-item">
      <header>
        @include('partials/entry-meta')
        <h2 class="entry-title h5 pt-2 pb-1">{{ the_title() }}</h2>
      </header>
      {{ the_excerpt() }}
    </span>
    <button class="btn btn-primary">{{ _e('Preberi več', 'kt') }}</button>
  </a>
</article>
