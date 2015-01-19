jQuery(document).ready(function($){
  // Handle the "Save for later".
  $("#article-save-for-later").on('click', function() {
    console.log($(this).attr('data-userID'));
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
})