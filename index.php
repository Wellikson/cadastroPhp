<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Cadastro</title>
        <link rel="stylesheet" href="stilo.css">
    </head>
    <body>
        
        <h1>Cadastro</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="processa_cadastrar.php">
            <label>Nome:</label>
            <input type="text" name="nome"placeholder="Digete seu nome" required><br>
            <label>Email :</label>
            <input type="email" name="email"placeholder="Digete seu email" required><br><br>
            <input type="submit" value="Cadastrar"><br><br>
        </form>
        <div>
            <a href="lista.php">Usuarios cadastrados</a><br>
        </div>
    </body>
</html>