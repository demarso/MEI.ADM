<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
/*if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }*/

 define("MAX_SIZE","9000");

function getExtension($str) {

    $i = strrpos($str,".");

    if (!$i) {
        return "";
    }

    $l = strlen($str) - $i;

    $ext = substr($str,$i+1,$l);

    return $ext;
}

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

    $uploaddir = "uploads/"; // directoria que vai receber os ficheiros

    foreach ($_FILES['photos']['name'] as $name => $value) {

        $filename = stripslashes($_FILES['photos']['name'][$name]);

        $size=filesize($_FILES['photos']['tmp_name'][$name]);

        /* Recolhe extensão do ficheiro em caixa baixa (lowercase)
         */
        $ext = getExtension($filename);
        $ext = strtolower($ext);

        if (in_array($ext,$valid_formats)) {

            if ($size < (MAX_SIZE*1024)) {

                $image_name=time().$filename;

                $newname=$uploaddir.$image_name;

                if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) {
                    /* ficheiro carregado com sucesso,
                     * envia HTML com imagem para apresentar ao visitante
                     */
                    echo "<img src='".$uploaddir.$image_name."' class='imgList'>";
                } else {
                    echo '<span class="imgList">Ficheiro não foi carregado!</span>';
                }
            } else {
                echo '<span class="imgList">Limite de tamanho atingido!</span>';
            }
        } else {
            echo '<span class="imgList">Extensão do ficheiro desconhecida!</span>';
        }
    }
}
 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
        <title>MEI.CAD</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="css/estilo.css" type="text/css"/>
        <link rel="stylesheet" href="css/styles_menu.css" type="text/css"/>
        <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="include/script_menu.js"></script>
    </head>
<body>
  <? include "menu.php" ?><br />
  <div id="interface"><br />
  <?php
      include("conexao.php");
      $ano = date('Y');
      $datacad = date('Y-m-d');
      $chave = $_POST['cnpj'];
      $rsocial = $_POST['RSocial'];
      $email = $_POST['email'];
      $login = $_POST['login'];
      $senha = $_POST['senha'];
      $status = $_POST['status'];
      
        $confu1 = "L2xB3Sbia";
        $confu2 = "Dawi748v2";
        $senha1 = $senha;
        $senha1 = $confu1.$senha1.$confu2;
        $senha1 = hash( 'SHA256',$senha1);
  
         $sql = "INSERT INTO tblMei(
                        DataCad,
                        chave,
                        RSocial,
                        email,
                        login,
                        senha,
                        status
                        )
                        VALUES
                        ('$datacad',
                        '$chave',
                        '$rsocial',
                        '$email',
                        '$login',
                        '$senha1',
                        '0'
                        )";
                        $result = mysqli_query($conn,$sql) or die ("Cadastro de MEI não realizado.");

        $sql2 = "INSERT INTO tblUsuario(
                        Nome,
                        chave,
                        login,
                        senha,
                        status
                        )
                        VALUES
                        ('$rsocial',
                        '$chave',
                        '$login',
                        '$senha1',
                        '0'
                        )";
                        $result = mysqli_query($conn,$sql2) or die ("Cadastro de Usuário não realizado.");
                  
                          
                    echo "<script>alert(\"Cadaatro Realizado. Faça o LOGIN!\");</script>";

 /* ** Envia E-mail ********************************************************************************************* */ 
 
          

                    echo "<script type = 'text/javascript'> location.href = 'enviaEmail.php?rsocial=$rsocial'</script>";
                   
     ?>
 </div>
    <footer id="footer">   
       <?php include "footer.php"; ?>
    </footer>
</body>
</html>