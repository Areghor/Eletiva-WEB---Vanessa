<?php

session_start();


if (isset($_GET['id'])) {
    $idloc = $_GET['id'];

    require_once('connection.php');

    $mysql_query = "DELETE FROM livros WHERE idloc=$idloc";

    if ($conn->query($mysql_query) === TRUE) {
        $msg = "delete success";
        $msgerror = "";
    }
    else {
        $msg =  "delete error";
        $msgerror = $conn->error;
    }

    mysqli_close($conn);
} else {
    $msg =  "delete error";
    $msgerror =  "O ID não foi informado!";
}

header("Location: livros.php?msg={$msg}&msgerror={$msgerror}");
?>