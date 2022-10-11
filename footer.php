<!-- Footer -->
  <footer class="text-center text-white" style="background-color: #0a4275;">
    <!-- Grid container -->
    <?php if ($_SESSION['login'] == "demarso"){ ?>
        <div class="container p-4 pb-0">
        <a class="text-white" href="habilita.php" target="_blank">Habilita</a>
        </div>
    <?php } ?>
    
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © <? echo date('Y'); ?> Copyright:
      <a class="text-white" href="https://www.idbras.com.br/" target="_blank">IDBRAS</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->