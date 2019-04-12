<article @php post_class('row post post-single') @endphp>
  @if (has_post_thumbnail())
  <div class="col-12 col-md-6 col-xl-7 entry-image order-md-2" href="{{ get_permalink() }}" title="{{ the_title() }}">
    {{ the_post_thumbnail('large', array( 'class' => 'img-fluid w-100' ) ) }}
  </div>
  @endif
  <div class="col-12 col-md-6 col-xl-5 order-md-1">
    <header>
      <time class="d-block updated pb-2" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
      <h1 class="entry-title">{!! get_the_title() !!}</h1>
      @include('partials/entry-meta')
    </header>
    <div class="entry-content pt-4">
      @php the_content() @endphp
    </div>
  </div>
  @if (is_singular('dogodek'))

  <?php
    $args = array( 
      'post_type' => 'post',
      'posts_per_page' => 3,
      'orderby' => 'rand',
      'meta_key' => 'event_chooser',
      'meta_query' => array(
        array(
          'key'		=> 'event_chooser',
          'value'		=> get_the_ID(),
        ),
			),
    );

    $news = new WP_Query( $args );
  ?>

  <div class="col-12 order-md-3">
    <div class="row">
      @while ($news->have_posts()) @php $news->the_post() @endphp
      <div class="col-12 col-sm-6 col-xl-4 pb-4">
        @include('partials.content-'.get_post_type())
      </div>
      @endwhile
    </div>
  </div>
  @endif
</article>
