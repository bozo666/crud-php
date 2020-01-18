<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
 $stmt = "SELECT * FROM funcionario WHERE id = '$id'";
 $resultSet = mysqli_query($conn, $stmt);
 $row = mysqli_fetch_assoc($resultSet);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>CRUD</title>
    </head>
    <body>
        <a href="Index.php">Cadastrar</a><br/>
        <a href="listar.php">Listar</a><br/>
        <h1>Editar Funcionario</h1>
        <?php
            if (isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="processaEditar.php">

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">;

        <label>Nome: </label>
        <input type="text" name="nome" placeholder="NOME" 
        value="<?php echo $row['nome']; ?>"><br/><br/>

        <label>Email: </label>
        <input type="text" name="email" placeholder="EMAIL"
         value="<?php echo $row['email']; ?>"><br/><br/>

        <label>CPF: </label>
        <input type="text" name="cpf" placeholder="CPF" 
        value="<?php echo $row['cpf']; ?>"><br/><br/>

        <label>Data de nascimento: </label>
        <input type="text" name="dataNascimento" placeholder="DATA DE NASCIMENTO" 
        value="<?php echo $row['dataDeNascimento']; ?>"><br/><br/>

        <input type="submit" value="Editar">
        
        </form>
    </body>

</html>