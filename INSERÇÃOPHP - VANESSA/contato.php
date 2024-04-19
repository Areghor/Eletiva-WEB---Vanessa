<?php
require("header-inc.php");

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Incluindo o arquivo de conexão
require_once('connection.php');

// Consulta SQL para selecionar os contatos
$sql_contatos = "SELECT * FROM contatos";
$result_contatos = $conn->query($sql_contatos);

// Fechando a conexão com o banco de dados
$conn->close();
?>

<div class="container">
    <h2>Contatos</h2>
    <hr>
    <div class="float-right p-1">
        <a href="insert-contato.php"><button type="button" class="btn btn-primary">Novo</button></a>
    </div>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="table-info" style="text-align:center">
                <th scope="col" style="width: 5%;">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Número</th>
                <th scope="col" style="width: 20%;">Cargo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_contatos->num_rows > 0) {
                while ($row = $result_contatos->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row" style="text-align:center"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['numero']; ?></td>
                        <td style="text-align:center">
                            <a href="update-contato.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href="delete-contato.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4" style="text-align:center">Nenhum contato encontrado.</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php require("footer.php"); ?>
