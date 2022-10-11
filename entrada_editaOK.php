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
   $idEntrada = $_POST['idEntrada'];
    $datacad = $_POST['datacad'];
    $cliente = strtoupper($_POST['cliente']);
    //$boleto = $_POST['boleto'];
    $valordi= $_POST['valordi'];
    $valordb = $_POST['valordb'];
    $valorcr = $_POST['valorcr'];
    $valorbl = $_POST['valorbl'];
    $valordi = str_replace(',','.', str_replace('.','', $valordi));
    $valordb = str_replace(',','.', str_replace('.','', $valordb));
    $valorcr = str_replace(',','.', str_replace('.','', $valorcr));
    $valorbl = str_replace(',','.', str_replace('.','', $valorbl));
    $servico = $_POST['servico'];
    $recibo = $_POST['recibo'];
    $descricao = $_POST['observacao'];
    
    
    
    //echo $associado." ".$empresa." ".$boleto." ".$motivo." ".$recibo." ".$descricao." ".$data." ".$valor."<br /> "

    include "conexao.php";
    if($valordi != 0.00){
        $sql = "UPDATE tblEntrada SET Datacad='$datacad',Cliente='$cliente',Forma='Dinheiro',Servico='$servico',Recibo='$recibo',Descricao='$descricao',Valor='$valordi' WHERE idEntrada='$idEntrada'";
        $result = mysqli_query($conn,$sql) or die ("Ediçao da Entrada do Caixa não realizado.");
    }
    if($valordb != 0.00){
        $sql = "UPDATE tblEntrada SET Datacad='$datacad',Cliente='$cliente',Forma='Débito',Servico='$servico',Recibo='$recibo',Descricao='$descricao',Valor='$valordb' WHERE idEntrada='$idEntrada'";
        $result = mysqli_query($conn,$sql) or die ("Ediçao da Entrada do Caixa não realizado.");
    }
    if($valorcr != 0.00){
        $sql = "UPDATE tblEntrada SET Datacad='$datacad',Cliente='$cliente',Forma='Crédito',Servico='$servico',Recibo='$recibo',Descricao='$descricao',Valor='$valorcr' WHERE idEntrada='$idEntrada'";
        $result = mysqli_query($conn,$sql) or die ("Ediçao da Entrada do Caixa não realizado.");
    }
    if($valorbl != 0.00){
        $sql = "UPDATE tblEntrada SET Datacad='$datacad',Cliente='$cliente',Forma='Boleto',Servico='$servico',Recibo='$recibo',Descricao='$descricao',Valor='$valorbl' WHERE idEntrada='$idEntrada'";
        $result = mysqli_query($conn,$sql) or die ("Ediçao da Entrada do Caixa não realizado.");
    }
      echo "<script type = 'text/javascript'> location.href = 'entradaLista.php'</script>"; 
   
?>
 </div>
  
</body>
</html>