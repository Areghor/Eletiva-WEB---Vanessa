<?php
require_once('connection.php');

// Verificar se o ID do autor foi fornecido
if (isset($_GET["id_autor"])) {
    $id_autor = $_GET["id_autor"];

    // Query para excluir o autor do banco de dados
    $sql = "DELETE FROM autores WHERE id_autor=$id_autor";

    if ($conn->query($sql) === TRUE) {
        header("location: autores.php?msg=delete success");
        exit;
    } else {
        $msgerror = $conn->error;
        header("location: autores.php?msg=delete error&msgerror=$msgerror");
        exit;
    }
}

mysqli_close($conn);
?>
