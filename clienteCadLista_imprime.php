<?php
session_start();
 if (!isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}

date_default_timezone_set('America/Sao_Paulo');
 
error_reporting(E_ALL);
set_time_limit(1800);
set_include_path('src/'.PATH_SEPARATOR.get_include_path());     
include 'Cezpdf.php';
class Creport extends Cezpdf
{
    public function __construct($p, $o)
    {
        parent::__construct($p, $o, 'none', array());
        $this->isUnicode = true;
        $this->allowedTags .= '|uline';
        // always embed the font for the time being
        //$this->embedFont = false;
    }
}

$pdf = new Creport('a4', 'landscape');
// to test on windows xampp
if (strpos(PHP_OS, 'WIN') !== false) {
    $pdf->tempPath = 'C:/temp';
}
// IMPORTANT: In version >= 0.12.0 it is required to allow custom tags (by using $pdf->allowedTags) before using it
$pdf->allowedTags .= '|comment:.*?';
$pdf->ezSetMargins(20, 20, 20, 20);
$pdf->selectFont('Helvetica');
$pdf->ezStartPageNumbers(570,10,10,'','',1);

$pdf->addJpegFromFile('images/logo.jpg',30,$pdf->y-55,60);
$pdf->ezText("<b>LISTA DE CLIENTES</b>",14,array('justification'=>'center'));
$pdf->ezText("\n\n");

include "conexao.php";
         $ano = date("Y");
        
        $today = date("d/m/Y");

      $sql = "SELECT *, DATE_FORMAT(Nascimento,'%d/%m/%Y') AS dat FROM tblCliente ORDER BY Nome";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
            $id = $linha['IDCliente'];
            $nome = $linha['Nome'];
            $nascimento = $linha['dat'];
            $telefone = $linha['Telefone'];
            $celular = $linha['Celular'];
            $email = $linha['Email'];


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

$data[] = array('Nº'=>$con ,'Nome'=>$nome,'Nascimento'=>$nascimento,'Telefone'=>$telefone,'Celular'=>$celular,'E-mail'=>$email,'Idade'=>$old);
$con=$con+1;
}


$pdf->ezTable($data,$cols,'',array('xPos'=>25,'xOrientation'=>'right','width'=>550,'cols'=>array('Nº'=>array('width'=>30),'Nome'=>array('width'=>230),'Nascimento'=>array('width'=>65),'Telefone'=>array('width'=>80),'Celular'=>array('width'=>90),'E-mail'=>array('width'=>200),'Idade'=>array('width'=>60))));

    echo $pdf->ezOutput(true);

?>