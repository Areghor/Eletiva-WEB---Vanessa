<?php
require("header-inc.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("location: login.php");
	exit;
}

/**
 * Insert data into Table
 */

if (isset($_POST['enviar'])) {
    $locatario = $_POST['locatario'];
	$nomelivro = $_POST['nomelivro'];
	$idlivro = $_POST['idlivro'];

	require_once('connection.php');

	// Mysql query to insert record into table
	$mysql_query = "INSERT INTO livros (locatario, nomelivro, idlivro) 
								VALUES ('{$locatario}', '{$nomelivro}', '{$idlivro}')";
	
	$result = $conn->query($mysql_query);

	if ($result === TRUE) {
		$msg =  "insert success";
		$msgerror = "";
	}
	else {
		$msg =  "insert error";
		$msgerror = $conn->error;
	}

	//Connection Close
	mysqli_close($conn);

	header("Location: livros.php?msg={$msg}&msgerror={$msgerror}");
}
?>

<div class="container">
	<h2>Locatário</h2>
  	<p>Cadastro de Locatário.</p>
  	<hr>  	
	<div class="wrapper">
		<form method="post">
			<label for="locatario">&nbsp;Locátario</label>
			<input type="text" name="locatario" id="locatario" class="form-control" required><br>
			<label for="nomelivro">&nbsp;Nome do livro</label>
			<input type="text" name="nomelivro" id="nomelivro" class="form-control"required><br>
			<label for="idlivro">&nbsp;ID do livro</label>
			<input type="text" name="idlivro" id="idlivro" class="form-control" style="width: 200px;"><br>
			<label for="created_at">&nbsp;Data de Retirada</label>
			<input type="date" name="created_at" id="created_at" class="form-control" style="width: 200px;"><br>
			<input type="submit" name="enviar" value="Inserir" class="btn btn-primary w100">
		</form>
	</div>
</div>

<?php require("footer.php"); ?>