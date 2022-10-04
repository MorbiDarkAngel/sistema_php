
<?php
function gravarLog ($id_usuario, $nome_usuario, $data, $tipo)
{
	include ('config.php'); //sempre buscar o banco para incluir os dados
	
	//Inserindo dados no banco de acordo com os parÂmetros estabelecidos no "gravarLog"
	$query = "INSERT INTO log (id_usuario, nome_usuario, data, tipo) values 
	('$id_usuario', '$nome_usuario', '$data', '$tipo')";
	
	$result = mysqli_query($con,$query);
}
?>
