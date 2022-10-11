<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 $chave = $_SESSION['chave'];
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
      <header>
            <?php  include ('menu.php'); ?>
      </header>
    <br /><br /><br /><br />

  <div class="container">

    <font class="text-warning" face="Verdana" size="7px">Lista Financeiro Despesas</font>
   <font class="text-info" face="Verdana" size="3px">
   <form name='form1' action='<? $myself ?>' method='post'>
   <tabel>
    <tr>
           <td><font color="cyan"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECIONE AS DATAS:</b></font>
           &nbsp;&nbsp;&nbsp;&nbsp;
          <font size="3">Data Inicial:</font>&nbsp;&nbsp;&nbsp;&nbsp;
             <input type="date" name="data1" id="data1" size="15" tabindex="3"> 
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <font size="3">Data Final:</font>&nbsp;&nbsp;&nbsp;&nbsp;
             <input type="date" name="data2" id="data2" size="15" tabindex="3">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <input type="submit" value="BUSCAR" onclick="this.form.submit()">
          </td>
    
    </tr>
   </tabel>
 
  </form>   
<?php
      
   if(isset($_POST['data1'])){
      $data1 = $_POST['data1'];
      $data2 = $_POST['data2'];}
   else{
      $data1 = date('Y/m').'/'.date(1, mktime(0,0,0, date('m'),'01', date('Y')));
      $data2 = date('Y/m').'/'.date("t", mktime(0,0,0, date('m'),'01', date('Y')));//date("Y/m/d");
      }

  //if(isset($_POST['data1'])){
?>
<br />
  <h2 class="text-info">Entradas de <? echo date('d/m/Y',strtotime($data1))." a ".date('d/m/Y',strtotime($data2)) ?></h2>
 	<table class="table table-sm mt-0 mb-0" id="tabela">
   <thead>
	  <tr align="center" bgcolor="#CCCCCC">
	    <th align="center" style="width: 8%"><font color="#333333" size="2"><b>Edit/Del</b></font></th>
      <th align="center" style="width: 10%"><font color="#333333" size="2"><b>Data Despesas</b></font></th>
		  <th align="center" style="width: 25%"><font color="#333333" size="2"><b>Descrição</b></font></th>
      <th align="center" style="width: 10%"><font color="#333333" size="2"><b>Forma</b></font></th>
	    <th align="center" style="width: 10%"><font color="#333333" size="2"><b>Recibo/NF</b></font></th>
      <th align="center" style="width: 10%"><font color="#333333" size="2"><b>Valor</b></font></th>
	  </tr>
    <tr align="center" bgcolor="#CCCCCC">
      <th align="center" style="width: 8%"></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna2" size="5%"/></th>
      <th align="center" style="width: 25%"><input type="text" id="txtColuna3" size="15%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna4" size="20%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna5" size="15%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna6" size="10%"/></th>
      
   </tr>
	</thead>
 </table>

	<?php
		include "conexao.php";
		
		$today = date("d/m/Y");
    $dataH = date('Y/m/d');
		$con = 1; $soma = 0;
		$sql = "SELECT *, DATE_FORMAT(Datacad,'%d/%m/%Y') AS dat FROM tblSaida WHERE Datacad >= '$data1' AND Datacad <='$data2' AND chave='$chave' ORDER BY Datacad DESC";
		$resultado = mysqli_query($conn,$sql) or die (mysql_error());
		while ($linha = mysqli_fetch_array($resultado)) {
    
			$idEntrada = $linha['idEntrada'];
      $datacad = $linha['dat'];
			$descricao = $linha['Descricao'];
			$forma = $linha['Forma'];
			$datasaida = $linha['DataSaida'];
			$recibo = $linha['Recibo'];
      $obs = $linha['obs'];
      $valor = $linha['Valor'];
      $valorf = number_format($valor, 2, ',', '.');
      $soma =  $soma + $valor;
      
			
      
			if ($con % 2 == 0)
				 $bgcolor = "bgcolor='#FFFFFF'";
			else
				 $bgcolor = "bgcolor='#FFFFCC'";
	 ?>
   <center>
    <table class="table table-hover table-sm mt-0 mb-0" id="tabela">
     <tbody>
     
  	  <tr align="center" <? echo $bgcolor; ?>>
  	  
        <td align="center" style="width: 8%">
  		   <?
  		   echo "<a href=\"javascript:checar1('entrada_edita.php?id=".$idEntrada."');\"><img src=\"img/letra-e.png\" width=\"20\" border=\"0\" alt=\"Click para editar o Entrada.\" title=\"Click para editar o Entrada.\"></a>&nbsp;&nbsp;&nbsp;&nbsp;";
  		   echo "<a href=\"javascript:checar2('entrada_deleta.php?id=".$idEntrada."');\"><img src=\"img/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para deletar o Entrada.\" title=\"Click para deletar o Entrada.\"></a>";
  		   ?>
  		</td>
  	    <td align="center" style="width: 8%" ><font color="#333333" size="2"><b><? echo $datasaida; ?></b></font></td>
  	    <td align="center" style="width: 25%"><font color="#333333" size="2"><b><? echo $descricao; ?></b></font></td>
  	    <td align="center" style="width: 10%"><font color="#333333" size="2"><b><? echo $forma; ?></b></font></td>
        <td align="center" style="width: 10%"><font color="#333333" size="2"><b><? echo $recibo; ?></b></font></td>
        <td class="campo" lign="right" style="width: 10%" ><font color="#333333" size="2"><b><? echo $valorf; ?></b></font></td>
      </tr>
     </tbody>
	  </table>
    </center>
  <? 
   
	$con = $con + 1;
	}

	$con = $con - 1;
	$saldo = number_format(round($saldo * 2 )/ 2,2);
  $soma2 = number_format($soma, 2, ',', '.');
  $soma2 = "R$ ".$soma2;

   // $sql = "UPDATE caixaSaldo SET valor='$soma' where data='$dataH'";
   // $result = @mysqli_query($conn,$sql);
	?>
 </div>
    <div style="position: relative; margin-right: 100px" align="right">
         Total: <b><input id="resultado" type="text" align="right" size="10" style="color: blue; font-weight: bold;" value="<? echo $soma2; ?>" readonly /></b>
    </div>
</div>
<? //}  ?>
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
    function tonal(tipo){
           var a = tipo;
           document.location = "consProducao.php?tip="+a;
    }

    function mudaFoto(foto){
            document.getElementById("icone").src = foto;
    }

    function checar1(pagina) 
   { 
      if (confirm("CONFIRMA A EDICAO DA ENTRADA DA ENTRADA?")==true) 
        { 
          window.location=pagina; 
        } 
   }

    function checar2(pagina) 
    { 
      if (confirm("CONFIRMA A EXCLUSAO DA DA ENTRADA?")==true) 
        { 
          window.location=pagina; 
        } 
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
              soma += parseFloat($('td:nth-child(7)', $(this).parents('tr')).text()); //parseFloat($(this).text()); 
           }                 
            var campos = $(".campo");
            //converter coleção de elementos em array.
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
</body>
</html>