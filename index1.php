<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 $id=$_SESSION['id'];$login=$_SESSION['login'];$chave=$_SESSION['chave'];
 include "conexao.php";
  $sql = "SELECT status FROM tblUsuario WHERE IDUsuario = '$id' and login = '$login' and chave='$chave'";
  $tabela = mysqli_query($conn,$sql) or die(mysql_error());
          while ($linha = mysqli_fetch_array($tabela)) {
                $status = $linha['status'];
          if ($status == 0)
          {
           echo "<script>alert(\"Você ainda não foi ativado!\");history.back(-1);</script>";
           exit;
          }}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MEI.ADM</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css?version=12">
  <link rel="stylesheet" href="css/navbar.css?version=12">
  <script>
      (function($){
      $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass("show");
        });

        return false;
      });
    })(jQuery)
</script>
</head>
<body class="bg-light">
  <img src="img/logo4.png" width="80">
  <header>
    <?php  include ('menu.php'); ?>
  </header> 
  <div class="container" id="home">
    <div class="row">
      <div class="col-12 text-center mt-5">
        <h1>GESTÃO FINANCEIRA</h1>
      </div>
    </div>
 </div>
 <? include "footer.php"; ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>  
</body>
</html>