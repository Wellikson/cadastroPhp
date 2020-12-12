<?php
session_start();
include_once("conexao.php")
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>usuarios</title>
        <link rel="stylesheet" href="stilo.css">
        <style>
                table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                }
                td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                }
                tr:nth-child(even) {
                background-color: #dddddd;
                }
        </style>
    </head>
    <body>
        <a href="index.php">Pagina Cadastro</a><br>
        <h1>Lista de Usuario Cadastrados</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>EDITAR</th>
                <th>APAGAR</th>
            </tr>
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                $usuarios_cadastrados = "SELECT * FROM usuarios";
                $resultado = mysqli_query($conexao,$usuarios_cadastrados);
                while($linha = mysqli_fetch_assoc($resultado)){
                    echo"<tr>";
                    echo "<td>" . $linha['id'] . "</td>";
                    echo "<td>" . $linha['nome'] . "</td>";
                    echo "<td>" . $linha['email'] . "</td>";
                    echo "<td><a href='editar.php?id=" . $linha['id'] . "'>Editar</a></td>";
                    echo "<td><a href='processa_apagar.php?id=" . $linha['id'] . "'>Apagar</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>