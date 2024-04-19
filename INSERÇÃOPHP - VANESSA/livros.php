<?php
require("header-inc.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}

require_once('connection.php');

$mysql_query = "SELECT * FROM livros ORDER BY idloc";
$result = $conn->query($mysql_query);

mysqli_close($conn);
?> 
<div class="container">
  <h2>Locátarios</h2>
  <p>Listagem dos locátarios.</p>
  <hr>
  <div class="float-right p-1">
    <a href="insert-livros.php"><button type="button" class="btn btn-primary">Novo</button></a>
  </div>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr class="table-info" style="text-align:center">
        <th scope="col" style="width: 5%;">#</th>
        <th scope="col">Locátario</th>
        <th scope="col" style="width: 30%;">Nome do livro</th>
        <th scope="col" style="width: 15%;">ID do livro</th>
        <th scope="col" style="width: 15%;">Data de Retirada</th>
        <th scope="col" style="width: 20%;">Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php while($data = mysqli_fetch_array($result)) { ?> 
      <tr> 
        <th scope="row" style="text-align:center"><?php echo $data['idloc']; ?></th>
        <td><?php echo $data['locatario']; ?></td> 
        <td><?php echo $data['nomelivro']; ?></td> 
        <td><?php echo $data['idlivro']; ?></td> 
        <td><?php echo $data['created_at']; ?></td> 
        <td style="text-align:center">
          <a href="update-livros.php?id=<?php echo $data['idloc']; ?>">
            <button type="button" class="btn btn-primary">Editar</button></a>
          <a href="delete-livros.php?id=<?php echo $data['idloc']; ?>">
            <button type="button" class="btn btn-danger">Excluir</button></a>
        </td> 
      </tr> 
      <?php } ?>       
    </tbody>
  </table>
</div>

<?php require("footer.php"); ?>