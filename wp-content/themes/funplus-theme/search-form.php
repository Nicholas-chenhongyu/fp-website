<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="mb-5">
    <label>Search for</label>
    <input type="search" name="s" class="form-control form-control-lg" value="<?php echo esc_attr( get_search_query() ); ?>" />
  </div>
  <div class="text-right">
    <input type="submit" class="btn btn-md btn-dark" value="Search" />
  </div>
</form>
