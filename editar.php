<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$usuario = "SELECT * FROM usuarios WHERE id='$id'";
$resultado = mysqli_query($conexao,$usuario);
$linha = mysqli_fetch_assoc($resultado)
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Editar</title>
        <link rel="stylesheet" href="stilo.css">
    </head>
    <body>
       
        <h1>Editar Usuario</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="processa_editar.php">
        <input type="hidden" name="id" value="<?php echo $linha['id']?>" >
            <label>Nome:</label>
            <input type="text" name="nome"placeholder="Digete seu nome"
                value="<?php echo $linha['nome']?>" required><br>
            <label>Email :</label>
            <input type="email" name="email"placeholder="Digete seu email" 
            value="<?php echo $linha['email']?>" required><br>
            <input type="submit" value="Editar"><br><br>
        </form>
        <div>
            <a href="lista.php" class="nav1">Usuarios Cadastrados</a>
            <a href="index.php" class="nav2">Pagina Cadastro</a><br>
        </div>
    </body>
</html>