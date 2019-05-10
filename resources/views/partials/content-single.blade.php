<article @php post_class('row post post-single') @endphp>
  @if (has_post_thumbnail())
  <div class="col-12 col-md-6 entry-image order-md-2" href="{{ get_permalink() }}" title="{{ the_title() }}">
    {{ the_post_thumbnail('large', array( 'class' => 'img-fluid w-100' ) ) }}
  </div>
  @endif
  <div class="col-12 col-md-6 order-md-1">
    <header>
      @include('partials/entry-meta')
      <h1 class="entry-title h3">{!! get_the_title() !!}</h1>
    </header>
    <div class="entry-content pt-4">
      @php the_content() @endphp
    </div>
  </div>
</article>
