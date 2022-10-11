<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MEI.ADM</title>  
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css?version=12">
  <link rel="stylesheet" href="css/navbar.css">
  <script type="text/javascript">
        function formatar(mascara, documento){
                var i = documento.value.length;
                var saida = mascara.substring(0,1);
                var texto = mascara.substring(i)
                if (texto.substring(0,1) != saida){
                documento.value += texto.substring(0,1);
                }
              } 

            $(function() {
                var d=1000;
                $('#menu span').each(function(){
                    $(this).stop().animate({
                        'top':'-17px'
                    },d+=250);
                });

                $('#menu > li').hover(
                function () {
                    var $this = $(this);
                    $('a',$this).addClass('hover');
                    $('span',$this).stop().animate({'top':'40px'},300).css({'zIndex':'10'});
                },
                function () {
                    var $this = $(this);
                    $('a',$this).removeClass('hover');
                    $('span',$this).stop().animate({'top':'-17px'},800).css({'zIndex':'-1'});
                }
            );
            })
</script>
 </head> 
<body class="bg-dark">
  <img src="img/logo4.png" width="80">
  <div class="container-fluid">
    <div class="col-12">
          <div class="row mt-2 mb-2 justify-content-sm-center text-primary bg-primary">
            <h3 class="text-light">Política de privacidade</h3>
          </div>  
    </div>
<!-- INÍCIO PRIVACIDADE -->
    <h3 class="text-light">
      Quem somos

O endereço do nosso site é: https://opcaoambiental.com.br/site.<p>
<p>
Quando os visitantes deixam comentários no site, são guardados os dados presentes no formulário dos comentários, bem como o endereço de IP e o agente do utilizador do navegador, para ajudar com a detecção de spam.<p>
<p>
Uma string anónima criada a partir do seu endereço de email (também designada por hash) pode ser enviada para o serviço Gravatar para verificar se o está a utilizar. A política de privacidade do serviço Gravatar está disponível aqui: https://automattic.com/privacy/. Depois do seu comentário ser aprovado, a fotografia do ser perfil fica visível para o público no contexto do seu comentário.<p>
<p>
Multimédia<p>
<p>
Ao carregar imagens para o site, deve evitar carregar imagens com dados incorporados de geolocalização (EXIF GPS). Os visitantes podem descarregar e extrair os dados de geolocalização das imagens do site.<p>
<p>
Cookies<p>
<p>
Se deixar um comentário no nosso site pode optar por guardar o seu nome, endereço de email e site nos cookies. Isto é para sua conveniência para não ter de preencher novamente os seus dados quando deixar outro comentário. Estes cookies durarão um ano.<p>
<p>
Se visitar a página de início de sessão, será configurado um cookie temporário para determinar se o seu navegador aceita cookies. Este cookie não contém dados pessoais e será eliminado ao fechar o seu navegador.<p>
<p>
Ao iniciar a sessão, serão configurados alguns cookies para guardar a sua informação de sessão e as suas escolhas de visualização de ecrã. Os cookies de início de sessão duram um ano. Se seleccionar "Lembrar-me", a sua sessão irá persistir durante duas semanas. Ao terminar a sessão, os cookies de inicio de sessão serão removidos.<p>
<p>
Se editar ou publicar um artigo, será guardado no seu navegador um cookie adicional. Este cookie não inclui dados pessoais apenas indica o ID de conteúdo do artigo que acabou de editar. Expira ao fim de 1 dia.<p>
<p>
Conteúdo incorporado de outros sites<p>
<p>
Os artigos neste site podem incluir conteúdo incorporado (por exemplo: vídeos, imagens, artigos, etc.). O conteúdo incorporado de outros sites comporta-se tal como se o utilizador visitasse esses sites.<p>
<p>
Este site pode recolher dados sobre si, usar cookies, incorporar rastreio feito por terceiros, monitorizar as suas interacções com o mesmo, incluindo registar as interacções com conteúdo incorporado se tiver uma conta e estiver com sessão iniciada nesse site.<p>
<p>
Com quem são partilhados os seus dados<p>
<p>
Se solicitar uma redefinição de senha, o seu endereço de IP será incluído no email de redefinição.<p>
<p>
Por quanto tempo são retidos os seus dados<p>
<p>
Se deixar um comentário, o comentário e os seus metadados são guardados indefinidamente. Isto acontece de modo a ser possível reconhecer e aprovar automaticamente quaisquer comentários seguintes, em vez de os colocar numa fila de moderação.<p>
<p>
Para utilizadores que se registem no nosso site (se algum), guardamos a informação pessoal fornecida no seu perfil de utilizador. Todos os utilizadores podem ver, editar, ou eliminar a sua informação pessoal a qualquer momento (com a excepção de não poderem alterar o nome de utilizador). Os administradores do site podem também ver e editar essa informação.<p>
<p>
Que direitos tem sobre os seus dados<p>
<p>
Se tiver uma conta neste site, ou deixou comentários, pode pedir para receber um ficheiro de exportação com os dados pessoais guardados sobre si, incluindo qualquer dado pessoal que indicou. Também pode solicitar que os dados guardados sejam eliminados. Isto não inclui qualquer dado pessoal que seja obrigatório manter para fins administrativos, legais ou de segurança.<p>
<p>
Para onde os seus dados são enviados<p>
<p>
Os comentários dos visitantes podem ser verificados através de um serviço automático de detecção de spam.
    </h3>
<!-- FIM PRIVACIDADE -->    
  
  </div>
  
  
  <? include "footer.php"; ?>

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/micoxAjax.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
</body>
</html>