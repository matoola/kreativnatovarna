<footer class="content-info pt-3">
  <div class="container-fluid max-width">
    <div class="row">
      @php dynamic_sidebar('sidebar-footer') @endphp
    </div>
  </div>
  <div id="colophon" class="pt-2 pb-1">
    <div class="container-fluid max-width">
      <div class="row align-items-center pb-3 pb-2">
        <div class="col-12"><hr></div>
        <div class="col-12 col-md-6"><img src="@asset('images/logo-footer.svg')" alt="{{ get_bloginfo('name', 'display') }}" title="{{ get_bloginfo('name', 'display') }}"></div>
        <div class="col-12 col-md-6 small text-md-right">Stilles d.o.o. &copy; {{ date('Y') }}. <a href="https://kreativnatovarna.si" title="Kreativna tovarna">{{ _e('Izdelava spletnih strani: Kreativna tovarna', 'kt') }}</a></div>
      </div>
    </div>
  </div>
</footer>