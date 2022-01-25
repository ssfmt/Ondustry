<?php 

include_once "dbc.php";

$op = $_GET['op'];

session_start();

/*Logout*/
if($op == 1){
	
	session_unset();
	session_destroy();
	$val=1;
	    	
  	$res = array("val"=>$val);
  	echo json_encode($res);

//Listagem oportunidades ativas
}else if($op == 2){
	$msg = "";
	$val = 0;

	//Listagem oportunidades ativas para os prestadores de serviços - user tipo 2
	if($_SESSION['userType'] == 2){

		$sql = "SELECT oportunidade.idOportunidade AS id, setor.descricao AS setor, tipooportunidade.descricao AS tipo, utilizador.nome AS marca FROM oportunidade, setor, tipooportunidade, utilizador WHERE oportunidade.estado = 1 AND oportunidade.setor = setor.codSetor AND oportunidade.tipo = tipooportunidade.idTipoOportunidade AND oportunidade.marca = utilizador.idUtilizador AND oportunidade.setor = ".$_SESSION['userSetor'].";";
	    	
		$result=mysqli_query($conn,$sql);
		if ($result && mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_array($result)) {
				$msg.="<tr>
							<td>".$row['id']."<a class='btn btn-warning btn-sm' style='float: right;' href='detailOportunidade.php?id=".$row['id']."'>Detalhes</a></td>
							<td>".$row['setor']."</td>
							<td>".$row['tipo']."</td>
							<td>".$row['marca']."</td>
						</tr>";
				$val=1;
			}
		}else{
			$msg.="<tr>
						<td>Sem oportunidades registadas</tr>
					</td>
				</tbody>
			</table>";
			$val=2;
		}
	//Listagem oportunidades ativas para as marcas - user tipo 1
	}else if($_SESSION['userType'] == 1){
		$sql = "SELECT 
					oportunidade.idOportunidade AS id,  
					setor.descricao AS setor, 
					tipooportunidade.descricao AS tipo, 
					utilizador.nome AS marca 
				FROM oportunidade, setor, tipooportunidade, utilizador 
				WHERE oportunidade.estado = 1
				AND oportunidade.setor = setor.codSetor 
				AND oportunidade.tipo = tipooportunidade.idTipoOportunidade 
				AND utilizador.idUtilizador = oportunidade.marca
				AND oportunidade.marca = ".$_SESSION['userID'].";";
	    	
		$result=mysqli_query($conn,$sql);
		if ($result && mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_array($result)) {
				$msg.="<tr>
							<td>".$row['id']."<a class='btn btn-warning btn-sm' style='float: right;' href='detailOportunidade.php?id=".$row['id']."'>Detalhes</a></td>
							<td>".$row['setor']."</td>
							<td>".$row['tipo']."</td>
						</tr>";
				$val=1;
			}
		}else{
			$msg.="<tr>
						<td>Sem oportunidades registadas</tr>
					</td>
				</tbody>
			</table>";
			$val=2;
		}
	}

	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
	echo json_encode($res);

//Detalhes oportunidade
}else if($op == 3){
	$msg = "";
	$title = "";
	$marca = "";
	$val = 0;
	$idoportunidade = $_POST['idoportunidade'];

	$sql = "SELECT 
				oportunidade.idOportunidade AS id, 
				setor.descricao AS setor, 
				tipooportunidade.descricao AS tipo, 
				utilizador.idUtilizador AS idUser,
				utilizador.nome AS marca, 
				utilizador.localidade AS local, 
				oportunidade.quantidade AS quantidade, 
				oportunidade.prazo AS prazo, 
				oportunidade.orcamento AS orcamento, 
				oportunidade.descricao AS descricao 
			FROM oportunidade, setor, tipooportunidade, utilizador 
			WHERE 
				oportunidade.setor = setor.codSetor 
				AND oportunidade.tipo = tipooportunidade.idTipoOportunidade 
				AND oportunidade.marca = utilizador.idUtilizador 
				AND oportunidade.idOportunidade = ".$idoportunidade."";
	    	
	$result=mysqli_query($conn,$sql);
	if ($result && mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_array($result)) {

		$title.="Oportunidade ".$row['id']."";

		$msg.="<div class='row'>
                <div class='col-md-5 pr-md-1'>
                  <div class='form-group'>
                    <label>Setor</label>
                    <input type='text' class='form-control' value='".$row['setor']."' disabled>
                  </div>
                </div>
                <div class='col-md-3 px-md-1'>
                  <div class='form-group'>
                    <label>Tipo</label>
                    <input type='text' class='form-control' value='".$row['tipo']."' disabled>
                  </div>
                </div>
                <div class='col-md-4 pl-md-1'>
                  <div class='form-group'>
                    <label>Quantidade</label>
                    <input type='text' class='form-control' value='".$row['quantidade']."' disabled>
                  </div>
                </div>
              </div>
              <div class='row'>
                <div class='col-md-6 pr-md-1'>
                  <div class='form-group'>
                    <label>Prazo</label>
                    <input type='text' class='form-control' value='".$row['prazo']."' disabled>
                  </div>
                </div>
                <div class='col-md-6 pl-md-1'>
                  <div class='form-group'>
                    <label>Orçamento</label>
                    <input type='text' class='form-control' value='".$row['orcamento']."' disabled>
                  </div>
                </div>
              </div>
              <div class='row'>
                <div class='col-md-8'>
                  <div class='form-group'>
                    <label>Descrição</label>
                    <textarea rows='4' cols='100' class='form-control' disabled>".$row['descricao']."</textarea>
                  </div>
                </div>
              </div>";

        $marca.="<div class='card-body'>
	                <p class='card-text'>
	                  <div class='author'>
	                    <a href='consultaPerfilUser.php?id=".$row['idUser']."' class='linkUser'>".$row['marca']."</a>
	                  </div>
	                </p>
	                <div class='card-description'>
	                    <p><i class='fas fa-map-marker-alt'></i> ".$row['local']."</p>
	                </div>
	              </div>";
		$val=1;
		}	
	}else{
		$val=2;
	}

	$res = array("msg"=>$msg,"title"=>$title,"marca"=>$marca,"val"=>$val,"sql"=>$sql);
	echo json_encode($res);

