<!-- <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <span class="form-inner" style="position:relative;">
        <label>
            <span class="screen-reader-text"><?php esc_attr_e( 'Išči', 'kt' ); ?>:</span>
            <input type="search" class="search-field" placeholder="<?php esc_attr_e( 'išči...', 'kt' ); ?>" value="" name="s">
        </label>
        <input type="submit" class="search-submit" value="f002">
    </span>
</form> -->

{!! get_search_form(false) !!}