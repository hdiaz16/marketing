
	<p><a href="#" onClick="logInWithFacebook()">Log In with the JavaScript SDK</a></p>
	<p><?php ?></p>
	<button onclick="post()">POST</button>
<script>

</script>
<script>
  logInWithFacebook = function() {
    FB.login(function(response) {
      if (response.authResponse) {
        console.log('You are logged in &amp; cookie set!');
        $.ajax({
        	url: '../index.php/FacebookController/saveToken',
        	type: 'post',
        	data:{
        		token: response.authResponse.accessToken
        	},
        	success: function(data){
        		//console.log(data);
        		if(!data.status){

			        $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al registrar administrador.',type: 'red',buttons: {
			                  Aceptar: function (e,data) {

			                    setTimeout(function(){window.location.reload(1);},1000);
			                  } 
			              }});
			 

			      }else{


			         $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Accesso a FB recordado',type: 'green',buttons: {
			                  Aceptar: function (e,data) {
			                    setTimeout(function(){window.location.pathname = "marketing/";},1000);
			                   
			                  } 
			              }});


			            

			      } 
        		//setTimeout(function(){window.location.pathname = "marketing/";},1000);
        	},
        	error: function(error){
        		console.log(error);
        	}
        });
        // Now you can redirect the user or do an AJAX request to
        // a PHP script that grabs the signed request from the cookie.
      } else {
        alert('User cancelled login or did not fully authorize.');
      }
    });
    return false;
  };
  window.fbAsyncInit = function() {
    FB.init({
      appId: '922010761336461',
      cookie: true, // This is important, it's not enabled by default
      version: 'v3.2'
    });
  };

  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
