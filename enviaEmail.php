<?php
$rsocial = $_GET["rsocial"];
require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");
 $mail = new PHPMailer\PHPMailer\PHPMailer();
 $mail->IsSMTP(); // enable SMTP
 //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
 $mail->SMTPAuth = true; // authentication enabled
 $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
 $mail->Host = "mail.mei.adm.br";
 $mail->Port = 465; // or 587
 $mail->IsHTML(true);
 $mail->Username = "cadastro@mei.adm.br";
 $mail->Password = "Cad@2022";
 $mail->SetFrom("cadastro@mei.adm.br");
 $mail->Subject = "Novo Cadastro no MEI.ADM";
 $mail->Body = "Um novo cliente fez o seu cadastro no sistema MEI.ADM - ".$rsocial;
 $mail->AddAddress("cadastro@mei.adm.br");
    if(!$mail->Send()) {
       echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
       echo "<script type = 'text/javascript'> location.href ='index.php'</script>"; 
    } 

  
   echo "<script type = 'text/javascript'> location.href ='index.php'</script>";  
           
?>