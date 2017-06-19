$(document).ready(function(){
 $("[name*='likeSubmit']").click(function(){
   var include_id = $(this).attr('id');
   var userid = $(this).parent().parent().attr('id');
   var like = $(this).attr('name');

   $.ajax({
      type:'POST',
      url:'likes.php',
      data: { include_id: include_id, userid: userid, likeordis: like  },

      success:function(result)
      {
        console.log(result);
      },
      error: function(err){
        console.log(err);
      }
   });
 });
});
