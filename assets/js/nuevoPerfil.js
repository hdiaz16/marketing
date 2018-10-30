function login()
 {

    var rolID = $("#rolID").val();
   

    $.ajax({
      method: 'POST',
      url:  "index.php/Login/cambiarPerfil",
      cache: false,
      async: true,
      contentType: 'application/json',
      dataType: 'json',
      data: {
        rolID: rolID
    
      },
      success: function(data)
      {

        console.log('success: ', data);

        
      },
      error: function(err){
        console.log('error: ', err);
      }
    });

}





