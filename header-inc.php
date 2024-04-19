<?php
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Trabalho PHP&MySQL</title>
</head>

<body>
    <?php
    // Check if the user is already logged in, if not then redirect to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        // Check if the current page is not the login page
        if(basename($_SERVER['PHP_SELF']) != 'login.php') {
            header("location: login.php");
            exit;
        }
    }
    ?>
    <div id="container-imagem"></div>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Biblioteca Virtual</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Início <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="livros.php">Locátarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="livro.php">Livros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contato.php">Contato</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { ?>
                        <a class="nav-link" href="login.php">Login</a>
                    <?php } else { ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo htmlspecialchars($_SESSION["username"]); ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </div>
                    <?php } ?>
                </span>
            </div>
        </nav>
    </header>
    <main>
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            $msgerror = $_GET['msgerror'];
            if ($msg == 'insert success') {
                echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso!</div>";
            } else if ($msg == 'insert error') {
                echo "<div class='alert alert-danger' role='alert'>Falha ao inserir o registro! {$msgerror}</div>";
            } else if ($msg == 'update success') {
                echo "<div class='alert alert-success' role='alert'>Registro atualizado com sucesso!</div>";
            } else if ($msg == 'update error') {
                echo "<div class='alert alert-danger' role='alert'>Falha ao atualizar o registro! {$msgerror}</div>";
            } else if ($msg == 'delete success') {
                echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso!</div>";
            } else if ($msg == 'delete error') {
                echo "<div class='alert alert-danger' role='alert'>Falha ao excluir o registro! {$msgerror}</div>";
            }
        }
        ?>
        <p>&nbsp;</p>
    </main>
</body>

</html>
