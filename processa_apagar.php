<?php
session_start();
include_once("conexao.php");

$id  = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$resultado = "DELETE FROM usuarios WHERE id='$id'";
$excluir_usuario= mysqli_query($conexao,$resultado);

if(mysqli_affected_rows($conexao)){
    $_SESSION['msg']="<p style='color:green;'>Usuario apagado com sucesso</p>";
    header("Location:lista.php");
}else{
    $_SESSION['msg']="<p style='color:red;'>Usuario não apagado</p>";
    header("Location:lista.php");
}

?>