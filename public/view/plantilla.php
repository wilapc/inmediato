<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <?php 
  if (empty($_SESSION['login'])) {
    echo '<link rel="stylesheet" href="view/source/css/login.css">';
  } else {
    echo '<link rel="stylesheet" href="view/source/css/navbar.css">
          <link rel="stylesheet" href="view/source/css/perfillogs.css">
          <link rel="stylesheet" href="view/source/css/diagnostico.css">';
  }
  ?>
</head>
<body>
  <?php
  $view = new Template();
  
  if (empty($_SESSION['login'])) {
    if (isset($_GET['r'])) {
      $view->view($_GET['r']);
    } else {
      $view->view('login');
    }  
  } else {
    $view->view('inicio');
  }
 ?>
</body>
</html>