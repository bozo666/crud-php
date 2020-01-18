<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
    $stmt = "DELETE FROM funcionario WHERE id='$id'";
    $resultSet = mysqli_query($conn, $stmt);

    if(mysqli_affected_rows($conn)){
     $_SESSION['msg']  = "<p style='color:blue'>  Funcionario apagado! </p>" ;
      header("Location: listar.php");
    }
    else{
       $_SESSION['msg']  = "<p style='color:blue'>  Erro ao apagar funcionario! </p>" ;
       header("Location: listar.php");
    }
}
