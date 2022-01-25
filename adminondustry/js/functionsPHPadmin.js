/*Logout*/
function logout(){
	
	$.ajax({
	type    : 'POST',
	url     : '../actions/gestaoDBadmin.php?op=1',
	data    : {},
		success : function(response) {
			//alert(response);
			var res = JSON.parse(response);
			if(res['val'] == 1){
			   //acção de sucesso

			   window.open('../index.php','_self');
			    
			}else{
			   //Erro
			}
		}
	});
}

/*Tabela Oportunidades*/
function tabelaOportunidades(){
	
	$.ajax({
	type    : 'POST',
	url     : '../actions/gestaoDBadmin.php?op=2',
	data    : {},
		success : function(response) {
			//alert(response);
			var res = JSON.parse(response);
			if(res['val'] == 1){
			   //acção de sucesso

			   document.getElementById("tableOportunidades").innerHTML=res['msg'];
			    
			}else{
			   //Erro
			}
		}
	});
}

/*Detalhes Oportunidade*/
function detailOportunidade(){

	//Vai buscar o id ao endereço da página
	var baseUrl = (window.location).href;
	var returnId = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);

	$.ajax({
	type    : 'POST',
	url     : '../actions/gestaoDBadmin.php?op=3',
	data    : {idoportunidade:returnId},
		success : function(response) {
			//alert(response);
			var res = JSON.parse(response);
			console.log(res);
			if(res['val'] == 1){
			   //acção de sucesso
			   
			   document.getElementById("details").innerHTML=res['msg'];
			   document.getElementById("tituloDetail").innerHTML=res['title'];
			   document.getElementById("cardMarca").innerHTML=res['marca'];
			    
			}else{
			   //Erro
			}
		}
	});
}

/*Mostrar formulário bid*/
function mostraFormBid(){

	var x = document.getElementById("divBids");
  	
  	if (x.style.display === "block") {
	    x.style.display = "none";
	} else {
	    x.style.display = "block";
	}
}

//Gravar bid na bd
function guardaBid(){

	var x = document.getElementById("divBids");
  	
	if (x.style.display === "block") {
    	x.style.display = "none";
	}

	//Vai buscar o id ao endereço da página
	var baseUrl = (window.location).href;
	var returnId = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);

	var capacidade = document.getElementById("capacidadeBid").value;
    var orcamento = document.getElementById("orcamentoBid").value;
    var prazo = document.getElementById("prazoBid").value;
    var descricao = document.getElementById("descricaoBid").value;

    $.ajax({
    type    : 'POST',
    url     : '../actions/gestaoDBadmin.php?op=4',
    data    : {capacidade:capacidade,orcamento:orcamento,prazo:prazo,descricao:descricao,oportunidade:returnId},
    success : function(response) {
      //alert(response);
      var res = JSON.parse(response);
      if(res['val'] == 1){
        //acção de sucesso
        document.getElementById("capacidadeBid").value="";
        document.getElementById("orcamentoBid").value="";
        document.getElementById("prazoBid").value="";
        document.getElementById("descricaoBid").value="";

        document.getElementById("respostaBids").innerHTML=res['msg'];
      }else{
        //mensagem de erro
         document.getElementById("respostaBids").innerHTML=res['msg'];
      }
    }
  });
}

//Tabela de bids - Prestadores de Serviços
function tabelaBids(){
	$.ajax({
	type    : 'POST',
	url     : '../actions/gestaoDBadmin.php?op=5',
	data    : {},
		success : function(response) {
			//alert(response);
			var res = JSON.parse(response);
			if(res['val'] == 1){
			   //acção de sucesso

			   document.getElementById("tableBids").innerHTML=res['msg'];
			    
			}else{
			   //Erro
			}
		}
	});
}

/*Detalhes Bid*/
function detailBids(){

	//Vai buscar o id ao endereço da página
	var baseUrl = (window.location).href;
	var returnId = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);

	$.ajax({
	type    : 'POST',
	url     : '../actions/gestaoDBadmin.php?op=6',
	data    : {idbid:returnId},
		success : function(response) {
			//alert(response);
			var res = JSON.parse(response);
			//console.log(res);
			if(res['val'] == 1){
			   //acção de sucesso
			   
			   document.getElementById("detailsBid").innerHTML=res['msg'];
			   document.getElementById("tituloDetailBid").innerHTML=res['title'];
			   document.getElementById("cardPS").innerHTML=res['card'];
			    
			}else{
			   //Erro
			}
		}
	});
}

