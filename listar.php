<?php
session_start();
include_once("conexao.php")
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>CRUD</title>
    </head>
    <body>
        <a href="Index.php">Cadastrar</a><br/>
        <a href="listar.php">Listar</a><br/>
        <h1>Listar Funcionario</h1>
        <?php
            if (isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            //receber numero da pagina
            $paginaAtual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);

            $pagina = (!empty($paginaAtual)) ? $paginaAtual : 1;

            //setar quantidade de itens;
            $qnt_result_pg = 4;

            //calcular inicio
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            echo "Pagina atual: $pagina <br/><br/>";

            $result_funcionario = "SELECT * FROM funcionario LIMIT $inicio,
            $qnt_result_pg";
            $result_funcionario = mysqli_query($conn, $result_funcionario);
           
            while($row_funcionario = mysqli_fetch_assoc($result_funcionario)){
                echo "ID: " . $row_funcionario['id'] . "<br/>";
                echo "NOME: " . $row_funcionario['nome'] . "<br/>";
                echo "EMAIL: " . $row_funcionario['email'] . "<br/>";
                echo "CPF: " . $row_funcionario['cpf'] . "<br/>";
                echo "DATA DE NASCIMENTO: " . $row_funcionario['dataDeNascimento'] . "<br/>";
                echo "<a href='edit_funcionario.php?id=" . $row_funcionario['id'] . "'>Editar</a><br/>";
                echo "<a href='processaRemover.php?id=" . $row_funcionario['id'] . "'>Remover</a><br/><hr/>";
            }

            //paginação - somar a quantidade de funcionario
            $resultPg = "SELECT COUNT(id) AS num_result FROM funcionario";
            $resultadoPg=mysqli_query($conn, $resultPg);
            $rowPg = mysqli_fetch_assoc($resultadoPg);
           // echo $rowPg['num_result'];
           //quantidade de paginas
           $quantidadePg = ceil($rowPg['num_result'] / $qnt_result_pg);

           
           //limitar quantidade de links
            $maxLinks = 2;
            echo "<a href= 'listar.php?pagina=1'> Primeira </a>";

            for($paginaAnterior = $pagina - $maxLinks; $paginaAnterior <= $pagina -1;$paginaAnterior++){
               if($paginaAnterior >= 1){
                    echo "<a href= 'listar.php?pagina=$paginaAnterior'> $paginaAnterior </a>";
               }
            }

            for($paginaDepois = $pagina +1; $paginaDepois<= $pagina + $maxLinks; $paginaDepois++){
                if($paginaDepois <= $quantidadePg){
                    echo "<a href= 'listar.php?pagina=$paginaDepois'> $paginaDepois </a>";
                }
            }
            echo "<a href= 'listar.php?pagina=$quantidadePg'> Ultima </a>";


        ?>
        
        
    </body>

</html>