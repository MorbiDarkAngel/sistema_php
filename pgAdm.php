<html>
    <head>
        <title>Administrador</title>
		<?php include ('config.php');  
        include('verifica.php')
        ?>
		<link rel=stylesheet type="text/css" href="princ.css">
 
    </head>
    <body>
    <?php
        $sql = "Select * from produto where id_produto > 0";
        $result = mysqli_query($con, $sql);

        ?>
           <nav>
            <ul>
                <li><font size=6 color=GREY> Seja bem vindo <?php echo $_SESSION["login"]; ?></font>          
                <li><a href="cadServico.php">Adicionar anúncio</a></li>          
                <li><a href='logout.php'>Sair</a></li>

            </ul>
        </nav>

        <div>
        <?php
        
          
        
                while (@$coluna=mysqli_fetch_array($result)) 
            {
                $nome_produto = $coluna['nome_produto'];
                $preco = $coluna['preco'];
                $descricao_produto = $coluna['descricao_produto'];

        ?>
        
       
        <img src="images.png" alt="">
        <h1><?php echo $coluna['nome_produto']?></h1>
        <h2><?php echo $coluna['preco']?></h2>
        <div id="content">
        <h5><?php echo $coluna['descricao_produto']?></h5>
        </div>
       
        </div>
       
        
        <?php  } ?>
  
      
    </body>
</html>