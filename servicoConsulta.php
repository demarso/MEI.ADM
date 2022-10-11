<?php
header("Content-Type: text/html; charset=ISO-8859-1",true);
  require_once("conexao.php");
    $nomm = $_GET["nome"];
	$sql = "SELECT Tempo FROM tblServicos WHERE Servico  = '$nomm'";
	$results = mysqli_query($conn,$sql) or die (mysql_error());
	  while ( $row = mysqli_fetch_array($results )) {
		   echo $row["Tempo"]; 
      }
 
?>