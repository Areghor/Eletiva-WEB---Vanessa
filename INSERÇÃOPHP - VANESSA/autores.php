<?php
require("header-inc.php");

// Verificar se o usuário está logado, caso contrário redirecionar para a página de login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once('connection.php');

// Query para selecionar os autores do banco de dados
$mysql_query = "SELECT id_autor, nome_autor FROM autores ORDER BY nome_autor";
$result = $conn->query($mysql_query);

mysqli_close($conn);
?>

<div class="container">
    <h2>Autores</h2>
    <hr>
    <div class="wrapper">
        <form>
            <div class="form-group">
                <label for="id_autor">Selecione o autor:</label>
            </div>
        </form>
    </div>

    <div class="float-right p-1">
        <a href="insert-autores.php"><button type="button" class="btn btn-primary">Novo Autor</button></a>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="table-info" style="text-align:center">
                <th scope="col" style="width: 20%;">ID</th>
                <th scope="col">Nome do Autor</th>
                <th scope="col" style="width: 40%;">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Reiniciar a consulta para exibir os autores em uma tabela
            $result->data_seek(0);
            while ($row = mysqli_fetch_array($result)) { ?> 
                <tr> 
                    <th scope="row" style="text-align:center"><?php echo $row['id_autor']; ?></th>
                    <td><?php echo $row['nome_autor']; ?></td> 
                    <td style="text-align:center">
                        <a href="update-autores.php?id_autor=<?php echo $row['id_autor']; ?>" class="btn btn-primary">Editar</a>
                        <a href="delete-autores.php?id_autor=<?php echo $row['id_autor']; ?>" class="btn btn-danger">Excluir</a>
                    </td> 
                </tr> 
            <?php } ?>       
        </tbody>
    </table>
</div>

<?php require("footer.php"); ?>
