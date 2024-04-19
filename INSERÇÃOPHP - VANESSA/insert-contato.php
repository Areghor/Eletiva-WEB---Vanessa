<?php
require("header-inc.php");

// Verifica se o usuário está logado, se não estiver, redireciona para a página de login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Incluindo o arquivo de conexão
require_once('connection.php');

// Inserção de dados na tabela
if (isset($_POST['enviar'])) {
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];

    // Consulta MySQL para inserir registro na tabela
    $mysql_query = "INSERT INTO contatos (nome, numero) VALUES ('$nome', '$numero')";
    $result = $conn->query($mysql_query);

    if ($result === TRUE) {
        $msg =  "Inserção bem-sucedida.";
        $msgerror = "";
    } else {
        $msg =  "Erro ao inserir.";
        $msgerror = $conn->error;
    }

    // Fechando conexão
    $conn->close();

    // Redireciona para a página de contatos com mensagem
    header("Location: contatos.php?msg=$msg&msgerror=$msgerror");
}

?>

<div class="container">
    <h2>Novo Contato</h2>
    <p>Adicione um novo contato.</p>
    <hr>
    <div class="wrapper">
        <form method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required><br>
            <label for="numero">Número</label>
            <input type="text" name="numero" id="numero" class="form-control" required><br>
            <br>
            <input type="submit" name="enviar" value="Inserir" class="btn btn-primary w100">
        </form>
    </div>
</div>

<?php require("footer.php"); ?>
