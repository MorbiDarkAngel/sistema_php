<?php 
// Inicia sessoes 
session_start(); 

// Verifica se existe os dados da sessãoo de login 
if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["login"]) && !isset($_SESSION["senha"])) 
{ 
// Usu�rio nãoo logado! Redireciona para a página de login 
header("Location: login.php"); 
exit; 
} 
?> 
