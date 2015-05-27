jQuery(document).ready(function($){
  // Handle the "Save for later".
  $("#article-save-for-later").on('click', function() {
    jQuery.ajax({
      type:"POST",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: 'immersive_save_for_later',
        user_id: $(this).attr('data-userID'),
        article_url: $(this).attr('data-articleUrl'),
        article_id: $(this).attr('data-articleID')
      },
      success:function(data){
        // Replace the initial "Save for later" link with pertinent info.
        $("#article-save-for-later").parent().html(data);
      }
    });
  });

  // Handle the "Remove post from list".
  $(".remove-post-button").on('click', function() {
    jQuery.ajax({
      type:"POST",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: 'immersive_remove_saved_post',
        article_id: $(this).attr('id'),
        user_id: $(this).attr('data-userID')
      },
      success:function(data){
        $("#" + data).parent().html('Article has been removed.');
      }
    });
  });

  // Handle the Update number of shares per post.
  $(".sharrre").on('click', function() {
    jQuery.ajax({
      type:"POST",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: 'immersivly_update_number_of_shares',
        article_id: $(this).parents('ul').attr('id')
      },
      success:function(data){
        $('.js-count').html(data);
      }
    });
  });

  $(".forgot-box #email").on('keyup', function() {
    $(".forgot-box #user").val($(".forgot-box #email").val());
  });

  $("#wpmem_reg #user_email").on('keyup', function() {
    $("#wpmem_reg #log").val($("#wpmem_reg #user_email").val());
  });
})