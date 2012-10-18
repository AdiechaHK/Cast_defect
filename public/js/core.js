$(document).ready(function(){
  $('.carousel').carousel();
  
  $('#myModal').on('hide', function(){
    $('#ajaxSignInResContainer').remove();
  });

  // SignIn function
  $('#signIn').click(function(){

    var newDiv = $('#ajaxSignInResContainer');
    if(newDiv.length == 0) {
      newDiv = $('<div/>', {
        id: 'ajaxSignInResContainer',
        class : 'waiting alert',
        html: 'Please wait ...'
      });
      $('#myModal .modal-body').append(newDiv);
    }

    // prepare data
    var data = {
      email: $('#inputEmail').val(),
      password: $('#inputPassword').val()
    }

    // AJAX call
    $.ajax({
      type: 'POST',
      url: 'signIn.php',
      data: data,
      success: function(data) {
        var json_data = $.parseJSON(data);
        var class_to_add;
        if(json_data.error){
          if(!($('#ajaxSignInResContainer').hasClass('alert-error')))
            $('#ajaxSignInResContainer').addClass('alert-error');
          $('#ajaxSignInResContainer').html(json_data.content);
        } else {
          if($('#ajaxSignInResContainer').hasClass('alert-error'))
            $('#ajaxSignInResContainer').removeClass('alert-error');
          $('#ajaxSignInResContainer').addClass('alert-success');
          $('#accBox').html(json_data.content);
          $('#myModal').modal('hide');
        }
      },
      fail: function(){
        console.log("Ajax fails");
      }
    });
  });

  // SignOut function
  $('#signOut').click(function(){
    $.ajax({
      type: 'POST',
      url: 'signOut.php',
      success: function(data) {
        var json_data = $.parseJSON(data);
        if(!json_data.error){
          $('#accBox').html(json_data.content);
        }
      },
      fail: function(){
        console.log("Ajax fails");
      }
    });
  });

});