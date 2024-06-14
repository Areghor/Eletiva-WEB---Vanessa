<?php
require("header-inc.php");

// Verificar se o usuário está logado, caso contrário redirecionar para a página de login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once('connection.php');

// Definindo $row como um array vazio para evitar erros de variável indefinida
$row = array('idloc' => '', 'locatario' => '', 'nomelivro' => '');

if (isset($_POST['enviar'])) {
    $idloc = $_POST['idloc'];
    $locatario = $_POST['locatario'];
    $nomelivro = $_POST['nomelivro'];

    // Atualizar registro na tabela usando prepared statement
    $stmt = $conn->prepare("UPDATE livros SET locatario=?, nomelivro=? WHERE idloc=?");
    $stmt->bind_param("ssi", $locatario, $nomelivro, $idloc);

    // Executar a atualização
    if ($stmt->execute()) {
        $msg = "Atualização bem-sucedida";
        $msgerror = "";
    } else {
        $msg = "Erro na atualização";
        $msgerror = $stmt->error;
    }
    $stmt->close();

    // Redirecionar para a página de livros com mensagem de sucesso ou erro
    header("Location: livros.php?msg={$msg}&msgerror={$msgerror}");
}

if (isset($_GET['idloc'])) {
    $idloc = $_GET['idloc'];
    $stmt = $conn->prepare("SELECT * FROM livros WHERE idloc=?");
    $stmt->bind_param("i", $idloc);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}

mysqli_close($conn);
?>

<div class="container">
    <h2>Livro</h2>
    <p>Atualização do livro alocado.</p>
    <hr>
    <div class="wrapper">
        <form method="post">
            <input type="hidden" name="idloc" value="<?= $row['idloc']; ?>">
            <label for="locatario">&nbsp;Locatário</label>
            <input type="text" name="locatario" id="locatario" class="form-control" required value="<?= $row['locatario']; ?>"><br>
            <label for="nomelivro">&nbsp;Nome do Livro</label>
            <input type="text" name="nomelivro" id="nomelivro" class="form-control" required value="<?= $row['nomelivro']; ?>"><br>
            <input type="submit" name="enviar" value="Atualizar" class="btn btn-primary w100">
        </form>
    </div>
</div>

<?php require("footer.php"); ?>
