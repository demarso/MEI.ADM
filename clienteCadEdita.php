<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: indexa.php?erro=1");
    exit;
 }
 $hoje = date('Y/m/d');
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
        <title>Gestão da PIBBM</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="css/estilo.css" type="text/css"/>
        <link rel="stylesheet" href="css/styles_menu.css" type="text/css"/>
        <script type="text/javascript" src="include/script.js"></script>
        <script type="text/javascript" src="include/jquery.js"></script>
        <script type="text/javascript" src="include/micoxAjax.js"></script>
        <script type="text/javascript" src="include/jquery-1.3.2.js"></script>  
        <script type="text/javascript" src="include/maskedinput-1.1.4.pack.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="include/script_menu.js"></script>
                
    </head>
<body>
  <?php 
    include "menu.php"; 
   ?>
  <div id="interface"><br />
    <center><h1>EDITA CADASTRO DE PESSOAS - PIB BARRA MANSA</h1></center>
      <fieldset id="forms" style="background-color:#E9E9E9">
        <?php 
             include "conexao.php";
            $id = $_GET['id'];
            $sql = "select * from tblPessoa where IDPessoa = '$id'";
           $resultado = mysqli_query($conn,$sql) or die (mysql_error());
           while ($linha = mysqli_fetch_array($resultado)) {

              $id = $linha['IDPessoa'];
              $datacad = $linha['Datacad'];
              $nome = $linha['Nome'];
              $nascimento = $linha['Nascimento'];
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
              $estadocivil = $linha['Civil'];
              $escolaridade = $linha['Escolaridade'];
              $profissao = $linha['Profissao'];
              $situacao = $linha['Situacao'];
              $pai = $linha['pai'];
              $mae = $linha['mae'];
              $batizado = $linha['Batizado'];
              $igrejabatismo = $linha['IgrBatismo'];
              $databatismo = $linha['DataBatismo'];
              $status = $linha['Status'];
              $observacoes = $linha['Observacoes'];
              $foto = "fotos\\".$id.".jpg";
              
        ?>
        <form action="cadPessoa_editaOK.php" method="post" name="form1" enctype="multipart/form-data" >
            <table>
            <tr align="left">
            <td><label for="datacad"><b>ID:</b></label></td>
            <td><input type="text" name="id" id="id" size="5" value="<?php echo $id; ?>" readonly disable ></td>
            </tr>
            <tr align="left">
            <td><label for="datacad"><b>Data do Cadastro:</b></label></td>
            <td style="border-color:transparent"><input type="date" name="datacad" id="datacad" tabindex="1" value="<?php echo date('Y-m-d',strtotime($datacad));?>" title="Informe a data do cadastro" readonly/></td>
            </tr>
            <tr align="left">
            <td> <label for="nome"><b>Nome:</b></label></td>
            <td style="border-color:transparent"><input type="text" name="nome" id="nome" size="80" tabindex="2" value="<?php echo $nome; ?>" style="text-transform:uppercase;" title="Informe o nome"/></td> 
            
            </tr>&nbsp;&nbsp;<input type="text" name="Matric" id="Matric" size="30" hidden="true" >
            <br />
            <tr align="left">
            <td><label for="nascimento"><b>Data de Nascimento:</b></label></td>
            <td style="border-color:transparent"><input type="date" name="nascimento" id="nascimento" value="<?php echo date('Y-m-d',strtotime($nascimento));?>" tabindex="3" title="Informe a data do nascimento"/></td>
            </tr>
            <tr align="left">
           <td> <label for="cep"><b>CEP:</b></label></td>
            <td style="border-color:transparent"><input type="text" name="cep" id="cep" value="<?php echo $cep; ?>" required="true" tabindex="4" onBlur="getEndereco()" onKeyPress="MascaraCep(this)" maxlength="9" title="Informe o CEP"  />&nbsp;&nbsp;Endereço automático. Acrescente apenas o número.</td>
            </tr>
             <tr align="left">
            <td><label for="endereco"><b>Endereço:</b></label></td>
            <td style="border-color:transparent"><input type="text" name="endereco" value="<?php echo $endereco; ?>" id="endereco" tabindex="5" size="80" style="text-transform:uppercase;" title="Informe o endereço"/></td>
            </tr>
             <tr align="left">
            <td><label for="bairro"><b>Bairro:</b></label></td>
            <td style="border-color:transparent"><input type="text" name="bairro" value="<?php echo $bairro; ?>" readonly id="bairro" size="40" tabindex="-1" title="Informe o bairro" /></td>
            </tr>
             <tr align="left">
            <td><label for="cidade"><b>Cidade:</b></label></td>
          <td style="border-color:transparent"><input type="text" name="cidade" value="<?php echo $cidade; ?>" readonly id="cidade" size="40" tabindex="-1" title="Informe a cidade" /></td>
          </tr>
          <tr align="left">
            <td><label for="estado"><b>Estado:</b></label></td>
           <td style="border-color:transparent"> <input name="estado" id="estado" value="<?php echo $estado; ?>" readonly size="3" tabindex="-1" title="Informe o Estado"></td>
           </tr>
           <tr align="left">
            <td><label for="telefone"><b>Telefone:</b></label></td>
            <td style="border-color:transparent"><input type="tel" name="telefone" value="<?php echo $telefone; ?>" id="telefone" tabindex="6"   maxlength="14" onKeyPress="MascaraTelefone(form1.telefone)" title="Informe o telefone Residencial" /></td>
            </tr>
             <tr align="left">
            <td><label for="celular"><b>Celular:</b></label></td>
            <td style="border-color:transparent"><input type="tel" name="celular" value="<?php echo $celular; ?>" id="celular"  tabindex="7" maxlength="15" onKeyPress="MascaraCelular(form1.celular)" title="Informe o celular" /></td>
            </tr>
            <tr align="left">
            <td><label for="email"><b>Email:</b></label></td>
            <td style="border-color:transparent"><input type="email" name="email" value="<?php echo $email; ?>" id="email" tabindex="8" tabindex="11" onblur="ValidaEmail();"  title="Informe um email válido" />
            </td>
            <tr align="left">
            <td><label for="cpf"><b>CPF:</b></label></td>
            <td style="border-color:transparent"><input type="text" name="cpf" value="<?php echo $cpf; ?>" id="cpf" tabindex="9" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"  align="left" onblur="ValidaCPF()" maxlength="14" onKeyPress="MascaraCPF(form1.cpf)" title="Informe o CPF"/></td>
            </tr>
            <tr align="left">
            <td><label for="rgMemb"><b>RG:</b></label></td>
            <td style="border-color:transparent"><input type="text" name="rg" id="rg" value="<?php echo $rg; ?>" tabindex="10"  align="left" maxlength="15"  title="Informe o RG"/></td>
            </tr>
            <tr align="left">
            <td><label for="estadocivil"><b>Estado Civil:</b></label></td>
           <td style="border-color:transparent">
            <select name="estadocivil" id="estadocivil" tabindex="11" title="Informe o Estado Civil">
                <option value="<?php echo $estadocivil; ?>"><?php echo $estadocivil; ?></option>
                <option value="SOLTEIRO">SOLTEIRO(a)</option>
                <option value="CASADO">CASADO(a)</option>
                <option value="VIUVO">VIUVO(a)</option>
                <option value="DIVORCIADO">DIVORCIADO(a)</option>
                <option value="OUTRO">OUTRO</option>
            </select></td>
            </tr>
             <tr align="left">
            <td><label for="escolaridade"><b>Escolaridade:</b></label></td>
           <td style="border-color:transparent">
            <select name="escolaridade" id="escolaridade" tabindex="12" title="Informe a escolaridade">
                <option value="<?php echo $escolaridade; ?>"><?php echo $escolaridade; ?></option>
                <option value="ANALFABETO">ANALFABETO(a)</option>
                <option value="LÊ E ESCREVE">LÊ E ESCREVE</option>
                <option value="1º GRAU">1º GRAU</option>
                <option value="2º GRAU">2º GRAU</option>
                 <option value="TÉCNICO">TÉCNICO</option>
                <option value="SUPERIOR">SUPERIOR</option>
                 <option value="MESTRADO">MESTRADO</option>
                <option value="DOUTORADO">DOUTORADO</option>
            </select></td>
            </tr>
             <tr align="left">
           <td> <label for="profissao"><b>Profissão:</b></label></td>
            <td style="border-color:transparent"><input type="text" name="profissao" id="profissao" value="<?php echo $profissao; ?>" size="80" tabindex="13"  title="Informe a profissão"/></td>
            </tr>
            <tr align="left">
              <td> <label for="profissao"><b>Nome do Pai:</b></label></td>
              <td style="border-color:transparent"><input type="text" name="pai" id="pai"  size="80" tabindex="15" value="<?php echo $pai; ?>"  title="Informe o nome do Pai"/></td>
            </tr>
            <tr align="left">
              <td> <label for="profissao"><b>Nome da Mãe:</b></label></td>
              <td style="border-color:transparent"><input type="text" name="mae" id="mae"  size="80" tabindex="16" value="<?php echo $mae; ?>" title="Informe o nome da Mãe"/></td>
            </tr>
             <tr align="left">
            <td><label for="situacao"><b>Situação:</b></label></td>
           <td style="border-color:transparent">
            <select name="situacao" id="situacao"  tabindex="14" title="Informe a situação de emprego">
                <option value="<?php echo $situacao; ?>"><?php echo $situacao; ?></option>
                <option value="EMPRESARIO">EMPRESARIO(a)</option>
                <option value="EMPREGADO">EMPREGADO(a)</option>
                <option value="AUTONOMO">AUTÔNOMO</option>
                <option value="DESEMPREGADO">DESEMPREGADO(a)</option>
                <option value="APOSENTADO">APOSENTADO(a)</option>
            </select></td>
            </tr>
            <tr align="left">
                <td> <label for="batizado"><b>Batizado?:</b></label></td>
                <td>
                    <input type="radio" name="batizado" id="batizado" value="SIM"  
                          <? if($batizado == "SIM"){?> checked="true" <?}?>
                                      onclick="if(document.getElementById('igrejabatismo').disabled==true){    
                                      document.getElementById('igrejabatismo').disabled=false;
                                      document.getElementById('databatismo').disabled=false;
                                      }"> SIM
                    <input type="radio" name="batizado" id="batizado" value="NAO"
                          <? if($batizado == "NAO"){?> checked="true" <?}?>
                          onclick="if(document.getElementById('igrejabatismo').disabled==false){
                                      document.getElementById('igrejabatismo').disabled=true;
                                      document.getElementById('databatismo').disabled=true;
                                    }"> NÃO
                </td>
             </tr>   
            <tr align="left">
            <td> <label for="igrejabatismo"><b>Batizado na Igreja:</b></label></td>
            <td style="border-color:transparent"><input type="text" name="igrejabatismo" id="igrejabatismo" value="<?php echo $igrejabatismo; ?>" size="80" tabindex="15" style="text-transform:uppercase;" title="Informe a igreja em que for batizado"/></td>
            </tr>
            <tr align="left">
            <td><label for="databatismo"><b>Data do Batismo:</b></label></td>
            <td style="border-color:transparent"><input type="date" name="databatismo" id="databatismo" value="<?php echo date('Y-m-d',strtotime($databatismo));?>" maxlength="10" tabindex="16" title="Informe a data do batismo"/></td>
            </tr>
            <tr align="left">
           <td><label for="status"><b>Status:</b></label></td>
           <td><select name="status" id="status" class="textbox2" tabindex="18" >
               <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                            <?php
                            //Busco os estados
                            require_once("conexao.php");
                            $sql = "SELECT Status FROM tblStatus";
                            $results = mysqli_query($conn, $sql);
                            while ( $row = mysqli_fetch_array($results) ) {
                                echo "<option value='".$row[0]."'>".$row[0]."</option>";
                            }
                            ?>
                  </select></td>
            </tr>
            <tr align="left">
           <td> <label for="observacoes"><b>Outras informações:</b></label></td>
            <td style="border-color:transparent"><input type="text" name="observacoes" value="<?php echo $observacoes; ?>" id="observacoes"  size="80" tabindex="19"  title="Outras informações pertinentes"/></td>
            </tr>
            </table><br /><br />
        
            <center> 
                <table width="30">
                    <tr >
                        <td><center><input type="submit" class="button" name="cadastrar"  value="Atualizar Cadastro"  /></td>
                    </tr>
                </table>
            </center>
         
        </form>
      <? } ?>
    </fieldset>
   
 </div>
</body>
</html>