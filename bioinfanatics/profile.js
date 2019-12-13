$(document).ready(function(){
  function addProfilePicIn(){
    $('#profile_pic_temp').attr("src","./img_placeholder2.png");
  }
  function addProfilePicOut(){
    $('#profile_pic_temp').attr("src","./img_placeholder.png");
  } 
  function updateCountdown() {
    // 255 is the max message length
    var remaining = 255 - jQuery('#bio').val().length;
    jQuery('.countdown').text(remaining + ' characters remaining.');
  
  }
    $('#bio').click( function(e){
      document.getElementById("bio").removeAttribute('readonly');
      updateCountdown();
      $('#bio').change(updateCountdown);
      $('#bio').keyup(updateCountdown);
    });

    //Handles change of profile pic
    $('#profile_pic_temp').click( function(e){
      document.write("<form action='fileUpload.php' method='post' enctype='multipart/form-data'>Upload a File:<input type='file' name='myfile' id='fileToUpload'><input type='submit' name='submit' value='Upload File Now' ></form>");
    });

    //Handles change of profile pic
    $('#profile_pic_temp').click( function(e){
      document.write("<form action='fileUpload.php' method='post' enctype='multipart/form-data'>Upload a File:<input type='file' name='myfile' id='fileToUpload'><input type='submit' name='submit' value='Upload File Now' ></form>");
    });
    
    //Handles change of bio
    $('#enterBio').click( function(e){
      let bio = $("#bio").val();
      if(bio.length > 255){
        alert("Your bio is too long!");
      }
      else if(confirm("Save your bio?")){
        let user = $("#userName_profile").text();
        //let user = document.getElementById("userName_profile").innerHTML();
        alert(user);
        $.ajax({
            url: './changeProfileProcessing.php',
            type: 'post',
            data: {
                'username' : user,
                'bio' : bio,
            },
            success: function(response){
              alert(response);
              if (response == 'success' ) {
                alert("Your bio has been saved!");
              }
              else if (response == 'failure') {
                alert("Failed to save bio");
                }
            }
          });
      }
      
    });
});
