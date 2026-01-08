function checkUser(){
  var username = $("#username").val();
  var burl=$('#burl').val();
  var username = $("#username").val();
  username=username.trim();
  username=username.replace(/[^\w\s!?]/g,"");
  $("#username").val(username);
  if(username.length <= 3 ){
     $("#userError").removeClass('text-success')
     $("#userError").addClass('text-danger')
     $("#userError").html("Username too Short");
     $("#btn").prop('disabled', true);
  }else{
    $.ajax({
        url:(burl+"users/username_check"),
        type: "POST",
        data:{
            "username": username
        },
        success:function(data)
        {
          if(data==1){
            $("#userError").removeClass('text-danger')
            $("#userError").addClass('text-success')
            $("#userError").html('Username is Available');
            $("#btn").prop('disabled', false);
          }else{
            $("#userError").addClass('text-danger')
            $("#userError").html('Username is not Available');
            $("#btn").prop('disabled', true);
          }
        }
      });
  }
}

function checkPassword(){
    var password = $("#password").val();
    var cpassword = $("#cpassword").val();
    if(password !== cpassword){
       $("#passwordError").removeClass('text-success')
       $("#passwordError").addClass('text-danger')
       $("#passwordError").html('Passwords Do No Match');
       $("#btn").prop('disabled', true);
    }else{
       $("#passwordError").removeClass('text-danger')
       $("#passwordError").addClass('text-success')
       $("#passwordError").html('Passwords Match');
       $("#btn").prop('disabled', false);
    }
}