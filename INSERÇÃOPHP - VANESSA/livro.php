<?php
require("header-inc.php");

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

/**
 * Select Table Data
 * Fetching data from the database using mysqli_fetch_array() function and without table tag
 */

require_once('connection.php');

// MySQL query to select data from the table
$mysql_query = "SELECT livro.id_livro, livro.nome_livro, livro.data_disponibilidade, autores.nome_autor 
                FROM livro 
                INNER JOIN autores ON livro.id_autor = autores.id_autor 
                ORDER BY livro.data_disponibilidade DESC";
$result = $conn->query($mysql_query);

// Connection Close
mysqli_close($conn);
?>

<div class="container">
    <h2>Livros</h2>
    <p>Veja quais livros nós temos disponível em nossa biblioteca!!</p>
    <hr>
    <div class="float-right p-1">
        <a href="insert-livro.php"><button type="button" class="btn btn-primary">Novo</button></a>
    </div>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="table-info" style="text-align:center">
                <th scope="col" style="width: 5%;">#</th>
                <th scope="col">Nome do Livro</th>
                <th scope="col" style="width: 20%;">Data de Disponibilidade</th>
                <th scope="col" style="width: 15%;">Autor</th>
                <th scope="col" style="width: 20%;">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = mysqli_fetch_array($result)) { ?>
                <tr>
                    <th scope="row" style="text-align:center"><?php echo $data['id_livro']; ?></th>
                    <td><?php echo $data['nome_livro']; ?></td>
                    <td style="text-align:center"><?php echo date('d/m/Y', strtotime($data['data_disponibilidade'])); ?></td>
                    <td style="text-align:center"><?php echo $data['nome_autor']; ?></td>
                    <td style="text-align:center">
                        <a href="update-livro.php?id=<?php echo $data['id_livro']; ?>">
                            <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="delete-livro.php?id=<?php echo $data['id_livro']; ?>">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php require("footer.php"); ?>
