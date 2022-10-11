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
         function formatar(mascara, documento){
                var i = documento.value.length;
                var saida = mascara.substring(0,1);
                var texto = mascara.substring(i)
                if (texto.substring(0,1) != saida){
                documento.value += texto.substring(0,1);
                }
              } 
              
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
   <div class="row justify-content-sm-center">  
    <div class="card card-login col-sm-5 mx-auto mt-2">
      <div class="card-header">CADASTRE-SE PARA USAR O SISTEMA</div>
      <div class="card-body">
        <form action="MeiCad.php" method="post" name="form">
            <div class="form-group ">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" name="cnpj" id="cnpj" maxlength="18" onkeypress="formatar('##.###.###/####-##', this)" onBlur="ajaxGet('processConsultaCNPJ.php?Matr='+this.value,document.getElementById('Matric'),true);" placeholder="Digite Seu CNPJ" required>&nbsp;&nbsp;<input type="text" name="Matric" id="Matric" size="30" hidden="true" >
          </div>
          <div class="form-group">
            <label for="RSocial">Razão Social</label>
            <input type="text" class="form-control" name="RSocial" id="RSocial" placeholder="Digite sua Razão Social" required>
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Digite seu E-mail" required>
          </div>
          <div class="form-group">
            <label for="login">Login</label>
            <input type="text" class="form-control" name="login" id="login" placeholder="Digite deu Login" required>
          </div>
          <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua Senha" required>
          </div>
          <button class="btn btn-primary btn-block">Entrar no Sistema</button>
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
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/custom.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>