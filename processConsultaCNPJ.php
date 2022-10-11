<?php
  header("Content-Type: text/html; charset=ISO-8859-1",true);
  require_once("conexao.php");
  session_start();
    $matr = $_GET["Matr"];
		$sql = "SELECT chave FROM tblMei WHERE chave  = '$matr'";
	$results = mysqli_query($conn,$sql) or die (mysql_error());
	  while ( $row = mysqli_fetch_array($results )) {
		if(!empty($row["chave"]))
		   echo $row["chave"].'        ';
		   echo "<script>alert('CNPJ ja cadastrado!!'); location.reload(true);</script>";
	       exit; 
      }

?>