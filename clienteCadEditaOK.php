<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: indexa.php?erro=1");
    exit;
 }
 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
        <title>Gestão da PIBBM</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="css/estilo.css" type="text/css"/>
        <link rel="stylesheet" href="css/styles_menu.css" type="text/css"/>
        <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="include/script_menu.js"></script>
    </head>
<body>
  <? include "menu.php" ?><br />
  <div id="interface"><br />
  <?php
      include("conexao.php");
      
      $ano = date('Y');
      $id = $linha['IDCliente'];
      $datacad = $_POST['datacad'];
      $nome = strtoupper($_POST['nome']);
      $nascimento = $_POST['nascimento'];
      $cep = $_POST['cep'];
      $endereco = strtoupper($_POST['endereco']);
      $numero = $_POST['numero'];
      $complemento = $_POST['complemento'];
      $bairro = $_POST['bairro'];
      $cidade = $_POST['cidade'];
      $estado = $_POST['estado'];
      $telefone = $_POST['telefone'];
      $celular = $_POST['celular'];
      $email = $_POST['email'];
      $cpf = $_POST['cpf'];
      $rg = $_POST['rg'];
      $observacoes = $_POST['observacoes'];
   
     //echo $id." ".$nome." ".$nascimento." ".$status." ".$telefone;
    
        include "conexao.php";

     $sql = "update tblCliente set
                    Nome='$nome',
                    Nascimento='$nascimento',
                    CEP='$cep',
                    Endereco='$endereco',
                    Numero='$numero',
                    Complemento='$omplemento',
                    Bairro='$bairro',
                    Cidade='$cidade',
                    Estado='$estado',
                    Telefone='$telefone',
                    Celular='$celular',
                    Email='$email',
                    CPF='$cpf',
                    RG='$rg',
                    Obs='$observacoes' 
                    where IDCliente='$id'";
    $result = @mysqli_query($conn,$sql);

       echo "<script type = 'text/javascript'> location.href = 'clienteCadLista.php'</script>";
                   
     ?>
 </div>
    <footer id="footer">   
       <?php include "footer.php"; ?>
    </footer>
</body>
</html>