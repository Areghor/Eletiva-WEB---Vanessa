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

require_once('connection.php');

if (isset($_POST['enviar'])) {
    $id_livro  = $_POST['id_livro'];
	$nome_livro = $_POST['nome_livro'];
	$data_disponibilidade = $_POST['data_disponibilidade'];
	$id_autor = $_POST['id_autor'];

	// Mysql query to insert record into table
	$mysql_query = "INSERT INTO livro (id_livro, nome_livro, data_disponibilidade, id_autor) 
								VALUES ('{$id_livro}', '{$nome_livro}', '{$data_disponibilidade}', '{$id_autor}')";
	
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

	header("Location: livro.php?msg={$msg}&msgerror={$msgerror}");
} else {
	$mysql_query = "SELECT * FROM livro ORDER BY biblioteca";
	$result = $conn->query($mysql_query);

	//Connection Close
	mysqli_close($conn);
}
?>

<div class="container">
	<h2>Livros</h2>
  	<p>Acrescente um novo livro diponível.</p>
  	<hr>  	
	<div class="wrapper">
		<form method="post">
			<label for="descricao">&nbsp;Descrição</label>
			<input type="text" name="descricao" id="descricao" class="form-control" style="width: 500px;" required><br>
			<label for="data_inicio">&nbsp;Início</label>
			<input type="date" name="data_inicio" id="data_inicio" class="form-control" style="width: 200px;"><br>
			<label for="duracao">&nbsp;Duração (em minutos)</label>
			<input type="text" name="duracao" id="duracao" class="form-control" style="width: 50px;"><br>
			<br>
			<input type="submit" name="enviar" value="Inserir" class="btn btn-primary w100">
		</form>
	</div>
</div>

<?php require("footer.php"); ?>