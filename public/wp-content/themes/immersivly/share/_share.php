<!-- Share Button Markup -->
<li class="social__item social--dark__item">
  <a class="social__item--twitter twitter sharrre twitter-<?php the_ID(); ?>" href="javascript:;" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>"><i class="icon-twitter"></i></a>
</li>
<li class="social__item social--dark__item">
  <a class="social__item--facebook facebook sharrre facebook-<?php the_ID(); ?>" href="javascript:;" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Like"><i class="icon-facebook"></i></a>
</li>
<li class="social__item social--dark__item">
  <a class="social__item--gplus googlePlus sharrre googleplus-<?php the_ID(); ?>" href="javascript:;" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="+1"><i class="icon-gplus"></i></a>
</li>
<li class="social__item social--dark__item">
  <a class="social__item--linkedin linkedin sharrre linkedin-<?php the_ID(); ?>" href="javascript:;" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Share"><i class="icon-linkedin"></i></a>
</li>
<li class="social__item social--dark__item"><a class="social__item--email" href="#"><i class="icon-email"></i></a></li>
<!-- End Share Button Markup -->

<!-- The settings of the sharrre implementation -->
<script>
	jQuery(document).ready(function($) {
		$('.googleplus-<?php the_ID(); ?>').each(function(){
		  var self = this;
      	  $(this).sharrre({
		  share: {
		    googlePlus: true
		  },
		  urlCurl: '/wp-content/themes/immersivly/share/sharrre.php',
		  enableHover: false,
		  template: '<div class="box"><a class="count" href="#">{total}</a><a class="share" href="#">+1</a></div>',
		  click: function(api, options){
		    api.simulateClick();
		    api.openPopup('googlePlus');
		  }
		});
		});
		$('.facebook-<?php the_ID(); ?>').each(function(){
		  var self = this;
      	  $(this).sharrre({
		  share: {
		    facebook: true
		  },
		  enableHover: false,
		  template: '<div class="box"><a class="count" href="#">{total}</a><a class="share" href="#">Like</a></div>',
		  click: function(api, options){
		    api.simulateClick();
		    api.openPopup('facebook');
		  }
		});
		});
		$('.twitter-<?php the_ID(); ?>').each(function(){
		  var self = this;
      	  $(this).sharrre({
		  share: {
		    twitter: true
		  },
		  enableHover: false,
		  template: '<div class="box"><a class="count" href="#">{total}</a><a class="share" href="#">Tweet</a></div>',
		  enableTracking: true,
		  click: function(api, options){
		    api.simulateClick();
		    api.openPopup('twitter');
		  }
		});
		});
	$('.pinterest-<?php the_ID(); ?>').each(function(){
		  var self = this;
      	  $(this).sharrre({
		  share: {
		    pinterest: true
		  },
		  enableHover: false,
		  template: '<div class="box"><a class="count" href="#">{total}</a><a class="share" href="#">Pin</a></div>',
		  enableTracking: true,
		  click: function(api, options){
		    api.simulateClick();
		    api.openPopup('pinterest');
		  }
		});
		});
	$('.linkedin-<?php the_ID(); ?>').each(function(){
		  var self = this;
      	  $(this).sharrre({
		  share: {
		    linkedin: true
		  },
		  enableHover: false,
		  template: '<div class="box"><a class="count" href="#">{total}</a><a class="share" href="#">Share</a></div>',
		  enableTracking: true,
		  click: function(api, options){
		    api.simulateClick();
		    api.openPopup('linkedin');
		  }
		});
		});
	// $('.stumbleupon-<?php the_ID(); ?>').each(function(){
	// 	  var self = this;
 //      	  $(this).sharrre({
	// 	  share: {
	// 	    stumbleupon: true
	// 	  },
	// 	  enableHover: false,
	// 	  urlCurl: '/wp-content/themes/danielsetzermann/share/sharrre.php',
	// 	  template: '<div class="box"><a class="count" href="#">{total}</a><a class="share" href="#">Share</a></div>',
	// 	  enableTracking: true,
	// 	  click: function(api, options){
	// 	    api.simulateClick();
	// 	    api.openPopup('stumbleupon');
	// 	  }
	// 	});
	// 	});
	});
</script>