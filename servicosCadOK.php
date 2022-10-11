<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
  <title>Entradas Caixa</title>
  

</head>
<body>
<?php include "menu.php"; ?>
<div id="interface">
 <?php 
    
   $datacad = date('d/m/Y');
   $horacad = date('H:i');
   $datacad2 = date('d/m/Y');
   $horacad2 = date('H:i');
 
    $datacad = $_POST['datacad'];
    $servico = strtoupper($_POST['servico']);
    $valor = $_POST['valor'];
    $observacao = strtoupper($_POST['observacao']);
    $chave = $_SESSION['chave'];
    
    
    
    //echo $associado." ".$empresa." ".$boleto." ".$motivo." ".$recibo." ".$descricao." ".$data." ".$valor."<br /> "

    include "conexao.php";
    
        $sql = "INSERT INTO tblServicos(chave,DataCad,Servico,valor,Observacao,Status) 
            values('$chave','$datacad','$servico','$valor','$observacao',1)";
        $result = mysqli_query($conn,$sql) or die ("Cadastro do Serviço não realizado.");
    
      echo "<script type = 'text/javascript'> location.href = 'servicoCad.php'</script>"; 
   
?>
 </div>
  
</body>
</html>