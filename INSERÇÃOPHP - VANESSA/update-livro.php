<?php
require("header-inc.php");

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

/**
 * Update data in a Table
 */

require_once('connection.php');

if (isset($_POST['enviar'])) {

    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $duracao = $_POST['duracao'];
    $data_inicio = $_POST['data_inicio'];
    $idcontato = $_POST['idcontato'];

    // Mysql query to update record in a table
    $mysql_query = "UPDATE livro SET nome_livro='{$descricao}', data_disponibilidade='{$data_inicio}', id_autor='{$idcontato}' WHERE id_livro={$id}";

    if ($conn->query($mysql_query) === TRUE) {
        $msg = "update success";
        $msgerror = "";
    } else {
        $msg = "update error";
        $msgerror = $conn->error;
    }
    header("Location: livro.php?msg={$msg}&msgerror={$msgerror}");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $mysql_query = "SELECT * FROM livro WHERE id_livro={$id}";
    $result = $conn->query($mysql_query);
    $row = mysqli_fetch_assoc($result);

    $mysql_query = "SELECT * FROM autores ORDER BY nome_autor";
    $result = $conn->query($mysql_query);
}

// Connection Close
mysqli_close($conn);
?>
<div class="container">
    <h2>Atualizar Livro</h2>
    <p>Atualização do cadastro de livro.</p>
    <hr>
    <div class="wrapper">
        <form method="post">
            <input type="hidden" name="id" value="<?= $row['id_livro']; ?>">
            <label for="descricao">&nbsp;Nome do Livro</label>
            <input type="text" name="descricao" id="descricao" class="form-control" required value="<?= $row['nome_livro']; ?>"><br>
            <label for="data_inicio">&nbsp;Data de Disponibilidade</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="<?= $row['data_disponibilidade']; ?>"><br>
            <label for="duracao">&nbsp;ID do Autor</label>
            <input type="text" name="duracao" id="duracao" class="form-control" value="<?= $row['id_autor']; ?>"><br>
            <label for="duracao">&nbsp;Selecione o Autor</label>
			<select class="form-control" name="idcontato" id="idcontato">
                <?php while ($contatos = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                    <option value="<?= $contatos['id_autor']; ?>" <?php if ($contatos['id_autor'] == $row['id_autor']) {
                                                                        echo "selected";
                                                                    } ?>><?= $contatos['nome_autor']; ?></option>
                <?php } ?>
            </select>
            <br><input type="submit" name="enviar" value="Atualizar" class="btn btn-primary w100">
        </form>
    </div>
</div>

<?php require("footer.php"); ?>
