
var req = [];

var reqString =[];

var con = [];

var conString =[];


agregarRequisitos = function(){
 

  var requ = $("#req").val();

  reqString.push(requ);


  var requisitosString

  var objets = { cumplida: false  };

  objets.nombre = req;

  req.push(objets);

  requisitosString = reqString.join("\n");

  $("#textReq").val(requisitosString);

  $("#req").val("");


}


agregarCondiciones = function(){
 

  var cond = $("#cond").val();

  conString.push(cond);


  var requisitosString

  var objets = { cumplida: false  };

  objets.nombre = con;

  con.push(objets);

  requisitosString = conString.join("\n");

  $("#textCond").val(requisitosString);

  $("#cond").val("");


}