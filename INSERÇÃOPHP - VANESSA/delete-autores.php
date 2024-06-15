<?php
require_once('connection.php');

if (isset($_GET['id_autor'])) {
    $id_autor = $_GET['id_autor'];

    // Excluir todos os livros associados ao autor
    $delete_livros_query = "DELETE FROM livro WHERE id_autor = ?";
    if ($stmt = $conn->prepare($delete_livros_query)) {
        $stmt->bind_param("i", $id_autor);
        $stmt->execute();
        $stmt->close();
    } else {
        $msgerror = $conn->error;
        header("location: autores.php?msg=delete error&msgerror=$msgerror");
        exit;
    }

    // Excluir o autor
    $delete_autor_query = "DELETE FROM autores WHERE id_autor = ?";
    if ($stmt = $conn->prepare($delete_autor_query)) {
        $stmt->bind_param("i", $id_autor);
        $stmt->execute();
        $stmt->close();
        header("location: autores.php?msg=delete success");
    } else {
        $msgerror = $conn->error;
        header("location: autores.php?msg=delete error&msgerror=$msgerror");
    }

    $conn->close();
} else {
    header("location: autores.php?msg=delete error&msgerror=No ID provided");
}
?>
