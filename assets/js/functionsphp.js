
//Registo de utilizadores consoante o tipo de utilizador
function registaUtilizador(codTipo){
  
  if(codTipo == 1){

    var tipoUtilizador = 1;
    var email = document.getElementById("emailMarca").value;
    var pwd = document.getElementById("pwdMarca").value;
    var nome = document.getElementById("nomeMarca").value;
    var nif = document.getElementById("nifMarca").value;
    var setor = document.getElementById("setorMarca").value;
    var morada = document.getElementById("moradaMarca").value;
    var codp = document.getElementById("codpMarca").value;
    var local = document.getElementById("localMarca").value;
    var distrito = document.getElementById("distritoMarca").value;

  }else if(codTipo == 2){
    
    var tipoUtilizador = 2;
    var email = document.getElementById("emailPS").value;
    var pwd = document.getElementById("pwdPS").value;
    var nome = document.getElementById("nomePS").value;
    var nif = document.getElementById("nifPS").value;
    var setor = document.getElementById("setorPS").value;
    var morada = document.getElementById("moradaPS").value;
    var codp = document.getElementById("codpPS").value;
    var local = document.getElementById("localPS").value;
    var distrito = document.getElementById("distritoPS").value;
  }

  $.ajax({
    type    : 'POST',
    url     : 'actions/gestaoDB.php?op=1',
    data    : {email:email,pwd:pwd,nome:nome,nif:nif,setor:setor,morada:morada,codp:codp,local:local,distrito:distrito,tipoUtilizador:tipoUtilizador},
    success : function(response) {
          //alert(response);
      var res = JSON.parse(response);
      if(res['val'] == 1){
        //acção de sucesso

        window.open('login.php','_self');
      }else{
        //mensagem de erro
        document.location.reload(true);
      }
    }
  });
}

//Cria as dropdowns de setor e distrito consoante o tipo de utilizador
function selectRegisto(value){

  selectSetor(value);
  selectDistrito(value);

}

//Dropdown setor
function selectSetor(value){

  var valueid = value;

  $.ajax({
    type    : 'POST',
    url     : 'actions/gestaoDB.php?op=2',
    data    : {valueid:valueid},
    success : function(response) {
      //alert(response);
      var res = JSON.parse(response);
      if(res['val'] == 1){
        //acção de sucesso

        if(valueid == 1){

          document.getElementById("selSetorMarca").innerHTML=res['msg'];

          $('.simpleSelect').select2();
       
        }else{

          document.getElementById("selSetorPS").innerHTML=res['msg'];

          $('.simpleSelect').select2();
        }
        
      }else{
        //Erro
      }
    }
  });

}

//Dropdown distrito
function selectDistrito(value){

  var valueid = value;

  $.ajax({
    type    : 'POST',
    url     : 'actions/gestaoDB.php?op=3',
    data    : {valueid:valueid},
    success : function(response) {
      //alert(response);
      var res = JSON.parse(response);
      if(res['val'] == 1){
        //acção de sucesso
        if(valueid == 1){
          document.getElementById("selDistritoMarca").innerHTML=res['msg'];

          $('.simpleSelect').select2();
       
        }else{
          document.getElementById("selDistritoPS").innerHTML=res['msg'];

          $('.simpleSelect').select2();
        }
        
      }else{
        //Erro
      }
    }
  });

}

//Login
function login(){

  var userEmail = document.getElementById("emailLog").value;
  var userPass = document.getElementById("pwdLog").value;

  $.ajax({
    type    : 'POST',
    url     : 'actions/gestaoDB.php?op=4',
    data    : {userEmail:userEmail,userPass:userPass},
    success : function(response) {
      //alert(response);
      var res = JSON.parse(response);
      if(res['val'] == 1){
        window.open('adminondustry/index.php','_self');
       
      }else{
        document.getElementById("resLogin").innerHTML=res['msg'];
      }
    }
  });
}

//Altera a password
function alteraPassword(){

  var emailPass = document.getElementById("emailPassChange").value;
  var pwdChange = document.getElementById("pwdChange").value;
  var pwdConfChange = document.getElementById("pwdConfChange").value;

  $.ajax({
    type    : 'POST',
    url     : 'actions/gestaoDB.php?op=5',
    data    : {emailPass:emailPass,pwdChange:pwdChange,pwdConfChange:pwdConfChange},
    success : function(response) {
      //alert(response);
      var res = JSON.parse(response);
      if(res['val'] == 1){
        window.open('login.php','_self');
       
      }else{
        document.getElementById("response").innerHTML = res['msg'];
      }
    }
  });
}