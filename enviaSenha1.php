<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MEI.ADM</title>  
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css?version=12">
  <link rel="stylesheet" href="css/navbar.css">
  <script type="text/javascript">
            $(function() {
                var d=1000;
                $('#menu span').each(function(){
                    $(this).stop().animate({
                        'top':'-17px'
                    },d+=250);
                });

                $('#menu > li').hover(
                function () {
                    var $this = $(this);
                    $('a',$this).addClass('hover');
                    $('span',$this).stop().animate({'top':'40px'},300).css({'zIndex':'10'});
                },
                function () {
                    var $this = $(this);
                    $('a',$this).removeClass('hover');
                    $('span',$this).stop().animate({'top':'-17px'},800).css({'zIndex':'-1'});
                }
            );
            })
</script>
 </head> 
<body class="bg-dark">
  <img src="img/logo4.png" width="80">
  <?php
   include "conexao.php";
   $emaila = $_POST['email'];
   $chave = $_POST['cnpj'];
   $sql = "SELECT email FROM tblMei WHERE chave='$chave' and email='$emaila'";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());
    while ($linha = mysqli_fetch_array($resultado)) {
           $emailb = $linha['email'];
         }
  ?>
  <div class="container-fluid">
    <div class="col-12">
          <div class="row mt-2 mb-2 justify-content-sm-center text-primary bg-primary">
            <h3 class="text-light">UM SISTEMA PARA AJUDAR O MEI NA GESTÃO FINANCEIRA</h3>  
          </div>  
    </div>
  <?php
     if($emailb == $emaila) {
  ?> 
<!-- ********************************************************************************************************** -->   
  <div class="row justify-content-sm-center">  
      <div class="card card-login col-sm-5 mt-2 ml-5">
        <div class="card-header">DIGITE SUA NOVA SENHA</div>
        <div class="card-body">
        <form action="enviaSenha2.php" method="post" name="formulario">
          <input type="password" class="form-control" name="email" id="email" value="<?php echo $emaila; ?>" hidden >
          <input type="password" class="form-control" name="chave" id="chave" value="<?php echo $chave; ?>" hidden>
          <div class="form-group">
            <label for="senha1">Nova Senha</label>
            <input type="password" class="form-control" name="senha1" id="senha1" placeholder="Digite sua Nova Senha">
          </div>
          <div class="form-group">
            <label for="senha2">Repita</label>
            <input type="password" class="form-control" name="senha2" id="senha2" placeholder="Repita sua Senha">
          </div>
          <button class="btn btn-primary btn-block">Entrar no Sistema</button>
        </form>
        </div>
    </div>
  </div>
  <?php 
    } 
    else {
     echo "<center><h2><font color='#FFFFF'>SEUS DADOS NÃO CONFEREM!</font></h2></center>";
     echo "<script type = 'text/javascript'> location.href = 'enviaSenha.php'</script>";
    }

  ?> 
  </div>
  
  <? include "footer.php"; ?>

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/micoxAjax.js"></script>  
</body>
</html>