//Criação de bids
}else if($op == 4){
	$msg = "";
	$val = 0;
	$capacidade = $_POST['capacidade'];
	$orcamento = $_POST['orcamento'];
	$prazo = $_POST['prazo'];
	$descricao = $_POST['descricao'];
	$oportunidade = $_POST['oportunidade'];
	$estado = 1;
	$prestador = $_SESSION['userID'];

	$sql = "INSERT INTO bidsOportunidade (estado, prestador, capacidade, prazo, orcamento, descricao, oportunidade) VALUES (".$estado.",".$prestador.",'".$capacidade."','".$prazo."',".$orcamento.",'".$descricao."',".$oportunidade.");";
	    	
	if (mysqli_query($conn,$sql) === TRUE) {

		$msg="<p style='padding-left: 1rem; padding-top: 2rem'>Bid submetida com sucesso!</p>";
		$val=1;
	}else{
		
		$msg="<p>Erro!</p>";
	}
	
  	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
  	echo json_encode($res);

//Listagem bids
}else if($op == 5){
	$msg = "";
	$val = 0;

	$sql = "SELECT bidsOportunidade.idBid AS id,
				bidsOportunidade.oportunidade AS oportunidade,
				estadoBids.descricao AS estado
				FROM bidsOportunidade, estadobids 
				WHERE bidsOportunidade.estado = estadoBids.idEstado
				AND bidsOportunidade.prestador = ".$_SESSION['userID'].";";
    	
	$result=mysqli_query($conn,$sql);
	if ($result && mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_array($result)) {
			$msg.="<tr>
						<td>".$row['id']."</td>
						<td>".$row['oportunidade']."<a class='btn btn-warning btn-sm' style='float: right' href='detailBid.php?id=".$row['id']."'>Consultar</a></td>
						<td>".$row['estado']."</td>
						<td><a class='btn btn-warning btn-sm' style='margin: auto; width: 30%; display: flex; justify-content: center' href='detailBid.php?id=".$row['id']."'>Consultar</a></td>
					</tr>";
			$val=1;
		}
	}else{
		$msg.="<tr>
					<td>Sem bids registadas</tr>
				</td>
			</tbody>
		</table>";
		$val=2;
	}
	
	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
	echo json_encode($res);

