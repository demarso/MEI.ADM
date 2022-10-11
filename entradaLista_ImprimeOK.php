<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 $chave = $_SESSION['chave'];
 $hoje = date('Y/m/d');

  $data1 = date('d-m-Y', strtotime ($_POST['data1']));
  $data2 = date('d-m-Y', strtotime ($_POST['data2']));

    
//echo $chave." / ".$data1." / ".$data2;

    include_once("conexao.php");
    $html = '<table border=1';  
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>ID</th>';
    $html .= '<th>Data</th>';
    $html .= '<th>Cliente</th>';
    $html .= '<th>Forma</th>';
    $html .= '<th>Seviço</th>';
    $html .= '<th>Descrição</th>';
    $html .= '<th>Valor</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';
    
    $result = "SELECT *, DATE_FORMAT(Datacad,'%d/%m/%Y') AS dat FROM tblEntrada WHERE Datacad >= '$data1' AND Datacad <='$data2' AND chave='$chave' ORDER BY Datacad DESC";
    $resultado = mysqli_query($conn, $result);
    while($row = mysqli_fetch_assoc($resultado)){
        $html .= '<tr><td>'.$row['idEntrada'] . "</td>";
        $html .= '<td>'.$row['dat'] . "</td>";
        $html .= '<td>'.$row_['Cliente'] . "</td>";
        $html .= '<td>'.$row['Forma'] . "</td>";
        $html .= '<td>'.$row['Servico'] . "</td>";
        $html .= '<td>'.$row['Descricao'] . "</td>";
        $valorf = number_format($row['valor'], 2, ',', '.');
        $html .= '<td>'.$valorf . "</td></tr>";        
    }
    
    $html .= '</tbody>';
    $html .= '</table';

    //referenciar o DomPDF com namespace
    use Dompdf\Dompdf;
    use Dompdf\Options;

    $options = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $dompdf = new Dompdf($options);



    // include autoloader
    require_once("dompdf/autoload.inc.php");

    //Criando a Instancia
    $dompdf = new DOMPDF();
    
    // Carrega seu HTML
    $dompdf->load_html('
            <h1 style="text-align: center;">Lista do Faturamento</h1>
            '. $html .'
        ');

    //Renderizar o html
    $dompdf->render();
    //Exibibir a página
    $dompdf->stream(
        "relatorio_Faturamento.pdf", 
        array(
            "Attachment" => true //Para realizar o download somente alterar para true
        )
    );
    		
    		
?>