//Devolve os dados do dashboard/index admin
function dashboardData(){

	$.ajax({
	type    : 'POST',
	url     : '../actions/gestaoDBadmin.php?op=7',
	data    : {},
		success : function(response) {
			//alert(response);
			var res = JSON.parse(response);
			console.log(res);
			if(res['val'] == 1){
			   //acção de sucesso
			   
         //Marcas e prestadores
			   document.getElementById("staticOportunidadesAtivas").innerHTML=res['staticOportunidadesAtivas'];
			   document.getElementById("tableOportunidadesDashBoard").innerHTML=res['msg'];
			   //Para marcas
         document.getElementById("staticOportunidadesConcluidas").innerHTML=res['staticOportunidadesConcluidas'];
			   document.getElementById("staticOportunidadesAtribuidas").innerHTML=res['staticOportunidadesAtribuidas'];
         document.getElementById("staticBids").innerHTML=res['staticBids'];
			   //Para prestadores
         document.getElementById("staticBidsAbertas").innerHTML=res['staticBidsAbertas'];
         document.getElementById("staticBidsAceites").innerHTML=res['staticBidsAceites'];
			   document.getElementById("staticBidsRecusadas").innerHTML=res['staticBidsRecusadas'];
 
			}else{
			   //Erro
			}
		}
	});
}

/*Tabela Histórico de Oportunidades*/
function tabelaHistorico(){
	
	$.ajax({
	type    : 'POST',
	url     : '../actions/gestaoDBadmin.php?op=8',
	data    : {},
		success : function(response) {
			//alert(response);
			var res = JSON.parse(response);
			if(res['val'] == 1){
			   //acção de sucesso

			   document.getElementById("tableHistorico").innerHTML=res['msg'];
			    
			}else{
			   //Erro
			}
		}
	});
}

//Alterar estado oportunidade
function alteraEstado(id){

	$.ajax({
	type    : 'POST',
	url     : '../actions/gestaoDBadmin.php?op=9',
	data    : {id:id},
		success : function(response) {
			//alert(response);
			var res = JSON.parse(response);
			if(res['val'] == 1){
			   //acção de sucesso

			   	document.location.reload(true);
			    
			}else{
			   //Erro
			}
		}
	});

}

//Cancela oportunidades
function cancelaOportunidade(id){
	$.ajax({
	type    : 'POST',
	url     : '../actions/gestaoDBadmin.php?op=10',
	data    : {id:id},
		success : function(response) {
			//alert(response);
			var res = JSON.parse(response);
			if(res['val'] == 1){
			   //acção de sucesso

			   	document.location.reload(true);
			    
			}else{
			   //Erro
			}
		}
	});
}

/*Select tipo oportunidade*/
function selectTipo(){

  $.ajax({
    type    : 'POST',
    url     : '../actions/gestaoDBadmin.php?op=11',
    data    : {},
    success : function(response) {
      //alert(response);
      var res = JSON.parse(response);
      if(res['val'] == 1){
        
        document.getElementById("selTipoOportunidade").innerHTML=res['msg'];

      }else{
        //Erro
      }
    }
  });

}

/*Cria nova oportunidade*/
function guardaOportunidade(){

	var tipoOp = document.getElementById("tipoOportunidade").value;
    var quantOp = document.getElementById("quantidadeOportunidade").value;
    var prazoOp = document.getElementById("prazoOportunidade").value;
    var orcOp = document.getElementById("orcamentoOportunidade").value;
    var descOp = document.getElementById("descricaoOportunidade").value;

    $.ajax({
    type    : 'POST',
    url     : '../actions/gestaoDBadmin.php?op=12',
    data    : {tipoOp:tipoOp,quantOp:quantOp,prazoOp:prazoOp,orcOp:orcOp,descOp:descOp},
    success : function(response) {
      //alert(response);
      var res = JSON.parse(response);
      if(res['val'] == 1){
        //acção de sucesso
        document.getElementById("tipoOportunidade").value="";
        document.getElementById("quantidadeOportunidade").value="";
        document.getElementById("prazoOportunidade").value="";
        document.getElementById("orcamentoOportunidade").value="";
        document.getElementById("descricaoOportunidade").value="";

        document.getElementById("respostaOportunidade").innerHTML=res['msg'];
      }else{
        //mensagem de erro
         document.getElementById("respostaOportunidade").innerHTML=res['msg'];
      }
    }
  });
}

