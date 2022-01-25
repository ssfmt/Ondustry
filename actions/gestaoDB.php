<?php 

include_once "dbc.php";

$op = $_GET['op'];

/*Registo de Utilizador*/
if($op == 1){
	$msg = "";
	$val = 0;
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$nome = $_POST['nome'];
	$nif = $_POST['nif'];
	$setor = $_POST['setor'];
	$morada = $_POST['morada'];
	$codp = $_POST['codp'];
	$local = $_POST['local'];
	$distrito = $_POST['distrito'];
	$tipoUtilizador = $_POST['tipoUtilizador'];

	$sql = "INSERT INTO utilizador (tipoUtilizador, email, password, nome, nif, setor, morada, localidade, codPostal, distrito) VALUES (".$tipoUtilizador.",'".$email."','".MD5($pwd)."','".$nome."',".$nif.",".$setor.",'".$morada."','".$local."','".$codp."',".$distrito.");";
	    	
	if (mysqli_query($conn,$sql) === TRUE) {

		$msg.="<p>Registo efetuado com sucesso!</p>";
		$val=1;
	}else{
		
		$msg.="<p>Erro!</p>";
	}
	
  	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
  	echo json_encode($res);

/*Criar dropdowns Setor*/
}else if($op == 2){

	$valueid = $_POST['valueid'];
	
	if($valueid == 1){
		$msg = "<label>Setor:</label><br><select class='form-select form-control simpleSelect' id='setorMarca'><option selected disabled></option>";
	}else if($valueid == 2){
		$msg = "<label>Setor:</label><br><select class='form-select form-control simpleSelect' id='setorPS'><option selected disabled></option>";
	}

	$sql = "SELECT codSetor, descricao FROM setor;";
	$result=mysqli_query($conn,$sql);
	if ($result && mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_array($result)) {
			$msg.="<option value=".$row['codSetor'].">".$row['descricao']."</option>;";
			$val=1;
		}
	}else{

		$val=2;
	}

	$msg .= "</select>";

	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
	echo json_encode($res);

/*Criar dropdowns Distritos*/
}else if($op == 3){

	$valueid = $_POST['valueid'];
	
	if($valueid == 1){
		$msg = "<label>Distrito:</label><br><select class='form-select form-control simpleSelect' id='distritoMarca'><option selected disabled></option>";
	}else if($valueid == 2){
		$msg = "<label>Distrito:</label><br><select class='form-select form-control simpleSelect' id='distritoPS'><option selected disabled></option>";
	}

	$sql = "SELECT codDistrito, descricao FROM distrito;";
	
	$result=mysqli_query($conn,$sql);

	if ($result && mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_array($result)) {
			$msg.="<option value=".$row['codDistrito'].">".$row['descricao']."</option>;";
			$val=1;
		}
	}else{

		$val=2;
	}

	$msg .= "</select>";

	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
	echo json_encode($res);

/*Login*/
}else if($op == 4){
	session_start();
	$msg = "";
	$val = 0;
	$userEmail = $_POST['userEmail'];
	$userPass = $_POST['userPass'];

	$sql = "SELECT * from utilizador WHERE email = '".$userEmail."';";
	    	
	$result=mysqli_query($conn,$sql);

	if ($result && mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_array($result)) {
			if($row['PASSWORD'] == MD5($userPass)){
				$val=1;
				$_SESSION['userID'] = $row['idUtilizador'];
				$_SESSION['userType'] = $row['tipoUtilizador'];
				$_SESSION['userName'] = $row['nome'];
				$_SESSION['userSetor'] = $row['setor'];
			}else{
				$msg.="Erro! Password incorreta!";
				$val=2;
			}
		}
	}else{
		$msg .= "Erro! O e-mail que indicou não se encontra registado!";
		$val=3;
	}

	$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
	echo json_encode($res);

//Mudar password
}else if($op == 5){
	$msg = "";
	$val = 0;
	$emailPass = $_POST['emailPass'];
	$pwdChange = $_POST['pwdChange'];
	$pwdConfChange = $_POST['pwdConfChange'];

	if($pwdChange == $pwdConfChange){
		$sql = "UPDATE utilizador SET password = '".MD5($pwdChange)."' WHERE utilizador.email = '".$emailPass."';";
	    	
		if (mysqli_query($conn,$sql) === TRUE) {

			$val=1;
		}else{
			
			$val=2;
		}
		$res = array("msg"=>$msg,"val"=>$val,"sql"=>$sql);
		echo json_encode($res);

	}else{
		$msg .= "Erro! As passwords inseridas não são idênticas.";

		$res = array("msg"=>$msg,"val"=>$val);
		echo json_encode($res);
	}

}

?>