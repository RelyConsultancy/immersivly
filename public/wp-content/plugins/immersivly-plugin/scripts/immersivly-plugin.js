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
})