//Tabela de bids de uma oportunidade- Marcas
function tabelaBidsOportunidade(){
	
	//Vai buscar o id ao endereço da página
	var baseUrl = (window.location).href;
	var returnId = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);

	$.ajax({
	type    : 'POST',
	url     : '../actions/gestaoDBadmin.php?op=13',
	data    : {idOp:returnId},
		success : function(response) {
			//alert(response);
			var res = JSON.parse(response);
			if(res['val'] == 1){
			   //acção de sucesso

			   document.getElementById("tableBidsOportunidade").innerHTML=res['msg'];
			    
			}else{
			   //Erro
			}
		}
	});
}

//Atribuir a oportunidade a uma bid, mudar o estado das outras bids e mudar estado da oportunidade

function atribuirBidOportunidade(id, idOportunidade){

	$.ajax({
	type    : 'POST',
	url     : '../actions/gestaoDBadmin.php?op=14',
	data    : {id:id,idOportunidade:idOportunidade},
		success : function(response) {
			//alert(response);
			var res = JSON.parse(response);
			if(res['val'] == 1){
			   //acção de sucesso

			   document.location.reload(true);
			    
			}else{
			   //Erro
			}
		}
	});

}

/*Detalhes Perfil como visitante*/
function consultarPerfil(){

	//Vai buscar o id ao endereço da página
	var baseUrl = (window.location).href;
	var returnId = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);

	$.ajax({
	type    : 'POST',
	url     : '../actions/gestaoDBadmin.php?op=15',
	data    : {id:returnId},
		success : function(response) {
			//alert(response);
			var res = JSON.parse(response);
			//console.log(res);
			if(res['val'] == 1){
			   //acção de sucesso
			   
			   document.getElementById("detailsPerfil").innerHTML=res['msg'];
			   document.getElementById("tituloPerfil").innerHTML=res['title'];
			    
			}else{
			   //Erro
			}
		}
	});
}

/*Detalhes User Profile (proprio user)*/
function userProfile(){

	$.ajax({
	type    : 'POST',
	url     : '../actions/gestaoDBadmin.php?op=16',
	data    : {},
		success : function(response) {
			//alert(response);
			var res = JSON.parse(response);
			//console.log(res);
			if(res['val'] == 1){
			   //acção de sucesso
			   
			   document.getElementById("detailsUserProfile").innerHTML=res['msg'];
			    
			}else{
			   //Erro
			}
		}
	});
}

//Select Setor Edita Profile
function selectSetorProfile(){

  $.ajax({
    type    : 'POST',
    url     : '../actions/gestaoDBadmin.php?op=17',
    data    : {},
    success : function(response) {
      //alert(response);
      var res = JSON.parse(response);
      if(res['val'] == 1){
        //acção de sucesso
        
          document.getElementById("selSetorProfile").innerHTML=res['msg'];

          $('.simpleSelect').select2();
       
      }else{
        //Erro
      }
    }
  });

}

//Select Distrito Edita Profile
function selectDistritoProfile(){

  $.ajax({
    type    : 'POST',
    url     : '../actions/gestaoDBadmin.php?op=18',
    data    : {},
    success : function(response) {
      //alert(response);
      var res = JSON.parse(response);
      if(res['val'] == 1){
        //acção de sucesso
        
          document.getElementById("selDistritoProfile").innerHTML=res['msg'];

          $('.simpleSelect').select2();
       
      }else{
        //Erro
      }
    }
  });

}

//Editar o perfil
function editaPerfil(){

    var email = document.getElementById("alteraEmail").value;
    var pwd = document.getElementById("alteraPass").value;
    var nome = document.getElementById("alteraNome").value;
    var nif = document.getElementById("alteraNif").value;
    var setor = document.getElementById("alteraSetor").value;
    var morada = document.getElementById("alteraMorada").value;
    var codPostal = document.getElementById("alteraCodPostal").value;
    var local = document.getElementById("alteraLocalidade").value;
    var distrito = document.getElementById("alteraDistrito").value;
    
    $.ajax({
	    type    : 'POST',
	    url     : '../actions/gestaoDBadmin.php?op=19',
	    data    : {email:email,pwd:pwd,nome:nome,nif:nif,setor:setor,morada:morada,codPostal:codPostal,local:local,distrito:distrito},
	    success : function(response) {
	          //alert(response);
	      var res = JSON.parse(response);
	      if(res['val'] == 1){
	        //acção de sucesso

	        document.location.reload(true);

	        document.getElementById("resposta").innerHTML=res['msg'];
	      }else{
	        //mensagem de erro

	        document.location.reload(true);
	        
	        document.getElementById("resposta").innerHTML=res['msg'];
	      }
    }
  });
}