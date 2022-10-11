<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
	
	if (empty($_POST['senha']) || empty($_POST['login']))
        {
		echo "<script>alert(\"Preencha corretamente!\");history.back(-1);</script>";
		exit;
	}
	$senha = addslashes($_POST['senha']);
    $login = addslashes($_POST['login']);
    $chave = addslashes($_POST['cnpj']);
	
	$confu1 = "L2xB3Sbia";
	$confu2 = "Dawi748v2";
	$senha1 = $senha;
	$senha1 = $confu1.$senha1.$confu2;
	$senha1 = hash( 'SHA256',$senha1);
  	//echo $login." ".$senha." ".$senha1;
	/*if (mysqli_errno())
    {
	   echo "ERRO : " . mysql_errno() . "</body></html>";
	   exit;
	}
	//echo $login." ".$senha."<br  />";*/
    
    include "conexao.php";
	$sql = "SELECT * FROM tblUsuario WHERE senha = '$senha1' and login = '$login' and chave='$chave'";
	$tabela = mysqli_query($conn,$sql) or die(mysql_error());
	$registro = mysqli_num_rows($tabela);
	//echo $registro."<br  />"; 
	if ($registro == 0)
        {
	     header('Location: index.php?errologin=1');
         exit;
	    }
    else
        {
          
          
			$reg = mysqli_fetch_array($tabela, MYSQLI_ASSOC);
			//echo $reg['IDUsuario']." ".$reg['Nome']." ".$reg['nivel']." ".$reg['login']." ".$reg['senha']."<br  />";
			$_SESSION['id'] = $reg['IDUsuario'];
			$_SESSION['nome'] = $reg['Nome'];
			$_SESSION['chave'] = $reg['chave'];
			$_SESSION['nivel'] = $reg['nivel'];
			$_SESSION['login'] = $reg['login'];
			//$_SESSION['regio'] = $reg['regional'];
			//$_SESSION['pag'] = 0;
			
			//echo $_SESSION['id']." ".$_SESSION['nome']." ".$_SESSION['nivel']." ".$_SESSION['idIgreja'];

			if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    		{
      			$ip=$_SERVER['HTTP_CLIENT_IP'];
    		}
      		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
      		{
        		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
      		}
         	else
         	{
           		$ip=$_SERVER['REMOTE_ADDR'];
         	}
	  
				$data = date("Y-m-d - H:i:s");
				$addr = $ip;
				$self = $_SERVER['PHP_SELF'];
				$usu = $_SESSION['login'];
				$niv = $_SESSION['nivel'];
				$chave = $_SESSION['chave'];
               
	 			   $sql_cad = "INSERT INTO tblacesso(chave,nome,addr,data,motivo) VALUES ('$chave','$usu','$addr','$data','Entrou')";
        		   $result_cad = mysqli_query($conn,$sql_cad) or die ("Cadastro de acesso não realizado.");
                 
			//echo "<script>window.open('index1.php', '_blank');</script>";
			header('Location: index1.php');
            
		}
?>