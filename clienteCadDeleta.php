<?php

require_once("conexao.php");

$id = $_GET['id'];
$sql = "DELETE FROM tblCliente WHERE IDCliente = '$id'";
mysqli_query($conn,$sql) or die (mysql_error());
 
echo "<script type = 'text/javascript'> location.href = 'clienteCadLista.php'</script>"; 

?>