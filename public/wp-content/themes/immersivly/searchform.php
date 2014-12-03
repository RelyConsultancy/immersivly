<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input class="searchform__field" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php _e( 'Search:', 'immersivly' ); ?>">
	<input class="searchform__button" type="submit" value="&#xe60b;" data-icon>
</form>