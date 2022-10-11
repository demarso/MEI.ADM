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
    $descricao = strtoupper($_POST['descricao']);
    $valordi= $_POST['valordi'];
    $valordb = $_POST['valordb'];
    $valorcr = $_POST['valorcr'];
    $valorbl = $_POST['valorbl'];
    $valordi = str_replace(',','.', str_replace('.','', $valordi));
    $valordb = str_replace(',','.', str_replace('.','', $valordb));
    $valorcr = str_replace(',','.', str_replace('.','', $valorcr));
    $valorbl = str_replace(',','.', str_replace('.','', $valorbl));
    $datasaida = $_POST['datasaida'];
    $recibo = $_POST['recibo'];
    $obs = $_POST['observacao'];
    $chave = $_SESSION['chave'];
    
    
    //echo $associado." ".$empresa." ".$boleto." ".$motivo." ".$recibo." ".$descricao." ".$data." ".$valor."<br /> "

    include "conexao.php";
    if(!empty($valordi)){
        $sql = "INSERT INTO tblSaida(chave,DataCad,Descricao,Forma,DataSaida,Recibo,Obs,Valor) 
            values('$chave','$datacad','$descricao','Dinheiro','$datasaida','$recibo','$obs','$valordi')";
        $result = mysqli_query($conn,$sql) or die ("Cadastro da Saída do Caixa não realizado.");
    }
    if(!empty($valordb)){
        $sql = "INSERT INTO tblSaida(chave,DataCad,Descricao,Forma,DataSaida,Recibo,Obs,Valor) 
            values('$chave','$datacad','$descricao','Débito','$datasaida','$recibo','$obs','$valordb')";
        $result = mysqli_query($conn,$sql) or die ("Cadastro da Saída do Caixa não realizado.");
    }
    if(!empty($valorcr)){
        $sql = "INSERT INTO tblSaida(chave,DatDataCadacad,Descricao,Forma,DataSaida,Recibo,Obs,Valor) 
            values('$chave','$datacad','$descricao','Crédito','$datasaida','$recibo','$obs','$valorcr')";
        $result = mysqli_query($conn,$sql) or die ("Cadastro da Saída do Caixa não realizado.");
    }
    if(!empty($valorbl)){
        $sql = "INSERT INTO tblSaida(chave,DataCad,Descricao,Forma,DataSaida,Recibo,Obs,Valor) 
            values('$chave','$datacad','$descricao','Boleto','$datasaida','$recibo','$obs','$valorbl')";
        $result = mysqli_query($conn,$sql) or die ("Cadastro da Saída do Caixa não realizado.");
    }
      echo "<script type = 'text/javascript'> location.href = 'entrada.php'</script>"; 
   
?>
 </div>
  
</body>
</html>