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
<!-- INÍCIO CARROCEL -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- FIM CARROCEL -->    
  <div class="row justify-content-sm-center">  
      <div class="card card-login col-sm-5 mt-2 ml-5">
        <div class="card-header">FAÇA O LOGIN AQUI SE JÁ FOR CADASTRADO</div>
        <div class="card-body">
        <form action="testar.php" method="post" name="form">
            <?php
           if (isset($_GET['errologin'])){
            echo "\n";
            echo "<font size='3' color='#FF0000'><b>&nbsp;&nbsp&nbsp&nbsp*** Dados inválidos! ***</b></font>";
            echo "\n";
            }
           if (isset($_GET['erro'])){
            echo "\n";
            echo "<font size='3' color='#FF0000'><b>*** Coloque o Login e senha válidos primeiro! ***</b></font>";
            echo "\n";
            } 
          ?>
          <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" name="cnpj" id="cnpj" onkeypress="formatar('##.###.###/####-##', this)" onblur="ValidaCNPJ(form.cnpj)" placeholder="Digite seu CNPJ">
          </div>
          <div class="form-group ">
            <label for="email">Seu Login</label>
            <input type="text" class="form-control" name="login" id="login" placeholder="Digite Seu Login">
          </div>
          <div class="form-group">
            <label for="senha">Sua Senha</label>
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua Senha">
          </div>
          <button class="btn btn-primary btn-block">Entrar no Sistema</button>
        </form>
        </div>
    </div>
    <div class="card card-login col-sm-5 mx-auto mt-2">
      <div class="card-header">CLIQUE NA IMAGEM PARA CADASTRAR-SE</div>
      <div class="card-body text-center">
        <a href="chaveCad.php"><img src="img/MEI.jpg" width="300"></a>
      </div>
    </div>
  </div>
  </div>
  <div class="container-fluid mt-2">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/banner2.gif">
        </div>
      </div>
    </div>
  </div>
 <!-- <div class="cookie-consent">
    <span><font color="white">Este site usa cookies para melhorar a experiência do usuário. Veja</font><a href="privacidade.php" class="ml-1 text-decoration-none">Política de Privacidade</a>
    </span>
    <div class="mt-2 d-flex align-items-center justify-content-center g-2">
      <button class="allow-button mr-1">Aceitar Tudo</button>
      <button class="allow-button">Regeitar</button>
    </div>
  </div>-->
  <? include "footer.php"; ?>

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/micoxAjax.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
</body>
</html>