<?php
require("header-inc.php");

// Verificar se o usuário está logado, caso contrário redirecionar para a página de login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once('connection.php');

// Processamento do formulário de inserção
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_autor = $_POST["nome_autor"];

    // Query para inserir o novo autor no banco de dados
    $sql = "INSERT INTO autores (nome_autor) VALUES ('$nome_autor')";
    if ($conn->query($sql) === TRUE) {
        header("location: autores.php?msg=insert success");
        exit;
    } else {
        $msgerror = $conn->error;
        header("location: autores.php?msg=insert error&msgerror=$msgerror");
        exit;
    }
}

mysqli_close($conn);
?>

<div class="container">
    <h2>Novo Autor</h2>
    <hr>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="nome_autor">Nome do Autor:</label>
            <input type="text" class="form-control" id="nome_autor" name="nome_autor" required>
        </div>
        <button type="submit" class="btn btn-primary">Inserir</button>
    </form>
</div>

<?php require("footer.php"); ?>
