

$( "#Login" ).click(function() {

  // Get credentials
  var name = $('#LoginUsername').val();
  var pass = $('#LoginPassword').val();

  // Send credentials
  $.ajax({
    type: 'POST',
    dataType: 'text',
    url: 'http://snippet.jacobshenning.com/api/login',
    data: { username: name, userpass: pass },
    success: function (data) {
      var response = $.parseJSON(data);
      console.log(response);
      if (response["loggedin"]) {
        SendNotification('success', 'Success', 'You have successfully logged in.');
        location.reload();
      } else {
        console.log('incorrect');
      }
    }
  });
});

$( "#Logout" ).click(function() {

  // Send credentials
  $.ajax({
    type: 'POST',
    dataType: 'text',
    url: 'http://snippet.jacobshenning.com/api/logout',
    success: function (response) {
      console.log(response);
      location.reload();
    }
  });
});

$( "#Signup" ).click(function() {

  // Get credentials
  var name = $('#SignupUsername').val();
  var mail = $('#SignupEmail').val();
  var pass = $('#SignupPassword').val();
  var pass2 = $('#ConfirmPassword').val();

  // Send credentials
  $.ajax({
    type: 'POST',
    dataType: 'text',
    url: 'http://snippet.jacobshenning.com/api/signup',
    data: { username: name, userpass: pass, confirmpass: pass2, useremail: mail },
    success: function (data) {
      var response = $.parseJSON(data);
      console.log(response);
      if (response[0] == "new record created") {
        location.reload();
        console.log('worked');
      } else {
        console.log('incorrect');
      }
    }
  });
});
