<?php

require_once("functions.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['nome']) && isset($_POST['formacao']) && isset($_POST['telefone']) && isset($_POST['email'])) {
        inserirProfessor($_POST['nome'], $_POST['formacao'], $_POST['telefone'], $_POST['email']);
        header("Location: index.php?inserir=ok");
        exit();
    }
}

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inserir Professor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="container">
<h3>Inserir Professor</h3>
<form action="inserir.php" method="POST">
    <div class="row">
        <div class="col-7">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required/>
        </div>
        <div class="col-5">
            <label for="formacao" class="form-label">Formação:</label>
            <input type="text" id="formacao" name="formacao" class="form-control" required/>
        </div>
    </div>
    <div class="row">
        <div class="col-7">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" id="telefone" name="telefone" class="form-control" required/>
        </div>
        <div class="col-5">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required/>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <button class="btn btn-primary" type="submit">Salvar Dados</button>
        </div>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
