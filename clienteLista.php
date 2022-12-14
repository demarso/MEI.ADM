<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 $hoje = date('Y/m/d');
 $chave = $_SESSION['chave'];
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
      <title>MEI.ADM</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout bg-light">
      <!-- header -->
      <header>
      <!-- header inner -->
      <?php  include ('menu.php'); ?>
      </header>
      <br /><br /><br /><br />
     
   <div class="container">
      <center><h1 class="text-warning">LISTA DE CLIENTES</h1></center>
<table id="tabela" align="center" width="100%" border="1">
   <thead>
      <tr align="center" bgcolor="#CCCCCC">
        <th align="center" style="width: 8%"><font color="#333333" size="2"><b>Edit/Del</b></font></th>
        <th align="center" style="width: 8%"><font color="#333333" size="2"><b>N&ordm;</b></font></th>
        <th align="center" style="width: 20%"><font color="#333333" size="2"><b>Nome</b></font></th>
        <th align="center" style="width: 10%"><font color="#333333" size="2"><b>Nascimento</b></font></th>
        <th align="center" style="width: 10%"><font color="#333333" size="2"><b>Telefone</b></font></th>
        <th align="center" style="width: 10%"><font color="#333333" size="2"><b>Celular</b></font></th>
        <th align="center" style="width: 20%"><font color="#333333" size="2"><b>Email</b></font></th>
        <th align="center" style="width: 5%"><font color="#333333" size="2"><b>Idade</b></font></th>
        <th align="center" style="width: 4%"><font color="#333333" size="2"><b>Info</b></font></th>
      
    <tr align="center" bgcolor="#CCCCCC">
      <th align="center" style="width: 8%"></th>
      <th align="center" style="width: 8%"><input type="text" id="txtColuna2" size="5%"/></th>
      <th align="center" style="width: 20%"><input type="text" id="txtColuna2" size="15%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna3" size="8%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna4" size="8%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna5" size="8%"/></th>
      <th align="center" style="width: 20%"><input type="text" id="txtColuna6" size="15%"/></th>
      <th align="center" style="width: 5%"><input type="text" id="txtColuna6" size="3%"/></th>
      <th align="center" style="width: 4%"></th>
     </tr>
    </thead>
 </table>

    <?php
        include "conexao.php";
        $ano = date("Y");
        $today = date("d/m/Y");
        $con = 1; $soma = 0;
        $sql = "SELECT *, DATE_FORMAT(Nascimento,'%d/%m/%Y') AS dat FROM tblCliente WHERE chave='$chave' ORDER BY Nome";
        $resultado = mysqli_query($conn,$sql) or die (mysql_error());
        while ($linha = mysqli_fetch_array($resultado)) {
    
            $id = $linha['IDCliente'];
            $nome = $linha['Nome'];
            $nascimento = $linha['dat'];
            $telefone = $linha['Telefone'];
            $celular = $linha['Celular'];
            $email = $linha['Email'];
                          
            if ($con % 2 == 0)
                 $bgcolor = "bgcolor='#FFFFFF'";
            else
                 $bgcolor = "bgcolor='#FFFFCC'";

             $partes_nascimento = explode('/',$nascimento);
             $data_nascimento = $partes_nascimento[2].'/'.$partes_nascimento[1].'/'.$partes_nascimento[0];
             $partes_today = explode('/',$today);
             $data_today = $partes_today[2].'/'.$partes_today[1].'/'.$partes_today[0];
             //echo $data_nascimento."  ".$data_today."<br />";
             $diff = abs(strtotime($data_today) - strtotime($data_nascimento)); 
             $years = floor($diff / (365*60*60*24)); 
             $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
             $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
           
             if($years == 1)
              $old = $years." ano";
             else
              $old = $years." anos";
     ?>
   <center>
    <table id="tabela" align="center" width="100%"  border="1">
     <tbody>
      <tr align="center" <? echo $bgcolor; ?>>
        <td align="center" style="width: 8%">
           <?
            echo "<a href=\"javascript:checar1('clienteCadEdita.php?id=".$id."');\"><img src=\"img/letra-e.png\" width=\"20\" border=\"0\" alt=\"Click para editar o cliente.\" title=\"Click para editar a Pessoa.\"></a>&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<a href=\"javascript:checar2('clienteCadDeleta.php?id=".$id."');\"><img src=\"img/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para deletar o cliente.\" title=\"Click para deletar a Pessoa.\"></a>";
           ?>

        </td>
        <td align="center" style="width: 8%" ><font color="#333333" size="2"><b><? echo $con; ?></b></font></td>
        <td align="center" style="width: 20%" onclick="ver('cadPessoa_ver.php?tip='+<? echo $id; ?>,'Dados do Membro',1030,600)" onmouseover="<? echo "Clique para consultar"; ?>><font color="#333333" size="2"><b><? echo $nome; ?></b></font></td>
        <td align="center" style="width: 10%"><font color="#333333" size="2"><b><? echo $nascimento; ?></b></font></td>
        <td align="center" style="width: 10%"><font color="#333333" size="2"><b><? echo $telefone; ?></b></font></td>
        <td align="center" style="width: 10%"><font color="#333333" size="2"><b><? echo $celular; ?></b></font></td>
        <td align="center" style="width: 20%"><font color="#333333" size="2"><b><? echo $email; ?></b></font></td>
        <td align="center" style="width: 5%"><font color="#333333" size="2"><b><? echo $old; ?></b></font></td>
        <td align="center" style="width: 4%">
           <? 
           echo "<a href=\"javascript:checar3('clienteCad_imprime.php?id=".$id."','Dados do Cliente',900,600);\"><img src=\"img/letra-i.png\" width=\"20\" border=\"0\" alt=\"Click para imprimir os dados.\" title=\"Click para imprimir os dados.\"></a>&nbsp;&nbsp;&nbsp;&nbsp;";
           ?>
        </td>
       
      </tr>
     </tbody>
      </table>
    </center>
    <? 
   
    $con = $con + 1;
    }

    $con = $con - 1;
   /* $saldo = number_format(round($saldo * 2 )/ 2,2);
    $soma = number_format($soma, 2, ',', '.');
    $soma2 = "R$ ".$soma; */
    ?>    
    </fieldset>

    </tr> 
