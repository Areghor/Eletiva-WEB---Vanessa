<?php
require("header-inc.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("location: login.php");
	exit;
  }
  
/**
 * Update data in a Table
 */

require_once('connection.php');

if (isset($_POST['enviar'])) {

	$idloc = $_POST['idloc'];
	$locatario = $_POST['locatario'];
	$nomelivro = $_POST['nomelivro'];
	$idlivro = $_POST['idlivro'];

	// Mysql query to update record in a table
	$mysql_query = "UPDATE livros SET locatario='{$locatario}', nomelivro='{$nomelivro}', idlivro='{$idlivro}' WHERE idloc={$idloc}";

	if ($conn->query($mysql_query) === TRUE) {
		$msg = "update success";
		$msgerror = "";
	}
	else {
		$msg = "update error";
		$msgerror = $conn->error;
	}
	header("Location: livros.php?msg={$msg}&msgerror={$msgerror}");
}

if (isset($_GET['idloc'])) {
	$idloc = $_GET['idloc'];
	$mysql_query = "SELECT * FROM livros WHERE id={$idloc}";
	$result = $conn->query($mysql_query);
	$row = mysqli_fetch_assoc($result);
}

// Connection Close
mysqli_close($conn);	
?>
<div class="container">
	<h2>Livro</h2>
  	<p>Atualização do livro alocado.</p>
  	<hr>  	
	<div class="wrapper">
		<form method="post">
			<input type="hidden" name="idloc" value="<?= $row['idloc']; ?>">
			<label for="locatario">&nbsp;Locátario</label>
			<input type="text" name="locatario" id="locatario" class="form-control" required value="<?= $row['locatario']; ?>"><br>
			<label for="nomelivro">&nbsp;Nome do Livro</label>
			<input type="text" name="nomelivro" id="nomelivro" class="form-control"required value="<?= $row['nomelivro']; ?>"><br>
			<label for="idlivro">&nbsp;Data de Retirada</label>
			<input type="text" name="datanasc" id="datanasc" class="form-control" 
												style="width: 200px;" value="<?= $row['datanasc']; ?>"><br>
			<input type="submit" name="enviar" value="Atualizar" class="btn btn-primary w100">
		</form>
	</div>
</div>

<?php require("footer.php"); ?>