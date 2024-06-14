<?php
require("header-inc.php");

// Verificar se o usuário está logado, caso contrário redirecionar para a página de login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once('connection.php');

// Processamento do formulário de atualização
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_autor = $_POST["id_autor"];
    $nome_autor = $_POST["nome_autor"];

    // Query para atualizar o autor no banco de dados
    $sql = "UPDATE autores SET nome_autor='$nome_autor' WHERE id_autor=$id_autor";

    if ($conn->query($sql) === TRUE) {
        header("location: autores.php?msg=update success");
        exit;
    } else {
        $msgerror = $conn->error;
        header("location: autores.php?msg=update error&msgerror=$msgerror");
        exit;
    }
}

// Verificar se o ID do autor foi fornecido
if (isset($_GET["id_autor"])) {
    $id_autor = $_GET["id_autor"];

    // Query para obter os dados do autor a ser atualizado
    $sql = "SELECT * FROM autores WHERE id_autor=$id_autor";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

mysqli_close($conn);
?>

<div class="container">
    <h2>Editar Autor</h2>
    <hr>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id_autor" value="<?php echo $row['id_autor']; ?>">
        <div class="form-group">
            <label for="nome_autor">Nome do Autor:</label>
            <input type="text" class="form-control" id="nome_autor" name="nome_autor" value="<?php echo $row['nome_autor']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

<?php require("footer.php"); ?>
