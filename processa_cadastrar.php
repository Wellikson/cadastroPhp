<?php
session_start();
include_once("conexao.php");
$nome=filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

// echo "Nome : $nome <br>";
// echo "Email : $email <br>";

$result_usuarios="INSERT INTO usuarios (nome,email,criado) VALUES ('$nome','$email',NOW())";
mysqli_query($conexao,$result_usuarios);

if(mysqli_insert_id($conexao)){
    $_SESSION['msg']="<p style='color:green;'>Usuario cadastrado com sucesso</p>";
    header("Location:lista.php");
}else{
    $_SESSION['msg']="<p style='color:red;'>Usuario não cadastrado</p>";
    header("Location:index.php");
}

?>