//Detalhes bids
}else if($op == 6){
	$msg = "";
	$title = "";
	$card = "";
	$val = 0;
	$idbid = $_POST['idbid'];

	$sql = "SELECT bidsOportunidade.capacidade AS capacidade, 
				bidsOportunidade.orcamento AS orcamento, 
				bidsOportunidade.prazo AS prazo, 
				bidsOportunidade.descricao AS descricao,
				bidsOportunidade.prestador AS prestador,
				utilizador.nome AS nome,
				utilizador.localidade AS local,
				estadoBids.descricao AS estado
			FROM oportunidade, bidsOportunidade, estadobids, utilizador 
			WHERE 
				bidsOportunidade.estado = estadoBids.idEstado 
				AND bidsOportunidade.oportunidade = oportunidade.idOportunidade
				AND bidsOportunidade.prestador = utilizador.idUtilizador
				AND bidsOportunidade.idBid = ".$idbid.";";
					    	
	$result=mysqli_query($conn,$sql);
	if ($result && mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_array($result)) {

		$title.="Bid ".$idbid."";

		$msg.="<div class='row'>
                  <div class='col-md-5 pr-md-1'>
                    <div class='form-group'>
                      <label>Capacidade de produção</label>
                      <input type='text' class='form-control' value='".$row['capacidade']."' disabled>
                    </div>
                  </div>
                  <div class='col-md-3 px-md-1'>
                    <div class='form-group'>
                      <label>Orçamento</label>
                      <input type='text' class='form-control' value='".$row['orcamento']."' disabled>
                    </div>
                  </div>
                  <div class='col-md-4 pl-md-1'>
                    <div class='form-group'>
                      <label>Prazo</label>
                      <input type='date' class='form-control' value='".$row['prazo']."' disabled>
                    </div>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-md-8'>
                    <div class='form-group'>
                      <label>Descrição</label>
                      <textarea rows='4' cols='100' class='form-control' disabled>".$row['descricao']."</textarea>
                    </div>
                  </div>
                  <div class='col-md-4 pl-md-1'>
                    <div class='form-group'>
                      <label>Estado</label>
                      <input type='text' class='form-control' value='".$row['estado']."' disabled>
                    </div>
                  </div>
                </div>";

    $card.="<div class='card-body'>
	                <p class='card-text'>
	                  <div class='author'>
	                    <a href='consultaPerfilUser.php?id=".$row['prestador']."' class='linkUser'>".$row['nome']."</a>
	                  </div>
	                </p>
	                <div class='card-description'>
	                    <p><i class='fas fa-map-marker-alt'></i> ".$row['local']."</p>
	                </div>
	              </div>";

		}

		$val=1;
	}else{
		$val=2;
	}

	$res = array("msg"=>$msg,"title"=>$title,"card"=>$card,"val"=>$val,"sql"=>$sql);
	echo json_encode($res);

