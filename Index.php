<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>CRUD</title>
    </head>
    <body>
        <a href="Index.php">Cadastrar</a><br/>
        <a href="listar.php">Listar</a><br/>
        <h1>Cadastrar Funcionario</h1>
        <?php
            if (isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="processaInserir.php">

        <label>Nome: </label>
        <input type="text" name="nome" placeholder="NOME"><br/><br/>

        <label>Email: </label>
        <input type="text" name="email" placeholder="EMAIL"><br/><br/>

        <label>CPF: </label>
        <input type="text" name="cpf" placeholder="CPF"><br/><br/>

        <label>Data de nascimento: </label>
        <input type="text" name="dataNascimento" placeholder="DATA DE NASCIMENTO"><br/><br/>

        <input type="submit" value="Cadastrar">
        
        </form>
    </body>

</html>