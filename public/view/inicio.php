<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

  <!---------------------- BARRA DE NAVEGACION  ------------------------------>
  <?php include "component/navegation.php"; ?>

  <!---------------------- CONTENIDO  ------------------------------>
  <?php 
    $vista = new Template();
    if (isset($_GET['url'])) $vista->getView($_GET['url']); else $vista->getView('inicio');
  ?>
  <!---------------------- FOOTER  ------------------------------>
