<html>
    <head>
    <link rel=stylesheet type="text/css" href="userEstilo.css
    ">
    <?php include ('config.php'); 
  
    
    ?>
		
    </head>
    
    <body>
      
    <nav>
            <ul>
           
			  <font size=7.77 color=white> Olá <?php require('verifica.php'); echo $_SESSION["login"]; ?>, quais são as tarefas para hoje?</font>
			  
                <li><a href="index.php">Home</a></li>
                <li> <a href="usuario.php">Atualizar cadastro</a></li>
                <li><a href="cadServico.php">Adicionar anuncio</a></li>
                <li><a href="logout.php"> Sair </a></li>
            </ul>
        </nav>
        
        <?php
        
        $sql = "Select * from produto where id_produto > 0";
        $result = mysqli_query($con, $sql);
       
        $id_produto = @$_REQUEST['id_produto'];
        if (@$_REQUEST['botao'] == "Excluir") {
          $query_excluir = " DELETE FROM produto WHERE id_produto='$id_produto'
          ";
          $result_excluir = mysqli_query($con, $query_excluir);
          
          
          if ($result_excluir)  echo "<script>alert('Cadastro excluído');top.location.href='pgUser.php';</script>";
          else  echo "<script>alert('Não foi possivel excluir seu anúncio');top.location.href='pgUser.php';</script>"; 
          
      }
        
        ?>
       <form action="#" method="post" >
        <table class="table" id="product">
            <thead>
            <tr>
            <th scope="col">Identificador</th>
            <th scope="col">Serviço</th>
            <th scope="col">Preço</th>
            <th scope="col">Descrição</th>
            <th scope="col">Status</th>
     
            </tr>
            </thead>
        <?php  
         while ($coluna=mysqli_fetch_array($result)) 
            {
              $nome_produto = $coluna['nome_produto'];
              $preco = $coluna['preco'];
              $descricao_produto = $coluna['descricao_produto'];
        ?>
          <tbody>
     
        <tr>
        <td><?php echo $coluna['id_produto']?></td>
        <td><?php echo $coluna['nome_produto']?></td>
        <td><?php echo $coluna['preco']?></td>
        <td><?php echo $coluna['descricao_produto']?></td>
        <td><?php echo $coluna['estado']?></td>
        <td><input type="submit" value="Excluir" name="botao"></td>
        <td><input type="submit" value="Atualizar" name="Atualizar"></td>
        <input type="hidden" name="id_produto" value="<?php echo @$_REQUEST['id_produto'] ?>" />
            
     
    </tr> 
    <?php  } ?>
      </tbody>
    </table>
           
    </form>
    </body>
</html>