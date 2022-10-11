<?php
$id = $_GET["id"];

  $sql = "SELECT email, rsocial FROM tblMei WHERE IdMei = '$id'";
        $resultado = mysqli_query($conn,$sql) or die (mysql_error());
        while ($linha = mysqli_fetch_array($resultado)) {
    
            $email = $linha['email'];
            $rsocial = $linha['RSocial'];
         }

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
 $mail->Body = "Seu acesso ao sistema MEI.ADM foi leberado- ".$rsocial;
 $mail->AddAddress($email);
    if(!$mail->Send()) {
       echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
       echo "<script type = 'text/javascript'> location.href ='index.php'</script>"; 
    } 

  
   echo "<script type = 'text/javascript'> location.href ='index.php'</script>";  
           
?>