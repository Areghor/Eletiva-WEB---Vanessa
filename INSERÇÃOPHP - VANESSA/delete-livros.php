<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once('connection.php');

    $mysql_query = "DELETE FROM contatos WHERE id=$id";

    if ($conn->query($mysql_query) === TRUE) {
        $msg = "Exclusão bem-sucedida.";
        $msgerror = "";
    } else {
        $msg = "Erro ao excluir.";
        $msgerror = $conn->error;
    }

    $conn->close();
} else {
    $msg = "Erro ao excluir.";
    $msgerror = "O ID não foi informado!";
}

header("Location: contatos.php?msg=$msg&msgerror=$msgerror");
?>
