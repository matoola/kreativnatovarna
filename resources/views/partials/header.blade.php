<header class="banner fixed-top">
  <div class="container-fluid max-width px-0">
    <nav class="navbar navbar-expand-lg">
      <a class="brand" href="{{ home_url('/') }}"><img src="@asset('images/logo.svg')" alt="{{ get_bloginfo('name', 'display') }}" title="{{ get_bloginfo('name', 'display') }}"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
          <span></span><span></span><span></span><span></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        @if(has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'container' => false, 'menu_class' => 'navbar-nav ml-auto text-center text-lg-left']) !!}
        @endif
        @if(has_action('wpml_add_language_selector'))
          <div class="lang">{{ do_action('wpml_add_language_selector') }}</div>
        @endif
      </div>
    </nav>
  </div>
</header>