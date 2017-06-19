$(document).ready(function(){
  sendAnswers();

});

function sendAnswers(){
  $("[name*='respostas']").click(function(){
    var request;
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    $.ajax({
       url:'provaResolvida.php',
       type:'GET',
       data : serializedData,
       success : function(result)
       {
         console.log($('#form').serialize());
       },
       error: function(err){
         console.log(err);
       }
   });
  });
};
