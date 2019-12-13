$('document').ready(function(){
 //alert("in ready!")
 $('#save_btn').on('click', function(){
 	$.ajax({
    url: './options.php',
    type: 'post',
    data: {
	    'save':1,
    },
    success: function(response){
      //alert(response);
      if (response == 'failure' ) {
      	alert("Sorry, we could not save your results.");
      }else{
      	alert("Successfully added your results, thank you!");
      }
    }
  });
 });
});
