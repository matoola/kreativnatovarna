

<div id="sponsors" class="py-5">
  <div class="container-fluid max-width">
    <div class="row justify-content-center">
      @php dynamic_sidebar('sidebar-sponsors') @endphp
    </div>
  </div>
</div>

<footer class="content-info pt-5">
  <div class="container-fluid max-width">
    <div class="row">
      @php dynamic_sidebar('sidebar-footer') @endphp
    </div>
  </div>
</footer>
<div id="colophon" class="pt-2 pb-1">
  <div class="container-fluid max-width">
    <div class="row">
      <div class="col-12">
        <hr>
        <span class="d-block float-md-left pb-2 small">{{ date('Y') }} &copy; {{ _e('Vse pravice pridržane.', 'kt') }}</span>
        <span class="d-block text-md-right float-md-right pb-2 pl-md-2 small"><a href="https://kreativnatovarna.si" title="Kreativna tovarna">{{ _e('Izdelava spletne strani: Kreativna tovarna', 'kt') }}</a></span>
      </div>
    </div>
  </div>
</div>