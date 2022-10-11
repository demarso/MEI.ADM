<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 /*if($_SESSION['nivelF'] != 10){
   echo "<script>alert('Você não tem permissão para acessar está página!');history.back(-1);</script>";
   exit;
  }*/
 
  $id = $_GET['id'];
  $hoje = date("Y-m-d H:i:s");

  require_once("conexao.php");

  $sql = "DELETE FROM tblEntrada WHERE idEntrada = '$id'";
  mysqli_query($conn,$sql) or die (mysql_error());
 
echo "<script type = 'text/javascript'> location.href = 'entradaLista.php'</script>"; 

?>