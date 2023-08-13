<?php include "_top.php"; ?>

<h1>Galeria</h1>

<div class="galleria">
  <?php
  foreach (scandir("./obrazy") as $plik) {
    if ($plik[0] != ".") {
      echo "<img src='./obrazy/$plik'>";
    }
  }
  ?>
</div>

<script>
  Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
  Galleria.run('.galleria');
</script>

<?php include "_bottom.php"; ?>