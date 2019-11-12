<?php

//inluir conexão
include "connect.php";

//pegando valor que vem pela URL ..?v='VALOR A SER PEGO'...
$valor = $_GET['v'];

if($valor == ""){
 echo "<script>window.location.href=/'index.php';</script>";
}else{

$query = "SELECT * FROM cadastro WHERE valida = '$valor'";
$result = mysqli_query($link, $query);

while($row = mysqli_fetch_assoc($result)){
		
		$codigo = $row["valida"]; 
}

  if($valor == $codigo){
   
   mysqli_query ($link, "UPDATE cadastro set ativo = 1 WHERE valida = '$valor'");
   echo "<h1>CADASTRO ATIVADO COM SUCESSO!</h1>"."<a href=/'index.php'>Voltar para a tela de cadastro</a>";
  
  }else{
   echo "<b>Não foi possível ativar o seu cadastro.</b>";
   echo "<a href='enviando_email/index.php'>Voltar para a tela de cadastro</a>";
  }

}

?>