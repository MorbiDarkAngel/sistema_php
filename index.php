<html>
    <head>
    <link rel=stylesheet type="text/css" href="princ.css">
    <?php include ('config.php');   ?> 
    </head>
    <body>
    <?php
        $sql = "Select * from produto where id_produto > 0";
        $result = mysqli_query($con, $sql);

        ?>
           <nav>
            <ul>
            <?php 
                
             ?>
                <li>
                <?php 
               
                ?><a href='login.php'>Entrar</a></li>
                <li><a href="cadServico.php">Adicionar anúncio</a></li>
                <li><a  href="pgAdm.php">Administrador</a></li>
              

            </ul>
        </nav>
       
       
           
           

        <div >
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