//Criação do dashboard
}else if($op == 7){
	$msg = "";
	$val = 0;
    $staticOportunidadesAtivas = "";
    $staticOportunidadesConcluidas = "";
    $staticOportunidadesAtribuidas = "";
    $staticBids = "";
    $staticBidsAbertas = "";
    $staticBidsAceites = "";
    $staticBidsRecusadas = "";
    
    /*As queries são feitas consoante o tipo de utilizador*/
    if($_SESSION['userType'] == 1) {
        /*Número de oportunidades ativas para a marca com login*/
        $sqlOportunidadesAtivas = "SELECT COUNT(*) as NumOportunidadesAtivas 
                                FROM oportunidade 
                                WHERE oportunidade.estado = 1
                                AND oportunidade.marca = ".$_SESSION['userID'].";";
        $resultSqlOportunidadesAtivas=mysqli_query($conn,$sqlOportunidadesAtivas);
        $rowSqlOportunidadesAtivas = mysqli_fetch_array($resultSqlOportunidadesAtivas);

        if ($resultSqlOportunidadesAtivas) {
			$staticOportunidadesAtivas = $rowSqlOportunidadesAtivas['NumOportunidadesAtivas'];
            $val = 1;
		}else{
			$val = 2;
		}
        
        /*Número de oportunidades concluídas para a marca com login*/
        $sqlOportunidadesConcluidas = "SELECT COUNT(*) as NumOportunidadesConcluidas 
                                FROM oportunidade 
                                WHERE oportunidade.estado = 3
                                AND oportunidade.marca = ".$_SESSION['userID'].";";
        $resultSqlOportunidadesConcluidas=mysqli_query($conn,$sqlOportunidadesConcluidas);
        $rowSqlOportunidadesConcluidas = mysqli_fetch_array($resultSqlOportunidadesConcluidas);

        if ($resultSqlOportunidadesConcluidas) {
			$staticOportunidadesConcluidas = $rowSqlOportunidadesConcluidas['NumOportunidadesConcluidas'];
            $val = 1;
		}else{
			$val = 2;
		}
        
        /*Número de oportunidades atribuidas para a marca com login*/
        $sqlOportunidadesAtribuidas = "SELECT COUNT(*) as NumOportunidadesAtribuidas 
                                FROM oportunidade 
                                WHERE oportunidade.estado = 3
                                AND oportunidade.marca = ".$_SESSION['userID'].";";
        $resultSqlOportunidadesAtribuidas=mysqli_query($conn,$sqlOportunidadesAtribuidas);
        $rowsqlOportunidadesAtribuidas = mysqli_fetch_array($resultSqlOportunidadesAtribuidas);

        if ($resultSqlOportunidadesAtribuidas) {
			$staticOportunidadesAtribuidas = $rowsqlOportunidadesAtribuidas['NumOportunidadesAtribuidas'];
            $val = 1;
		}else{
			$val = 2;
		}

        /*Número de bids de todos os estados para todas as oportunidades da marca com login*/
        $sqlBids = "SELECT COUNT(*) as NumBids 
                                FROM bidsoportunidade, oportunidade
                                WHERE bidsoportunidade.oportunidade = oportunidade.idOportunidade
                                AND oportunidade.marca = ".$_SESSION['userID'].";";
        $resultSqlBids=mysqli_query($conn,$sqlBids);
        $rowsSqlBids = mysqli_fetch_array($resultSqlBids);

        if ($resultSqlBids) {
			$staticBids = $rowsSqlBids['NumBids'];
            $val = 1;
		}else{
			$val = 2;
		}
        
        /*Tabela com as últimas 5 oportunidades da marca com login*/
        $sqlTable = "SELECT 
					    oportunidade.idOportunidade AS id,  
					    setor.descricao AS setor, 
					    tipooportunidade.descricao AS tipo 
                    FROM oportunidade, setor, tipooportunidade, utilizador 
                    WHERE oportunidade.estado = 1
                    AND oportunidade.setor = setor.codSetor 
                    AND oportunidade.tipo = tipooportunidade.idTipoOportunidade 
                    AND utilizador.idUtilizador = oportunidade.marca
                    AND oportunidade.marca = ".$_SESSION['userID']."
                    ORDER BY oportunidade.idOportunidade DESC LIMIT 5;";
        $resultSqlTable=mysqli_query($conn,$sqlTable);
        
        if ($resultSqlTable && mysqli_num_rows($resultSqlTable)>0) {
			while ($row=mysqli_fetch_array($resultSqlTable)) {
				$msg.="<tr>
							<td>".$row['id']."<a class='btn btn-warning btn-sm' style='float: right;' href='detailOportunidade.php?id=".$row['id']."'>Detalhes</a></td>
							<td>".$row['setor']."</td>
							<td>".$row['tipo']."</td>
						</tr>";
				$val=1;
			}
		}else{
			$msg.="<tr>
						<td>Sem oportunidades registadas</tr>
					</td>
				</tbody>
			</table>";
			$val=2;
		}

    } elseif ($_SESSION['userType'] == 2) {

        /*Número de oportunidades ativas de todas as marcas*/
        $sqlOportunidadesAtivas = "SELECT COUNT(*) as NumOportunidadesAtivas 
                                FROM oportunidade 
                                WHERE oportunidade.estado = 1
                                AND oportunidade.setor = ".$_SESSION['userSetor'].";";
        $resultSqlOportunidadesAtivas=mysqli_query($conn,$sqlOportunidadesAtivas);
        $rowsSqlOportunidadesAtivas = mysqli_fetch_array($resultSqlOportunidadesAtivas);

        if ($resultSqlOportunidadesAtivas) {
			$staticOportunidadesAtivas = $rowsSqlOportunidadesAtivas['NumOportunidadesAtivas'];
            $val = 1;
		}else{
			$val = 2;
		}
        
        /*Número de bids abertas do PS com login*/
        $sqlBidsAbertas = "SELECT COUNT(*) as NumBidsAbertas 
                                FROM bidsoportunidade
                                WHERE bidsoportunidade.estado = 1
                                AND bidsoportunidade.prestador = ".$_SESSION['userID'].";";
        $resultSqlBidsAbertas=mysqli_query($conn,$sqlBidsAbertas);
        $rowsSqlBidsAbertas = mysqli_fetch_array($resultSqlBidsAbertas);

        if ($resultSqlBidsAbertas) {
			$staticBidsAbertas = $rowsSqlBidsAbertas['NumBidsAbertas'];
            $val = 1;
		}else{
			$val = 2;
		}
        
        /*Número de bids aceites do PS com login*/
        $sqlBidsAceites = "SELECT COUNT(*) as NumBidsAceites 
                                FROM bidsoportunidade
                                WHERE bidsoportunidade.estado = 2
                                AND bidsoportunidade.prestador = ".$_SESSION['userID'].";";
        $resultSqlBidsAceites=mysqli_query($conn,$sqlBidsAceites);
        $rowsSqlBidsAceites = mysqli_fetch_array($resultSqlBidsAceites);

        if ($resultSqlBidsAceites) {
			$staticBidsAceites = $rowsSqlBidsAceites['NumBidsAceites'];
            $val = 1;
		}else{
			$val = 2;
		}
        
        /*Número de bids recusadas do PS com login*/
        $sqlBidsRecusadas = "SELECT COUNT(*) as NumBidsRecusadas 
                                FROM bidsoportunidade
                                WHERE bidsoportunidade.estado = 3
                                AND bidsoportunidade.prestador = ".$_SESSION['userID'].";";
        $resultSqlBidsRecusadas=mysqli_query($conn,$sqlBidsRecusadas);
        $rowsSqlBidsRecusadas = mysqli_fetch_array($resultSqlBidsRecusadas);

        if ($resultSqlBidsRecusadas) {
			$staticBidsRecusadas = $rowsSqlBidsRecusadas['NumBidsRecusadas'];
            $val = 1;
		}else{
			$val = 2;
		}
        
        /*Tabela com as últimas 5 oportunidades criadas por todas as marcas*/
        $sqlTable = "SELECT oportunidade.idOportunidade AS id,  
					    setor.descricao AS setor, 
					    tipooportunidade.descricao AS tipo, 
					    utilizador.nome AS marca 
                    FROM oportunidade, setor, tipooportunidade, utilizador 
                    WHERE oportunidade.estado = 1
                    AND oportunidade.setor = setor.codSetor 
                    AND oportunidade.tipo = tipooportunidade.idTipoOportunidade 
                    AND utilizador.idUtilizador = oportunidade.marca
                    AND oportunidade.setor = ".$_SESSION['userSetor']."
                    ORDER BY oportunidade.idOportunidade DESC LIMIT 5;";
        $resultSqlTable=mysqli_query($conn,$sqlTable);

        if ($resultSqlTable && mysqli_num_rows($resultSqlTable)>0) {
			while ($row=mysqli_fetch_array($resultSqlTable)) {
				$msg.="<tr>
							<td>".$row['id']."<a class='btn btn-warning btn-sm' style='float: right;' href='detailOportunidade.php?id=".$row['id']."'>Detalhes</a></td>
							<td>".$row['setor']."</td>
							<td>".$row['tipo']."</td>
                            <td>".$row['marca']."</td>
						</tr>";
				$val=1;
			}
		}else{
			$msg.="<tr>
						<td>Sem oportunidades registadas</tr>
					</td>
				</tbody>
			</table>";
			$val=2;
		}
    }

    /*Construção da resposta*/
        $res = array("val"=>$val,
                    "staticOportunidadesAtivas"=>$staticOportunidadesAtivas, 
                    "staticOportunidadesConcluidas"=>$staticOportunidadesConcluidas,
                    "staticOportunidadesAtribuidas"=>$staticOportunidadesAtribuidas,
                    "staticBids"=>$staticBids,
                    "staticBidsAbertas"=>$staticBidsAbertas,
                    "staticBidsAceites"=>$staticBidsAceites,
                    "staticBidsRecusadas"=>$staticBidsRecusadas,
                    "msg"=>$msg);

    echo json_encode($res);

/*Tabela Histórico de Oportunidades*/
}else if($op == 8){
	$msg = "";
	$val = 0;
	
	$sql = "SELECT 
					oportunidade.idOportunidade AS id, 
					estadooportunidade.descricao AS estado, 
					setor.descricao AS setor, 
					tipooportunidade.descricao AS tipo
				FROM oportunidade, estadooportunidade, setor, tipooportunidade
				WHERE oportunidade.setor = setor.codSetor 
				AND oportunidade.tipo = tipooportunidade.idTipoOportunidade 
				AND estadooportunidade.idEstadoOportunidade = oportunidade.estado
				AND oportunidade.marca = ".$_SESSION['userID']."
				ORDER BY oportunidade.idOportunidade DESC;";
	    	
		$result=mysqli_query($conn,$sql);
		if ($result && mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_array($result)) {
				$msg.="<tr>
							<td>".$row['id']."<a class='btn btn-warning btn-sm' style='float: right;' href='detailOportunidade.php?id=".$row['id']."'>Detalhes</a></td>
							<td>".$row['setor']."</td>
							<td>".$row['tipo']."</td>
							<td>".$row['estado']."";
				
				if($row['estado'] == 'Atribuída'){
					$msg.="<button class='btn btn-warning btn-sm' style='float: right;' onclick='alteraEstado(".$row['id'].");'>Marcar como concluída</button></td>
						</tr>";
				}else if($row['estado'] == 'Ativa'){
				 	$msg.="<button class='btn btn-danger btn-sm' style='float: right;' onclick='cancelaOportunidade(".$row['id'].");'>Cancelar</button></td>
						</tr>";
				}else{
					$msg.="</td>
						</tr>";
				}

				$val=1;
			}
		}else{
			$msg.="<tr>
						<td>Sem oportunidades registadas</tr>
					</td>
				</tbody>
			</table>";
			$val=2;
		}

	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
	echo json_encode($res);

