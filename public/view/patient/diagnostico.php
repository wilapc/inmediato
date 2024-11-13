<?php 
      $check = new Patient();
      $result = $check->verificar_cuestionario();
      if (!empty($result)) { ?>
<div class="container1">

<h1>Click para generar PDF</h1>

<p style=" display: flex; justify-content: center;">
  <a href="../../document/informe_pdf.php">
      <button class="btn">Imprimir</button>
  </a>
</p>

</div>
<?php } else { ?>
  
<div class="container1">

<h1>Realice Primero el cuestionario</h1>

<p style=" display: flex; justify-content: center;">
  <a href="#">
      <button class="btn">Imprimir</button>
  </a>
</p>

</div>

<?php } ?>