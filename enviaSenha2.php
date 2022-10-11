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
<body class="bg-light">
  <div class="container-fluid">
  <img src="img/logo4.png" width="80">
  <?php
   include "conexao.php";
   $email = $_POST['email'];
   $chave = $_POST['chave'];
   $senha1 = $_POST['senha1'];
   $senha2 = $_POST['senha2'];
  echo $email."  ".$chave."  ".$senha1."  ".$senha2."<br /><br />";
  
   if ($senha1 == $senha2){
    $confu1 = "L2xB3Sbia";
    $confu2 = "Dawi748v2";
    $senha2 = $senha1;
    $senha2 = $confu1.$senha2.$confu2;
    $senha2 = hash( 'SHA256',$senha2);
    //echo $senha2;}
    require_once("conexao.php");
     $sql = "UPDATE tblUsuario SET senha='$senha2' WHERE chave='$chave' and email='$email'";
         $result = @mysqli_query($conn,$sql);

    echo "<script type = 'text/javascript'> location.href = 'index.php'</script>";
   }
   else{
    echo "<center><h2><font color='#FFFFF'>SEUS DADOS NÃO CONFEREM!</font></h2></center>";
    echo "<script type = 'text/javascript'> location.href = 'enviaSenha.php'</script>";
   }
   
   ?>
    
  <? include "footer.php"; ?>
</div>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/micoxAjax.js"></script>  
</body>
</html>