//Alterar estado oportunidade
}else if($op == 9){
	$msg = "";
	$val = 0;

	$id = $_POST['id'];
	
	$sql = "UPDATE oportunidade SET oportunidade.estado = 3 WHERE oportunidade.idOportunidade = ".$id.";"; 

	if (mysqli_query($conn,$sql) === TRUE) {

		$msg="<p>Sucesso!</p>";
		$val=1;
	}else{
		
		$msg="<p>Erro!</p>";
	}
	
  	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
  	echo json_encode($res);

//Cancela oportunidades
}else if($op == 10){
	$msg = "";
	$val = 0;
	
	$sqlBid = "DELETE FROM bidsOportunidade WHERE bidsOportunidade.oportunidade = ".$id.";"; 

	if (mysqli_query($conn,$sqlBid) === TRUE) {

		$sql = "DELETE FROM oportunidade WHERE oportunidade.idOportunidade = ".$id.";"; 

		if (mysqli_query($conn,$sql) === TRUE) {

			$msg="<p>Sucesso!</p>";
			$val=1;
		}else{
			$msg="<p>Erro!</p>";
		}

	}else{
		$msg="<p>Erro!</p>";
	}
	
	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql, "sqlBid"=>$sqlBid);
	echo json_encode($res);

/*Select tipo oportunidade*/	
}else if($op == 11){

	$msg = "<label>Tipo</label><br><select class='form-select form-control simpleSelect' id='tipoOportunidade'><option selected disabled></option>";

	$val = 0;

	$sql = "SELECT idTipoOportunidade, descricao FROM tipooportunidade;";
	
	$result=mysqli_query($conn,$sql);
	if ($result && mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_array($result)) {
			$msg.="<option value=".$row['idTipoOportunidade'].">".$row['descricao']."</option>;";
			$val=1;
		}
	}else{

		$val=2;
	}

	$msg .= "</select>";

	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
	echo json_encode($res);

