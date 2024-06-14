<?php
session_start();

// Verificar se o ID foi fornecido na URL
if (!isset($_GET['id'])) {
    $_SESSION['msg'] = "delete error";
    $_SESSION['msgerror'] = "O ID não foi informado!";
    header("Location: livro.php");
    exit;
}

$id_livro = $_GET['id'];

require_once('connection.php');

$delete_query = "DELETE FROM livro WHERE id_livro = $id_livro";

if ($conn->query($delete_query) === TRUE) {
    $_SESSION['msg'] = "delete success";
    $_SESSION['msgerror'] = "";
} else {
    $_SESSION['msg'] = "delete error";
    $_SESSION['msgerror'] = $conn->error;
}

$conn->close();

header("Location: livro.php");
?>
