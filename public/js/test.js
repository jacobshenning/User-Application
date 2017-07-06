

console.log('Script has loaded');

if (typeof(Storage) !== "undefined") {
  if(localStorage.token !== undefined && localStorage.token !== null) {
    console.log('we have a token');
  } else {
    console.log('we have no tokens');
  }
} else {
  alert("you suck...");
}

$( "#Login" ).click(function() {

  // Get credentials
  var name = 'testclient';
  var pass = 'testpass';

  // Send credentials
  $.ajax({
    type: 'POST',
    dataType: 'json',
    url: 'http://user.jacobshenning.com/api/token',
    data: { grant_type: 'client_credentials', client_id: name, client_secret: pass },
    success: function (data) {
      object = data;
      localStorage.token = object['access_token'];
      console.log(localStorage.token);
    },
    error: function (data) {
      console.log(data);
    }
  });
});

$( "#Access" ).click(function() {

  // Get credentials
  var token = localStorage.token;
  var req = 'messages';

  // Send credentials
  $.ajax({
    type: 'POST',
    dataType: 'json',
    url: 'http://user.jacobshenning.com/api/controller',
    data: { access_token: token, request: req },
    success: function (data) {
      console.log(data);
    },
    error: function (data) {
      console.log(data);
    }
  });
});

$( "#Clear" ).click(function() {
  localStorage.token = null;
});
