<?php
  header("Content-Type: text/html; charset=ISO-8859-1",true);
  require_once("conexao.php");
  session_start();
    $matr = $_GET["nome"];
    $chave = $_SESSION['chave'];
		$sql = "SELECT Nome FROM tblCliente WHERE chave  = '$chave' and Nome = '$matr'";
	$results = mysqli_query($conn,$sql) or die (mysql_error());
	  while ( $row = mysqli_fetch_array($results )) {
		if(!empty($row["Nome"]))
		   echo $row["Nome"].'        ';
		   echo "<script>alert('Cliente ja cadastrado!!'); location.reload(true);</script>";
	       exit; 
      }

?>