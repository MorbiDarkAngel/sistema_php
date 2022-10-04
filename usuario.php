<html>

<head>
<link rel=stylesheet type="text/css" href="cadastroUser.css">
<title>Novo Cadastro</title>
<?php include ('config.php');  ?>
</head>

<body>
		
<?php
$id_usuario = @$_REQUEST['id_usuario'];
if (@$_REQUEST['id_usuario'] and !$_REQUEST['botao'])
{
	$query = "
		SELECT * FROM usuario WHERE id_usuario='{$_REQUEST['id_usuario']}'
	";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	//echo "<br> $query";	
	foreach( $row as $key => $value )
	{
		$_POST[$key] = $value;
	}
}

if (@$_REQUEST['botao'] == "Gravar") 
{
	if (!$_REQUEST['id_usuario'])
	{
		$insere = "INSERT into usuario (nome_usuario,senha,tipo, email, login) VALUES 
		('{$_POST['nome_usuario']}', '{$_POST['senha']}', '{$_POST['tipo']}', '{$_POST['email']}','{$_POST['login']}')";
		$result_insere = mysqli_query($con, $insere);
		
		if ($result_insere)echo "<script>alert('Cadastro Realizado');top.location.href='login.php';</script>"; 
		else echo "<script>alert('Cadastro não realizado');top.location.href=usuario.php';</script>"; 
		
	} else 	
	{
		$insere = "UPDATE usuario SET 
		 		tipo = '{$_POST['tipo']}'
					, nome_usuario = '{$_POST['nome_usuario']}'
					, email = '{$_POST['email']}'
					, senha = '{$_POST['senha']}'
					
					

					WHERE id_usuario = '{$_REQUEST['id_usuario']}'
				";
		$result_update = mysqli_query($con, $insere);

		if ($result_update) echo "<h2> Registro atualizado com sucesso!!!</h2>";
		else echo "<h2> Nao consegui atualizar!!!</h2>";
		
	}
}
?>
<div>
<form action="usuario.php" method="post" name="usuario">
<table >
  <tr>
    <td class="title">Cadastro de Usuários</td>
  </tr>
  <tr>
    <td width="131"><?php echo @$_POST['id_usuario']; ?>&nbsp;
  </tr>
  <tr>
    <td>
		<label for="log"> Log in</label>
		<input type="text" id="log" name="login" >
	</td>
  </tr>
  <tr>
    <td>
		<label for="name"> Nome</label>
		<input type="text" id="name"name="nome_usuario" >
	</td>
  </tr>
  <tr>
    <td>
		<label for="email"> E-mail</label>
		<input type="text" id="email" name="email" >
	</td>
  </tr>
  <tr>
    <td>
		<label for="password"> Senha</label>
		<input type="password" id="password "name="senha" >
	</td>
  </tr>
  <tr>
    <td><input type="radio" name="tipo" value="ADM" <?php echo (@$_POST['tipo'] == "USC" ? " checked" : "" );?> > Buscar Serviço
    <input type="radio" name="tipo" value="USER" <?php echo (@$_POST['tipo'] == "USER" ? " checked" : "" );?> > User 
    </td>
  </tr>
  <tr>
	<td>
	<input type="submit" value="Gravar" name="botao"/> 
	<input type="hidden" name="id_usuario" value="<?php echo @$_REQUEST['id_usuario'] ?>" />
	</td>
</tr>

  
	
</table>
<table>

</table>
</form>
</div>


</body>
</html>
