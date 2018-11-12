var scopes = 'manage_pages, publish_pages, pages_show_list';
var page_token = '';

function checkLoginState() {
  FB.getLoginStatus(function (response) {
    console.log(response);
    if (response.status === 'connected') {
      console.log("User is connected");
    } else {
      console.log("Not Logged");
    }
  });
}

function loginFB() {
  console.log('login button');
  FB.login(function (response) {
    if (response.authResponse) {
      testAPI();
    } else {
      console.log("Not Logged");
    }
  }, { scope: scopes });
}

function logoutFB() {
  FB.logout(function (response) { console.log('Logged out') });
}

function testAPI() {
  console.log('Welcome!  Fetching your information.... ');
  FB.api('/me', function (response) {
    console.log('Successful login for: ' + response.name);
  });
}

// This method should receive the page's id as parameter
function getPageToken() {
  FB.api(
    '/791765631161354',
    'GET',
    { "fields": "access_token" },
    function (response) {
      if (!response || response.error) {
        alert('Error occured');
      } else {
        page_token = response.access_token;
      }
    }
  );
}

// This method should receive the message to be post and the page's id to post in
function testPost(body) {
  //checkLoginState();
  //getPageToken();
  //console.log("Publicando en facebook!\n" + page_token);
  FB.api(
    '/791765631161354/feed',
    'POST',
    { message: body, access_token: page_token },
    function (response) {
      if (!response || response.error) {
        alert('Error occured');
      } else {
        alert('Post ID: ' + response.id);
      }
    }
  );
}