</div>
    <? include "footer.php"; ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/micoxAjax.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/script.js"></script>
    <script src="js/micoxAjax.js"></script>
      <script src="js/custom.js"></script>
      <script type="text/javascript">
         $('a[href^="#"]').on('click', function(event) {
         
          var target = $(this.getAttribute('href'));
         
          if( target.length ) {
              event.preventDefault();
              $('html, body').stop().animate({
                  scrollTop: target.offset().top
              }, 2000);
          }
         
         });
              // This example adds a marker to indicate the position of Bondi Beach in Sydney,
         // Australia.
         function initMap() {
           var map = new google.maps.Map(document.getElementById('map'), {
             zoom: 11,
             center: {lat: 40.645037, lng: -73.880224},
             });
         
         var image = 'images/maps-and-flags.png';
         var beachMarker = new google.maps.Marker({
             position: {lat: 40.645037, lng: -73.880224},
             map: map,
             icon: image
           });
         }

       
              function tonal(tipo){
                     var a = tipo;
                     document.location = "consProducao.php?tip="+a;
              }

              function mudaFoto(foto){
                      document.getElementById("icone").src = foto;
              }

              function checar1(pagina) 
             { 
                if (confirm("CONFIRMA A EDICAO DA PESSOA?")==true) 
                  { 
                    window.location=pagina; 
                  } 
             }

              function checar2(pagina) 
              { 
                if (confirm("CONFIRMA A ELIMINA????O DA PESSOA DO BANCO DE DADOS?")==true) 
                  { 
                    window.location=pagina; 
                  } 
              }

              function checar3(pagina, title, w, h) 
              { 

                var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;  
                var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;  
                          
                width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;  
                height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;  
                          
                var left = ((width / 2) - (w / 2)) + dualScreenLeft;  
                var top = ((height / 2) - (h / 2)) + dualScreenTop;  
                var newWindow = window.open(pagina, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);  
              
                // Puts focus on the newWindow  
                if (window.focus) {  
                    newWindow.focus();  
                }  
                /*if (confirm("IMPRESS??O DOS DADOS DA PESSOA?")==true) 
                  { 
                    window.open(pagina,'_blank')
                    //window.location=pagina; 
                  } */
              }

              function checar4(pagina, title, w, h) 
              { 
                var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;  
                var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;  
                          
                width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;  
                height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;  
                          
                var left = ((width / 2) - (w / 2)) + dualScreenLeft;  
                var top = ((height / 2) - (h / 2)) + dualScreenTop;  
                var newWindow = window.open(pagina, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);  
              
                // Puts focus on the newWindow  
                if (window.focus) {  
                    newWindow.focus();  
                }  
               /* if (confirm("CONFIRMA FOTOGRAFAR PESSOA?")==true) 
                  { 
                    window.open(pagina,'_blank')
                    //window.location=pagina; 
                  } */
              }

              function ver(pagina, title, w, h){
                var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;  
                var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;  
                          
                width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;  
                height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;  
                          
                var left = ((width / 2) - (w / 2)) + dualScreenLeft;  
                var top = ((height / 2) - (h / 2)) + dualScreenTop;  
                var newWindow = window.open(pagina, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);  
              
                // Puts focus on the newWindow  
                if (window.focus) {  
                    newWindow.focus();  
                }  
                     /*var v = tip;
                     document.location = "cadPessoa_ver.php?tip="+v;*/
              }
            
                 $(function(){
                 $("#tabela input").keyup(function(){       
                  var index = $(this).parent().index();
                  var nth = "#tabela td:nth-child("+(index+1).toString()+")";
                  var valor = $(this).val().toUpperCase();
                  var soma = 0; 
                  var col = 0;

                  
                  $("#tabela tbody tr").show();
                  $(nth).each(function(){
                      if($(this).text().toUpperCase().indexOf(valor) < 0){
                          $(this).parent().hide();
                      }
                      else{ 
                            soma += parseFloat($('td:nth-child(8)', $(this).parents('tr')).text()); //parseFloat($(this).text()); 
                          }
                      
                      var campos = $(".campo");
                      //converter cole????o de elementos em array.
                      campos = [].slice.apply(campos);
                      $(document).on("input", campos, function (event) {
                        col = (campos.indexOf(event.target) + 1);
                      });


                     var numero = soma.toFixed(2).split('.');
                     numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
                     numero.join(','); 
                     //if(col == 8){
                        $("#resultado").val(numero);
                    // }
                  });
              });
           
              $("#tabela input").blur(function(){
                  $(this).val("");
              });
          });    


      </script>
      <!-- google map js -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
      <!-- end google map js --> 
    
  </body>
</html>

