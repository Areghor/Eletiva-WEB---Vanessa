<?php
require("header-inc.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<div class="container">
  <h2>Dashboard</h2>
  <p>Olá, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Seja bem vindo ao nosso site.</h1>
  <hr>  
  <p>&nbsp;</p>
  <p>Clique em "Início" logo acima para ir para a página inicial</p>
  <p>Clique em "Resete a sua senha" para redefinir sua senha.</p>
  <p>Caso queira sair de seu Login, basta clicar em "Logout/Sair".</p>
  <p>
    <a href="reset-password.php" class="btn btn-warning">Resete a sua senha</a>
    <a href="logout.php" class="btn btn-danger ml-3">Logout/Sair</a>
  </p>
</div>

<?php require("footer.php"); ?>