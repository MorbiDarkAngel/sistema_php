<html>

<head>
<link rel=stylesheet type="text/css" href="login.css">
<title>Login</title>
</head>

<body>
<br>

<br><br><br>
<?php
include ('config.php'); //Inclui função de conexão ao banco
session_start(); // starta a sessão


if (@$_REQUEST['botao']=="Entrar")
{
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	
	$query = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' ";
	$result = mysqli_query($con, $query);
	while ($coluna=mysqli_fetch_array($result)) 
	{
		
		$_SESSION["id_usuario"]= $coluna["id_usuario"]; 
		$_SESSION["login"] = $coluna["login"]; 
		$_SESSION["usuarioTipo"] = $coluna["tipo"];

		$niv = $coluna['tipo'];
		if($niv == "USER"){ 
			header("Location: pgUser.php"); 
			exit; 
		}
		
		if($niv == "ADMIN"){ 
			header("Location: pgAdm.php"); 
			exit; 
		}
		
	}
	
}


?>
<div class="title">
<h4>Cadastrar/Iniciar sessão</h4>
</div>
<div id="login">
	
	
<form action=# method=post>&nbsp &nbsp
	

 Login: <br><input type=text name=login>
<br>
<br>
&nbsp &nbsp
Senha: <br><input type=password name=senha>
<input type=submit name=botao value=Entrar>


</form>

</div>
<div class="footer">
<a href="usuario.php">Faça seu cadastro</a>
</div>
</body>




</html>

