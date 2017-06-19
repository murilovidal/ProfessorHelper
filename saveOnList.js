$(document).ready(function(){
  includeOnList();
  selectList();
});


function includeOnList(){
  $("[name*='include']").click(function(){
    var include_id = $(this).attr('id');
    var idList = $(this).parent().parent().parent().attr('name');
    var userid = $(this).parent().parent().parent().attr('id');
     console.log(idList);
     console.log(include_id);
     console.log(userid);
    $.ajax({
       type:'POST',
       url:'includeQuestion.php',
       data: { include_id: include_id, idList: idList, userid: userid },
       success:function(result)
       {
         $("[name*='include'][id=" + include_id + "]").html("Incluída");
       },
       error: function(err){
         $("[name*='include'][id=" + include_id + "]").html("Já está na lista.");
         console.log(err);
       }
    });
  });
};

function selectList(){
  $("[name*='list']").click(function(){
    var idList = $(this).attr('id');
    $.ajax({
       type:'POST',
       url:'selectedList.php',
       data: { idList: idList },
       success:function(result)
       {
         console.log(result);
       },
       error: function(err){
         console.log(err);

       }
    });
  });
};
