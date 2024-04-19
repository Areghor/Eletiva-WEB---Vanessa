<?php

require_once("config.php");

function inserirProfessor($nome, $formacao, $telefone, $email) {
    global $pdo;
    $sql = "INSERT INTO professor (nome, formacao, telefone, email) VALUES (:nome, :formacao, :telefone, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome, 'formacao' => $formacao, 'telefone' => $telefone, 'email' => $email]);
}

function alterarProfessor($id, $nome, $formacao, $telefone, $email) {
    global $pdo;
    $sql = "UPDATE professor SET nome = :nome, formacao = :formacao, telefone = :telefone, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'nome' => $nome, 'formacao' => $formacao, 'telefone' => $telefone, 'email' => $email]);
}

function excluirProfessor($id) {
    global $pdo;
    $sql = "DELETE FROM professor WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

function consultarProfessorPorId($id) {
    global $pdo;
    $sql = "SELECT * FROM professor WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function consultarProfessores() {
    global $pdo;
    $sql = "SELECT * FROM professor";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
