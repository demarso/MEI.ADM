<?php
  session_start();
  include "conexao.php";
  
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
               
           $sql_cad = "INSERT INTO tblacesso(chave,nome,addr,data,motivo) VALUES ('$chave','$usu','$addr','$data','Saiu')";
               $result_cad = mysqli_query($conn,$sql_cad) or die ("Cadastro de acesso não realizado.");

  $_SESSION  = array ();
  if (isset($_COOKIE[session_name()]))
     {
       setcookie(session_name(), '', time() - 42000, '/');
     }
  session_unset();
  session_destroy();
	
  header("Location: index.php");
?>
<script language="javascript">
window.close();
</script>
