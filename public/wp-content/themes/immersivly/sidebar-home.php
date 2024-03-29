<?php
/**
 * Homepage sidebar.
 *
 * @package Immersivly
 */
?>

<aside class="sidebar">
	<i class="sidebar__switch icon-menu"></i>
	<a class="sidebar__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

	<h1 class="sidebar__name"><?php bloginfo( 'name' ); ?></h1>
	<h5 class="sidebar__desc"><?php bloginfo( 'description' ); ?></h5>


	<ul id="filters" class="categories no-bullet">
		<?php
			$is_home = is_front_page();
			$args = array(
				'orderby' => 'name',
				'order' => 'ASC'
			);
			$categories = get_categories( $args );

			// get the category object for the current category
			$current_category = get_category( get_query_var( 'cat' ) );

			if ( $is_home ) {
				foreach ( $categories as $category ) {
				    echo '<li class="categories__item  categories__item--' . $category->category_nicename . '"><input id="filter_' . $category->category_nicename . '" name="filter" type="checkbox" checked value=".' . $category->category_nicename . '"><label for="filter_' . $category->category_nicename . '" class="categories__label"><span>' . $category->name . '</span></label></li>';
				}
			} else {
				foreach ( $categories as $category ) {
					$category_link = get_category_link( $category->cat_ID );
				    echo '<li class="categories__item  categories__item--' . $category->category_nicename . ( isset($current_category->term_id) && $current_category->term_id == $category->term_id ? ' categories__item--active' : '' ) . '"><label class="categories__label"><a href="' . $category_link . '">' . $category->name . '</a></label></li>';
				}
			}

		?>
	</ul>

	<?php get_search_form(); ?>

	<ul class="user-actions no-bullet">
		<!-- <li><a class="js-go-top" href="#">Go Top</a></li> -->
		<li><a class="user-actions__link js-trigger-overlay" href="#"><?php _e('More Info'); ?></a></li>
		<?php if ( is_user_logged_in() ) : ?>
			<li><a class="user-actions__link" href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout"><?php _e('Logout'); ?></a></li>
		<?php else : ?>
			<li><a class="user-actions__link js-trigger-overlay" href="#"><?php _e('Login'); ?></a></li>
			<li><a class="user-actions__link" href="<?php echo esc_url( home_url( '/register' ) ); ?>" title="Register"><?php _e('Register'); ?></a></li>
		<?php endif; ?>
	</ul>
</aside>