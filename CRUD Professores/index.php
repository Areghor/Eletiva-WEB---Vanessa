<?php

require_once("functions.php");

$professores = consultarProfessores();

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Professores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="container">
<h3>Gerenciamento de Professores</h3>

<a href="inserir.php" class="btn btn-info">Inserir novo Professor</a>

<table class="table table-info table-striped table-hover">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Formação</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($professores as $professor): ?>
        <tr>
            <td><?= $professor['nome'] ?></td>
            <td><?= $professor['formacao'] ?></td>
            <td><?= $professor['telefone'] ?></td>
            <td><?= $professor['email'] ?></td>
            <td>
                <a href='alterar.php?id=<?= $professor['id'] ?>' class='btn btn-primary btn-sm'>Alterar</a>
                <a href='excluir.php?id=<?= $professor['id'] ?>' class='btn btn-danger btn-sm' onclick="return confirm('Tem certeza que deseja excluir este professor?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
