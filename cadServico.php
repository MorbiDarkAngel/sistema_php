<html>
    <head>
    <link rel=stylesheet type="text/css" href="cadastroUser.css">
    <title>Cadastrar Serviço</title>
    <?php include ('config.php');  
        include('verifica.php')
        ?>
    </head>
    <body>
    <?php
        $sql = "Select * from produto where id_produto > 0";
        $result = mysqli_query($con, $sql);

        ?>
           <nav>
            <ul>         
              
                <li><a href='logout.php'>Sair</a></li>

            </ul>
        </nav>
<?php
    $id_usuario = @$_REQUEST['id_produto'];
    if (@$_REQUEST['botao'] == "Gravar") 
    {
        if (!@$_REQUEST['id_produto'])
        {
            $insere = "INSERT into produto (nome_produto, preco, descricao_produto, estado) VALUES 
            ('{$_POST['nome_produto']}','{$_POST['preco']}', '{$_POST['descricao_produto']}','{$_POST['estado']}')";
		    $result_insere = mysqli_query($con, $insere);
            if ($result_insere) echo  "<script>alert('Anúncio inserido com sucesso!);</script>"; header('location: pgUser.php');
            
            

        }else
        {
            $insere = "UPDATE produto SET 
				nome_produto = '{$_POST['nome_produto']}'
					, preco = '{$_POST['preco']}'
					, descricao_produto = '{$_POST['descricao_produto']}'
					
					WHERE id_produto = '{$_REQUEST['id_produto']}'
				";
		$result_update = mysqli_query($con, $insere);

		if ($result_update) echo "<h2> Registro atualizado com sucesso!!!</h2>";
		else echo "<h2> Nao consegui atualizar!!!</h2>";
        }
    }
    ?>
     <div>
<form action=# method="post" name="produto">
<table >
  <tr>
    <td id="title"><h1>Cadastrar Serviço</h1></td>
  </tr>
  <tr>
    <td width="131"><?php echo @$_POST['id_produto']; ?>&nbsp;
  </tr>
  <tr>
    <td>
		<label for="name"> Serviço</label>
    <br>
		<input type="text" id="name"name="nome_produto" maxlenght="20" required >
	</td>
  </tr>
  <tr>
    <td>
		<label for="preco"> Preço do serviço</label>
    <br>
    <br>
		<input type="number" step="0.01"  min="0.01" format="currency" id="email" name="preco" >
	</td>
  
  </tr>
  <tr>
    <td>
      <br>
		<label for="descricao"> Descrição</label>
    <br>
		<textarea name="descricao_produto" id="descricao" maxlength="110" cols="80" rows="10" ></textarea>
	</td>
  </tr>
  
    <td>
      <br><input type="radio" name="estado" value="INATIVO" <?php echo (@$_POST['estado'] == "INATIVO" ? " checked" : "INATIVO" );?>  > Enviar para verificação
</table>
<table>
<tr>
  <br>
	<input type="submit" value="Gravar" name="botao">  	
	<input type="hidden" name="id_usuario" value="<?php echo @$_REQUEST['id_usuario'] ?>" />
</tr>
</table>
    </body>
</html>