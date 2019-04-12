@if (!is_single())
<div class="post-type">
  <?php if( get_field('has_gallery') ): ?><span class="has-icons" title="{{ __('Fotogalerija', 'kt') }}"><i class="fal fa-camera-retro fa-sm"></i></span><?php endif; ?>
  <?php if( get_field('has_documents') ): ?><span class="has-icons" title="{{ __('Dokumenti', 'kt') }}"><i class="fal fa-file-alt fa-sm"></i></span><?php endif; ?>
</div>
@endif
<div class="row">
  <div class="col-sm-8">{{ the_category() }}</div>
  @if (!is_single())
  <div class="col-sm-4 text-right"><time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time></div>
  @endif
</div>
