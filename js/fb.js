 var loaded =false;
 window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '102517019918875', // App ID from the App Dashboard
      channelUrl : 'http://word-addiction.azurewebsites.net/game.html', // Channel File for x-domain communication
      status     : true, // check the login status upon init?
      cookie     : true, // set sessions cookies to allow your server to access the session?
      xfbml      : true  // parse XFBML tags on this page?
    });
	
  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); 
	 js.id = id; 
	 js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));

    // Additional initialization code such as adding Event Listeners goes here
	FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    // connected
  } else if (response.status === 'not_authorized') {
    // not_authorized
  } else {
    // not_logged_in
	login();
  }
 });

  };

function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
        console.log('Good to see you, ' + response.name + '.');
    });
}

function login() {
    FB.login(function(response) {
        if (response.authResponse) {
            // connected
        } else {
            // cancelled
        }
    });
}
function trylogin() {
	if(loaded) 
	login();
	else
	console.log('sdk not loaded');
}

  