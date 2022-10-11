<?php
session_start();
 $hoje = date('Y/m/d');
?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Vivian Martins</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/camera.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
              
    </head>
<body>
        <?php
            $id = $_GET['id'];
            $_SESSION['idFoto'] = $id;
            include "conexao.php";
            $sql = "SELECT Nome FROM tblCliente WHERE IDCliente='$id'";
            $resultado = mysqli_query($conn,$sql) or die (mysql_error());
            while ($linha = mysqli_fetch_array($resultado)) {
        
                $name = $linha['Nome'];
            }
            echo "<center><H1>FOTO DO CILENTE: ".$name."</H1></center><br />";
        ?>    
      <div class="area">
        <video autoplay="true" id="webCamera">
        </video>
        <form target="POST">
          <textarea  type="text" id="base_img" name="base_img"></textarea>
          <button type="button" onclick="takeSnapShot()">Tirar foto e salvar</button>
        </form>
        <img id="imagemConvertida"/>
        <p id="caminhoImagem" class="caminho-imagem"><a href="" target="_blank"></a></p>
      </div>
      <script src="js/camera.js"></script>
</body>
</html>







