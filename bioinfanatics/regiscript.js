$('document').ready(function(){
 //alert("in ready!")
 var username_state = false;
 $('#username').on('blur', function(){
  var username = $('#username').val();
  if (username == '') {
  	username_state = false;
  	return;
  }
  $.ajax({
    url: 'register.php',
    type: 'post',
    data: {
	'username_check':1,
    	'username' : username,
    },
    success: function(response){
      //alert(response);
      if (response == 'taken' ) {
      	username_state = false;
      	$('#username').parent().removeClass();
      	$('#username').parent().addClass("form_error");
      	$('#username').siblings("span").text('Ooops... Username already exists');
      }else if (response == 'not_taken') {
      	username_state = true;
      	$('#username').parent().removeClass();
      	$('#username').parent().addClass("form_success");
      	$('#username').siblings("span").text('Username available');
      }
    }
  });
 });
  //alert("done ajax");

 $('#reg_btn').on('click', function(){
 	var username = $('#username').val();
 	var email = $('#email').val();
 	var password = $('#password').val();
 	if (username_state == false || username=='') {
	  $('#error_msg').text('Registration failed');
	}else{
      //alert("proceed");
      // proceed with form submission
      $.ajax({
      	url: 'register.php',
      	type: 'post',
      	data: {
      		'save' : 1,
      		'username' : username,
      		'password' : password,
      	},
      	success: function(response){
		alert(response);
      		$('#username').val('');
      		$('#password').val('');
		window.open("./home.php");
      	}
      });
 	}
 });
})