/*Cria nova oportunidade*/	
}else if($op == 12){
	$msg = "";
	$val = 0;
	$tipoOp = $_POST['tipoOp'];
	$quantOp = $_POST['quantOp'];
	$prazoOp = $_POST['prazoOp'];
	$orcOp = $_POST['orcOp'];
	$descOp = $_POST['descOp'];
	$setorOp = $_SESSION['userSetor'];
	$marcaOp = $_SESSION['userID'];
	$estado = 1;

	$sql = "INSERT INTO oportunidade (marca, setor, tipo, quantidade, prazo, orcamento, descricao, estado) VALUES (".$marcaOp.",".$setorOp.",".$tipoOp.",".$quantOp.",'".$prazoOp."',".$orcOp.",'".$descOp."',".$estado.");";
	    	
	if (mysqli_query($conn,$sql) === TRUE) {

		$msg="<p style='padding-left: 1rem; padding-top: 2rem'>Oportunidade submetida com sucesso!</p>";
		$val=1;
	}else{
		
		$msg="<p>Erro!</p>";
	}
	
  	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
  	echo json_encode($res);

//Tabela de bids de uma oportunidade- Marcas
}else if($op == 13){
	//Listagem bids de uma oportunidade
	
	$idOp = $_POST['idOp'];

	$msg = "";
	$val = 0;

	$sql = "SELECT bidsOportunidade.idBid As id,
						bidsOportunidade.oportunidade AS idOportunidade,
						bidsOportunidade.prazo AS prazo,
						bidsOportunidade.capacidade AS capacidade,
						bidsOportunidade.orcamento AS orcamento,
						bidsOportunidade.estado AS estado,
						utilizador.nome AS prestador
				FROM bidsOportunidade, utilizador 
				WHERE utilizador.idUtilizador = bidsoportunidade.prestador
				AND bidsOportunidade.oportunidade = ".$idOp.";";
    	
	$result=mysqli_query($conn,$sql);
	if ($result && mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_array($result)) {
			$msg.="<tr>
						<td>".$row['prestador']."</td>
						<td>".$row['prazo']."</td>
						<td>".$row['capacidade']."</td>
						<td>".$row['orcamento']."</td>
						<td>
							<a class='btn btn-warning btn-sm' style='margin: auto; display: flex; justify-content: center' href='detailBid.php?id=".$row['id']."'>Ver detalhes</a>";

							if($row['estado'] == 2){

								$msg.="<p style='text-align: center;'>Aceite</p></td></tr>";

							}else if($row['estado'] == 3){

								$msg.="<p style='text-align: center;'>Recusada</p></td></tr>";

							}else{
								$msg.="<button class='btn btn-success btn-sm' style='margin-top: 1rem; display: flex; justify-content: center' onclick='atribuirBidOportunidade(".$row['id'].",".$row['idOportunidade'].")'>Atribuir oportunidade</button></td></tr>";
							}
			$val=1;
		}
	}else{
		$msg.="<tr>
					<td>Sem bids registadas</tr>
				</td>
			</tbody>
		</table>";
		$val=2;
	}
	
	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
	echo json_encode($res);

