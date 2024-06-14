<?php
require("header-inc.php");

// Verificar se o usuário está logado, caso contrário redirecionar para a página de login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

/**
 * Insert data into Table
 */

require_once('connection.php');

if (isset($_POST['enviar'])) {
    $nome_livro = $_POST['nome_livro'];
    $data_disponibilidade = $_POST['data_disponibilidade'];
    $id_autor = $_POST['id_autor'];

    // Verificar se o id_autor existe na tabela autores
    $check_query = "SELECT id_autor FROM autores WHERE id_autor = $id_autor";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        // Mysql query to insert record into table
        $mysql_query = "INSERT INTO livro (nome_livro, data_disponibilidade, id_autor) 
                                VALUES ('{$nome_livro}', '{$data_disponibilidade}', '{$id_autor}')";

        $result = $conn->query($mysql_query);

        if ($result === TRUE) {
            $msg =  "Inserção bem-sucedida";
            $msgerror = "";

            // Fechar conexão
            mysqli_close($conn);

            header("Location: livro.php?msg={$msg}&msgerror={$msgerror}");
            exit; // Redirecionar imediatamente, encerrando o script
        } else {
            $msg =  "Erro na inserção: " . $conn->error;
            $msgerror = "";
        }
    } else {
        $msg = "O ID do autor fornecido não existe na tabela autores.";
        $msgerror = "";
    }

    // Fechar conexão
    mysqli_close($conn);
}
?>

<div class="container">
    <h2>Inserir Livro</h2>
    <p>Adicione um novo livro disponível.</p>
    <hr>
    <div class="wrapper">
        <form method="post">
            <label for="nome_livro">&nbsp;Nome do Livro</label>
            <input type="text" name="nome_livro" id="nome_livro" class="form-control" required><br>
            <label for="data_disponibilidade">&nbsp;Data de Disponibilidade</label>
            <input type="date" name="data_disponibilidade" id="data_disponibilidade" class="form-control" required><br>
            <label for="id_autor">&nbsp;ID do Autor</label>
            <input type="text" name="id_autor" id="id_autor" class="form-control" required><br>
            <input type="submit" name="enviar" value="Inserir" class="btn btn-primary w100">
        </form>
        <?php if(isset($msg) && !empty($msg)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $msg; ?>
        </div>
        <?php } ?>
    </div>
</div>

<?php require("footer.php"); ?>
