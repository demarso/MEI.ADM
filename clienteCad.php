<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 $hoje = date('Y/m/d');
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MEI.ADM</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css?version=12">
  <link rel="stylesheet" href="css/navbar.css?version=12">
  <script>
      (function($){
      $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass("show");
        });

        return false;
      });
    })(jQuery)
</script>
</head>
<body class="bg-light">
  <img src="img/logo4.png" width="80">
  <header>
    <?php  include ('menu.php'); ?>
  </header> 
  <div class="container" id="clienteCad">
                             
    <font class="text-warning" face="Verdana" size="10px">Cadastro de Clientes</font>
                  
    <form name="form1" method="post" action="clienteCadOK.php">
    <!-- ********************************************************************************************************************** -->          
          <div class="form-group row mt-2 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="datacadA">Data do Cadastro:</label>
            <div class="col-md-3">
              <input type="date" class="form-control" name="datacad" id="datacad" tabindex="-1" value="<?php echo date('Y-m-d',strtotime($hoje));?>">
            </div>
          </div>
    <!-- ********************************************************************************************************************** -->           
          <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="nome">Nome:</label>
            <div class="col-md-6">
              <input type="text" class="form-control" autofocus name="nome" id="nome" size="80" tabindex="1" onBlur="ajaxGet('processConsultaCliente.php?nome='+this.value,document.getElementById('Matric'),true);"  style="text-transform:uppercase;" titleplaceholder="Informe o nome" required>
              <input type="text" class="form-control" name="Matric" id="Matric" size="30" hidden="true">
            </div>
          </div>
    <!-- ********************************************************************************************************************** -->
          <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="nascimento">Data de Nascimento:</label>
            <div class="col-md-3">
              <input type="date" class="form-control" name="nascimento" id="nascimento" tabindex="2" placeholder="Data do Nascimento">
            </div>
          </div>
    <!-- ********************************************************************************************************************** -->          
          <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="cep">CEP:</label>
            <div class="col-md-3">
              <input type="text" class="form-control" name="cep" id="cep" tabindex="3" maxlength="9" onblur="pesquisacep(this.value);"  tabindex="3" placeholder="Informe o CEP">
            </div>
          </div>
    <!-- ********************************************************************************************************************** --> 
          <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="endereco">Endereço:</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="endereco" id="endereco" tabindex="-1" size="80">
            </div>
            <label class="col-form-label" for="numero">Número:</label>
            <div class="col-md-1">
              <input type="text" class="form-control" name="numero" id="numero" tabindex="4" >
            </div>
          </div>
         
    <!-- ********************************************************************************************************************** --> 
          <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="complemento">Complemento:</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="complemento" id="complemento" size="50" tabindex="5">
            </div>
          </div>
    <!-- ********************************************************************************************************************** --> 
          <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="bairro">Bairro:</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="bairro" id="bairro" size="50" tabindex="-1">
            </div>
          </div>
    <!-- ********************************************************************************************************************** --> 
          <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="cidade">Cidade:</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="cidade" id="cidade" size="50" tabindex="-1">
            </div>
          </div>
    <!-- ********************************************************************************************************************** --> 
          <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="estado">Estado:</label>
            <div class="col-md-1">
              <input type="text" class="form-control" name="estado" id="estado" tabindex="-1">
            </div>
          </div>
    <!-- ********************************************************************************************************************** --> 
          <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="telefone">Telefone:</label>
            <div class="col-md-3">
              <input type="text" class="form-control" name="telefone" id="telefone" maxlength="14" onKeyPress="MascaraTelefone(form1.telefone)" tabindex="6" placeholder="Telefone Residencial" >
            </div>
          </div>
    <!-- ********************************************************************************************************************** --> 
          <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="celular">Celular:</label>
            <div class="col-md-3">
              <input type="text" class="form-control" name="celular" id="celular" tabindex="7" maxlength="15" onKeyPress="MascaraCelular(form1.celular)" placeholder="Informe o celular" >
            </div>
          </div>
    <!-- ********************************************************************************************************************** --> 
          <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="email">E-mail:</label>
            <div class="col-md-6">
              <input type="email" class="form-control" name="email" tabindex="8" id="email" placeholder="Informe o E-mail" >
            </div>
          </div>
    <!-- ********************************************************************************************************************** --> 
          <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="cpf">CPF:</label>
            <div class="col-md-3">
              <input type="cpf" class="form-control" name="cpf" id="cpf" size="80" onBlur="ValidarCPF(form1.cpf)" tabindex="9"  maxlength="14"  placeholder="Informe o CPF">
            </div>
          </div>

    <!-- ********************************************************************************************************************** -->   <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="rg">RG:</label>
            <div class="col-md-3">
              <input type="text" class="form-control" tabindex="10" name="rg" id="rg"  maxlength="15" placeholder="Informe o RG">
            </div>
          </div>
   
    <!-- ********************************************************************************************************************** -->   
          <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="cpf">CNPJ:</label>
            <div class="col-md-3">
              <input type="cpf" class="form-control" name="cnpj" id="cnpj" size="80" onBlur="ValidarCNPJ(form1.cnpj)" tabindex="11"  maxlength="18"  placeholder="Informe o CPF">
            </div>
          </div>

    <!-- ********************************************************************************************************************** -->         <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="rg">Estado Civil:</label>
            <div class="col-md-3">
              <select class="form-control" name="civil" id="civil" tabindex="11">
                <option value="" class="text-muted">- - -</option>
                  <option value="Solteiro">Solteiro(a)</option>
                  <option value="Casado">Casado(a)</option>
                  <option value="Viúvo">Viúvo(a)</option>
                  <option value="Divorciado">Divorciado(a)</option>
                  <option value="Outro">Outro</option>
              </select>
              
            </div>
          </div>

    <!-- ********************************************************************************************************************** -->      <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="rg">Sexo:</label>
            <div class="col-md-6">
              <INPUT TYPE="RADIO" NAME="sexo" VALUE="Masculino" tabindex="13"> Masculino
              <INPUT TYPE="RADIO" NAME="sexo" VALUE="Feminino"> Feminino
            </div>
          </div>
    <!-- ********************************************************************************************************************** -->           <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="rg">Profissão:</label>
            <div class="col-md-3">
              <input type="text" class="form-control" tabindex="14" name="profissao" id="profissao"  maxlength="30" placeholder="Informe a profissão">
            </div>
          </div>

    <!-- ********************************************************************************************************************** -->
          <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label text-success" for="observacoes">Outras informações:</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="observacoes" id="observacoes" tabindex="30" placeholder="Outras informações">
            </div>
          </div>
    <!-- ********************************************************************************************************************** -->
          <div class="form-group mt-2">
            <div class="form-row">
              <button class="btn btn-primary btn-block">S A L V A R</button>
            </div>
          </div>

    <!-- ********************************************************************************************************************** --> 
    </form>
      
  </div> 
   <? include "footer.php"; ?>   <!-- end footer -->
      <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/script.js?version=12"></script>
    <script src="js/jquery.inputmask.bundle.js"></script>
      <script type="text/javascript">
        (function($){
          $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
            if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');

            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
            });

            return false;
          });
        })(jQuery)

      $("#cep").inputmask({
          mask: ["99999-999",],
          keepStatic: true
      });

      $("#celular").inputmask({
          mask: ["(99) 99999-9999",],
          keepStatic: true
      });

      $("#telefone").inputmask({
          mask: ["(99) 9999-9999",],
          keepStatic: true
      });

      $("#cpf").inputmask({
          mask: ["999.999.999-99",],
          keepStatic: true
      });


      $("#cnpj").inputmask({
          mask: ["99.999.999/9999-99",],
          keepStatic: true
      });
 
     function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
            //document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('endereco').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
            //document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('endereco').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";
               // document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
                
      </script>
   
   </body>
</html>