//Atribuir a oportunidade a uma bid, mudar o estado das outras bids e mudar estado da oportunidade
}else if ($op == 14){
	$msg = "";
	$val = 0;

	$id = $_POST['id'];
	$idOportunidade = $_POST['idOportunidade'];
	
	$sql = "UPDATE bidsoportunidade SET bidsoportunidade.estado = 2 WHERE bidsoportunidade.idBid = ".$id.";"; 

	if (mysqli_query($conn,$sql) === TRUE) {

		$sqlOutrasBids = "UPDATE bidsoportunidade 
											SET bidsoportunidade.estado = 3 
											WHERE bidsoportunidade.estado = 1
											AND bidsoportunidade.oportunidade = ".$idOportunidade.";";

		if (mysqli_query($conn,$sqlOutrasBids) === TRUE) {

			$sqlOportunidade = "UPDATE oportunidade
													SET oportunidade.estado = 2
													WHERE oportunidade.idOportunidade =".$idOportunidade.";";

			if (mysqli_query($conn,$sqlOportunidade) === TRUE) {

				$msg="<p>Sucesso!</p>";
				$val=1;
			}
		}
	}else{
		
		$msg="<p>Erro!</p>";
	}
	
  	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql,"sqlOutrasBids"=>$sqlOutrasBids,"sqlOportunidade"=>$sqlOportunidade);
  	echo json_encode($res);

//Detalhes perfil
}else if($op == 15){
	$msg = "";
	$title = "";
	$val = 0;
	$id = $_POST['id'];

	$sql = "SELECT utilizador.nome AS nome,
						utilizador.email AS email,
						setor.descricao AS setor,
						utilizador.localidade AS localidade,
						distrito.descricao AS distrito
			FROM utilizador, setor, distrito 
			WHERE utilizador.setor = setor.codSetor
				AND utilizador.distrito = distrito.codDistrito	
				AND utilizador.idUtilizador = ".$id.";";

	$result=mysqli_query($conn,$sql);

	if ($result && mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_array($result)) {

			$title.=$row['nome'];

			$msg.="<div class='row'>
	                  <div class='col-md-4 pr-md-1'>
	                    <div class='form-group'>
	                      <label>Setor</label>
	                      <input type='text' class='form-control' value='".$row['setor']."' disabled>
	                    </div>
	                  </div>
	                  <div class='col-md-4 px-md-1'>
	                    <div class='form-group'>
	                      <label>Localidade</label>
	                      <input type='text' class='form-control' value='".$row['localidade']."' disabled>
	                    </div>
	                  </div>
	                  <div class='col-md-4 pl-md-1'>
	                    <div class='form-group'>
	                      <label>Distrito</label>
	                      <input type='text' class='form-control' value='".$row['distrito']."' disabled>
	                    </div>
	                  </div>
	                </div>
	                <div class='row'>
	                  <div class='col-md-8 pr-md-1'>
	                    <div class='form-group'>
	                      <label>E-mail</label>
	                      <input type='text' class='form-control' value='".$row['email']."' disabled>
	                    </div>
	                  </div>
	                </div>";
		}	
		$val=1;
	}else{
		$val=2;
	}

	$res = array("msg"=>$msg,"title"=>$title,"val"=>$val,"sql"=>$sql);
	echo json_encode($res);

