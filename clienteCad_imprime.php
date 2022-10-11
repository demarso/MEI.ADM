<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
date_default_timezone_set('America/Sao_Paulo');
 
error_reporting(E_ALL);
set_time_limit(1800);
set_include_path('src/'.PATH_SEPARATOR.get_include_path());     
include "Cezpdf.php";
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

$pdf = new Creport('a4', 'portrait');
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
$pdf->ezText("<b>DADOS DO CLIENTE</b>",14,array('justification'=>'center'));
$pdf->ezText("\n");

include "conexao.php";

$id = $_GET['id'];

      $sql = "SELECT *, DATE_FORMAT(DataCad,'%d/%m/%Y') AS dac, DATE_FORMAT(Nascimento,'%d/%m/%Y') AS dat  FROM tblCliente WHERE IDCliente = '$id'";
      $resultado = mysqli_query($conn,$sql) or die (mysqli_error($conn));
      while ($linha = mysqli_fetch_array($resultado)) {
              $id = $linha['IDCliente'];
              $datacad = $linha['dac'];
              $nome = $linha['Nome'];
              $nascimento = $linha['dat'];
              $cep = $linha['CEP'];
              $endereco = $linha['Endereco'];
              $bairro = $linha['Bairro'];
              $cidade = $linha['Cidade'];
              $estado = $linha['Estado'];
              $telefone = $linha['Telefone'];
              $celular = $linha['Celular'];
              $email = $linha['Email'];
              $cpf = $linha['CPF'];
              $rg = $linha['RG'];
              $observacoes = $linha['Obs'];
              $foto = $linha['Foto'];


$pdf->ezText("\n");
$pdf->ezText("<b>DADOS DO CLIENTE</b>",center);
$pdf->ezText("\n");
$pdf->ezText("<b>ID: $id</b>");
$pdf->ezText("Data Cadastro: $datacad");
$pdf->ezText("<b>Nome: $nome</b>");
$pdf->ezText("Nascimento: $nascimento");
$pdf->ezText("CEP: $cep");
$pdf->ezText("Endereco: $endereco");
$pdf->ezText("Bairro: $bairro");
$pdf->ezText("Cidade: $cidade");
$pdf->ezText("Estado: $estado");
$pdf->ezText("Telefone: $telefone");
$pdf->ezText("Celular: $celular");
$pdf->ezText("Email: $email");
$pdf->ezText("CPF: $cpf");
$pdf->ezText("RG: $rg");
$pdf->ezText("Observacoes: $observacoes");
$pdf->ezText("\n");
$pdf->addJpegFromFile('fotos/'.$foto,20,$pdf->y-250,200);
}

/*
$data[] = array('ID'=>$id ,'Solicitante'=>$solicitante,'Ramal'=>$ramal,'Descricao'=>$descricao,'Solicitacao'=>$solicitacao,'Executante'=>$executante,'Conclusao'=>$conclusao,'Observacao'=>$observacao,'Stataus'=>$status);
//};

$pdf->ezTable($data,$cols,'',array('xPos'=>25,'xOrientation'=>'right','width'=>550,'cols'=>array('formulario'=>array('width'=>50),'solicitante'=>array('width'=>80),'ramal'=>array('width'=>40),'descricao'=>array('width'=>90),'observacao'=>array('width'=>70),'solicitacao'=>array('width'=>70),'executante'=>array('width'=>80),'conclusao'=>array('width'=>70),'status'=>array('width'=>70))));
$pdf->ezText("\n*** Até $Tmes, foram efetuadas $conta solicitações de manutenção. ***",12);*/

if (isset($_GET['d']) && $_GET['d']) {
    echo $pdf->ezOutput(true);
} else {
    $pdf->ezStream(array('compress' => 0));
}
?>