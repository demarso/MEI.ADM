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
  <div class="container-fluid">
    <div class="col-12">
          <div class="row mt-2 mb-2 justify-content-sm-center text-primary bg-primary">
            <h3 class="text-light">UM SISTEMA PARA AJUDAR O MEI NA GESTÃO FINANCEIRA</h3>  
          </div>  
    </div>
<!-- ********************************************************************************************************** -->   
  <div class="row justify-content-sm-center">  
      <div class="card card-login col-sm-5 mt-2 ml-5">
        <div class="card-header">DIGITE SEU EMAIL CADASTRADO</div>
        <div class="card-body">
        <form action="enviaSenha1.php" method="post" name="formulario">
          <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" name="cnpj" id="cnpj" onkeypress="MascaraCNPJ(this)" onblur="ValidaCNPJ(this.cnpj)" placeholder="Digite seu CNPJ">
          </div>
          <div class="form-group">
            <label for="cnpj">E-mail Cadastrado</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Digite seu EMAIL">
          </div>
          
          <button class="btn btn-primary btn-block">E N V I A R</button>
        </form>
        </div>
    </div>
  </div>
  </div>
  
  <? include "footer.php"; ?>

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/micoxAjax.js"></script>  
</body>
</html>