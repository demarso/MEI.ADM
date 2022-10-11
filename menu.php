<nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark">
  <a class="navbar-brand text-warning" href="index1.php">MEI.ADM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="nav nav-tabs">
<!--********************************************************************************************************************************-->      
      <li class="nav-item dropdown active">
        <a class="nav-link  dropdown-toggle azul" id="navCli" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CLIENTES<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navCli">
          <li class="dropdown-item"><a href="clienteCad.php">Cadastro</a></li>
          <li class="dropdown-item"><a href="clienteLista.php">Lista de Clientes</a></li>
        </ul>
      </li>
<!--********************************************************************************************************************************-->
      <li class="nav-item dropdown active">
        <a class="nav-link  dropdown-toggle" id="navServ" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SERVIÇOS<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navServ">
          <li class="dropdown-item"><a href="servicoCad.php">Cadastro</a></li>
          <li class="dropdown-item"><a href="servicoLista.php">Lista de Serviços</a></li>
        </ul>
      </li>
<!--********************************************************************************************************************************-->
      <li class="nav-item dropdown active">
        <a class="nav-link  dropdown-toggle" id="navFin" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">FINANCEIRO<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navFin">
          <li class="dropdown-item"><a href="entrada.php">Faturamento</a></li>
          <li class="dropdown-item"><a href="entradaLista.php">Lista Faturamento</a></li>
          <li class="dropdown-item"><a href="#">Impime Lista Faturamento</a></li><!--entradaLista_Imprime.php-->
          <li class="dropdown-item"><a href="saida.php">Despesas</a></li>
          <li class="dropdown-item"><a href="saidaLista.php">Lista Despesas</a></li>
          <li class="dropdown-item"><a href="#">Impime Lista Despesas</a></li><!--saidaLista_Imprime.php-->
        </ul>
      </li>
<!--********************************************************************************************************************************
      <li class="nav-item dropdown active">
        <a class="nav-link  dropdown-toggle" id="navAgenda" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">AGENDA<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navAgenda">
          <li class="dropdown-item"><a href="#">Lançar</a></li>
          <li class="dropdown-item"><a href="AgendaLista.php">Ver</a></li>
        </ul>
      </li>
<!--********************************************************************************************************************************
  <li class="nav-item dropdown active">
        <a class="nav-link  dropdown-toggle" id="navfs" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">FSAUDÁVEL<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navfs">
          <li class="dropdown-item"><a href="FsaudavelCad.php">Cadastrar</a></li>
          <li class="dropdown-item"><a href="FsaudavelLista.php">Lista</a></li>
        </ul>
      </li>
<!--********************************************************************************************************************************-->  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item dropdown-menu-right">
        <a class="nav-link" href="sair.php">SAIR</a>
      </li>
    </ul>
  </div>
   <li><font class="text-right text-light" size="1">Chave:&nbsp;<?php echo $_SESSION['chave']; ?>&nbsp;&nbsp;Usu&aacute;rio:&nbsp;<?php echo $_SESSION['login']; ?></font></li>
</nav>