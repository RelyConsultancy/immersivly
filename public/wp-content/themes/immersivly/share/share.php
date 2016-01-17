<!-- Share Button Markup -->
<li class="social__item">
  <a class="social__item--twitter twitter sharrre twitter-<?php the_ID(); ?>" href="javascript:;" data-url="<?php echo wp_get_shortlink(); ?>" data-text="<?php the_title(); ?>" data-title="Tweet"></a>
</li>
<li class="social__item">
  <a class="social__item--facebook facebook sharrre facebook-<?php the_ID(); ?>" href="javascript:;" data-url="<?php echo wp_get_shortlink(); ?>" data-text="<?php the_title(); ?>" data-title="Like"></a>
</li>
<li class="social__item">
  <a class="social__item--gplus googlePlus sharrre googleplus-<?php the_ID(); ?>" href="javascript:;" data-url="<?php echo wp_get_shortlink(); ?>" data-text="<?php the_title(); ?>" data-title="+1"></a>
</li>
<li class="social__item">
  <a class="social__item--linkedin linkedin sharrre linkedin-<?php the_ID(); ?>" href="javascript:;" data-url="<?php echo wp_get_shortlink(); ?>" data-text="<?php the_title(); ?>" data-title="Share"></a>
</li>
<li class="social__item"><a class="social__item--email" href="mailto:?subject=Check this out @Immersivly&BODY=I found this article interesting and thought of sharing it with you. Check it out: <?php the_permalink(); ?>"><i class="icon-email"></i></a></li>
<!-- End Share Button Markup -->

<!-- The settings of the sharrre implementation -->
<script>
  jQuery(document).ready(function( $ ) {
    $('.twitter-<?php the_ID(); ?>').each(function() {
      $(this).sharrre({
        share: {
          twitter: true
        },
        enableHover: false,
        template: '<span class="social__item__count">{total}</span><i class="icon-twitter"></i>',
        enableTracking: true,
        click: function(api, options){
          api.simulateClick();
          api.openPopup('twitter');
        }
      });
    });

    $('.facebook-<?php the_ID(); ?>').each(function() {
      $(this).sharrre({
        share: {
          facebook: true
        },
        enableHover: false,
        template: '<span class="social__item__count">{total}</span><i class="icon-facebook"></i>',
        click: function(api, options){
          api.simulateClick();
          api.openPopup('facebook');
        }
      });
    });

    $('.googleplus-<?php the_ID(); ?>').each(function() {
      $(this).sharrre({
        share: {
          googlePlus: true
        },
        urlCurl: '/wp-content/themes/immersivly/share/sharrre.php',
        enableHover: false,
        template: '<span class="social__item__count">{total}</span><i class="icon-gplus-new"></i>',
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('googlePlus');
        }
      });
    });

    $('.linkedin-<?php the_ID(); ?>').each(function() {
      $(this).sharrre({
        share: {
          linkedin: true
        },
        enableHover: false,
        template: '<span class="social__item__count">{total}</span><i class="icon-linkedin"></i>',
        enableTracking: true,
        click: function(api, options){
          api.simulateClick();
          api.openPopup('linkedin');
        }
      });
    });
  });
</script>