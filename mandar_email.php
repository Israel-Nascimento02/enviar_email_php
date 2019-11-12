<?php
include "connect.php";

$to = $_POST['email'];
$nome = $_POST ['nome'];
$valida = md5($to);
//informaçoes do banco
mysqli_query($link, "INSERT INTO cadastro(email,nome,valida,ativo) 
VALUES('$to', '$nome', '$valida', '0')");

//echo $valida;
$subject = "testando email";
$message = "
        israel Nascimento ->

    Clique aqui ->
    https://enviaremail123.000webhostapp.com//valida_cadastro.php?v=$valida
";

@mail($to,$subject,$message);

if(@mail){
    echo '<h1 style="color: green;">Enviado com sucesso, confira no seu E-mail<h1>';
}else{
    echo 'Falha, <a href="index.php">tente de novo</a>';
}

?>