//Detalhes user profile
}else if($op == 16){
	$msg = "";
	$val = 0;
	$id = $_SESSION['userID'];

	$sql = "SELECT utilizador.email AS email,
			utilizador.password AS password,
			utilizador.nome AS nome,
			utilizador.nif AS nif,
			setor.descricao AS setor,
			utilizador.morada AS morada,
			utilizador.localidade AS localidade,
			utilizador.codPostal AS codPostal,
			distrito.descricao AS distrito
			FROM utilizador, setor, distrito 
			WHERE utilizador.setor = setor.codSetor
				AND utilizador.distrito = distrito.codDistrito	
				AND utilizador.idUtilizador = ".$id.";";

	$result=mysqli_query($conn,$sql);

	if ($result && mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_array($result)) {

			$msg.="<div class='row'>
              <div class='col-md-8 px-md-1'>
                <div class='form-group'>
                  <label>E-mail</label>
                  <input type='text' class='form-control' value='".$row['email']."' id='alteraEmail'>
                </div>
              </div>
              <div class='col-md-4 pl-md-1'>
                <div class='form-group'>
                  <label>Password</label>
                  <input type='password' class='form-control' value='' id='alteraPass'>
                </div>
              </div>
            </div>
            <div class='row'>
            	<div class='col-md-5 pr-md-1'>
                <div class='form-group'>
                  <label>Nome</label>
                  <input type='text' class='form-control' value='".$row['nome']."' id='alteraNome'>
                </div>
              </div>
              <div class='col-md-3 pr-md-1'>
                <div class='form-group'>
                  <label>NIF</label>
                  <input type='number' class='form-control' value='".$row['nif']."' id='alteraNif'>
                </div>
              </div>
              <div class='col-md-4 pr-md-1'>
                <div class='form-group' id='selSetorProfile'>
                                
                </div>
              </div>
            </div>
            <div class='row'>
              <div class='col-md-9 pr-md-1'>
                <div class='form-group'>
                  <label>Morada</label>
                  <input type='text' class='form-control' value='".$row['morada']."' id='alteraMorada'>
                </div>
              </div>
              <div class='col-md-3 pr-md-1'>
                <div class='form-group'>
                  <label>Código Postal</label>
                  <input type='text' class='form-control' value='".$row['codPostal']."' id='alteraCodPostal'>
                </div>
              </div>
            </div>
            <div class='row'>
              <div class='col-md-4 pr-md-1'>
                <div class='form-group'>
                  <label>Localidade</label>
                  <input type='text' class='form-control' value='".$row['localidade']."' id='alteraLocalidade'>
                </div>
              </div>
              <div class='col-md-4 pr-md-1'>
                <div class='form-group' id='selDistritoProfile'>
                                
                </div>
              </div>
            </div>";
		}	
		$val=1;
	}else{
		$val=2;
	}

	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
	echo json_encode($res);

//Select Setor Edita Profile
}else if($op == 17){
	$val = 0;
	$msg = "";
	$sql = "SELECT codSetor, descricao FROM setor;";

	$result=mysqli_query($conn,$sql);

	$msg .= "<label>Setor</label><br><select class='form-select form-control simpleSelect' id='alteraSetor'>";

	if ($result && mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_array($result)) {
			$msg.="<option value=".$row['codSetor']." ";
			if($_SESSION['userSetor'] == $row['codSetor']) {
				$msg.=" selected >".$row['descricao']."</option>;";
			} else {
				$msg.= ">".$row['descricao']."</option>;";
			}
			$val=1;
		}
	}else{

		$val=2;
	}

	$msg .= "</select>";

	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
	echo json_encode($res);

//Select Distrito Edita Profile
}else if($op == 18){

	$val = 0;
	$msg = "";

	$sqlDistritoUser = "SELECT codDistrito as codDistrito FROM distrito, utilizador WHERE utilizador.distrito = distrito.codDistrito AND utilizador.idUtilizador = ".$_SESSION['userID'].";";

	$resultCodDistrito=mysqli_query($conn,$sqlDistritoUser);
	$rowCodDistrito=mysqli_fetch_array($resultCodDistrito);

	$sql = "SELECT distrito.codDistrito as codDistrito, distrito.descricao as descricao FROM distrito;";
	$result=mysqli_query($conn,$sql);

	$msg .= "<label>Distrito</label><br><select class='form-select form-control simpleSelect' id='alteraDistrito'>";

	if ($result && mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_array($result)) {
			$msg.="<option value='".$row['codDistrito']."' ";
			if($rowCodDistrito['codDistrito'] == $row['codDistrito']) {
				$msg.=" selected >".$row['descricao']."</option>;";
			} else {
				$msg.= ">".$row['descricao']."</option>;";
			}
			$val=1;
		}
	}else{

		$val=2;
	}

	$msg .= "</select>";

	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
	echo json_encode($res);

//Editar o perfil
}else if($op == 19){
	$msg = "";
	$val = 0;
	
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$nome = $_POST['nome'];
	$nif = $_POST['nif'];
	$setor = $_POST['setor'];
	$morada = $_POST['morada'];
	$codPostal = $_POST['codPostal'];
	$local = $_POST['local'];
	$distrito = $_POST['distrito'];
	
	$sql = "UPDATE utilizador SET email = '".$email."', 
				password = '".MD5($pwd)."',
				nome = '".$nome."',
				nif = ".$nif.",
				setor = ".$setor.",
				morada = '".$morada."',
				localidade = '".$local."',
				codPostal = '".$codPostal."',
				distrito = ".$distrito."
				WHERE utilizador.idUtilizador = ".$_SESSION['userID'].";";
    	
	if (mysqli_query($conn,$sql) === TRUE) {

		$msg="<p>Perfil alterado com sucesso!</p>";
		$val=1;
	}else{
		
		$msg="<p>Erro</p>";
	}
	
  	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
  	echo json_encode($res);
}
