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
  $chave = $_GET['chave'];
  $hoje = date("Y-m-d H:i:s");

  require_once("conexao.php");

  $sql = "UPDATE tblMei SET status=0 WHERE IdMei = '$id'";
         $result = @mysqli_query($conn,$sql);

  $sql2 = "UPDATE tblUsuario SET status=0 WHERE chave = '$chave'";
         $result = @mysqli_query($conn,$sql2);
 
echo "<script type = 'text/javascript'> location.href = 'habilita.php'</script>"; 

?>