<?php 
    if(empty($_SESSION['fk_status'])){
?>

<div class="container">
    <h1>Preguntas</h1>
    <p>Por favor llena la información</p>
    <form action="" method="post">
      <div class="form-group">
        <label for="condition">Condición</label>
        <input type="text" id="condition" name="condicion_pat" required>
      </div>
      <div class="form-group">
        <label for="mood">Estado del ánimo</label>
        <input type="text" id="mood" name="animo_pat" required>
      </div>
      <div class="form-group">
        <label for="emotion">Nombre de la emoción</label>
        <input type="text" id="emotion" name="emocion_pat" required>
      </div>
      <div class="form-group">
        <label>Tipo</label>
        <div class="radio-group">
          <label><input type="radio" name="tipo_pat" value="Estres"> Estres</label>
          <label><input type="radio" name="tipo_pat" value="Ansiedad"> Ansiedad</label>
          <label><input type="radio" name="tipo_pat" value="Frustracion"> Frustración</label>
          <label><input type="radio" name="tipo_pat" value="Insatisfaccion"> Insatisfacción</label>
        </div>
      </div>
      <div class="form-group">
        <label for="qualitative-eval">Evaluaciones Cualitativas</label>
        <textarea id="qualitative-eval" name="evaluaciones_pat" required></textarea>
      </div>
      <div class="form-group">
        <label for="medical-reports">Informes médicos</label>
        <textarea id="medical-reports" name="informes_pat" required></textarea>
      </div>
      <button type="submit" class="submit-btn">Enviar</button>
    </form>
  </div>
  <?php } else { 
      $ver_respuestas = new Patient();
      $print= $ver_respuestas->mostrar_formulario_paciente();
    ?>
      <div class="info-box">
    <table>
      <tr>
        <th>Nombre de Campo</th>
        <th>Dato</th>
      </tr>
      <tr>
        <td>Condición</td>
        <td><?php echo $print['condicion'] ?></td>
      </tr>
      <tr>
        <td>Estado de Ánimo</td>
        <td><?php echo $print['state_of_mind'] ?></td>
      </tr>
      <tr>
        <td>Nombre de la Emoción</td>
        <td><?php echo $print['emotion_name'] ?></td>
      </tr>
      <tr>
        <td>Tipo</td>
        <td><?php echo $print['type_clasification'] ?></td>
      </tr>
      <tr>
        <td>Evaluaciones Cualitativas</td>
        <td><?php echo $print['evaluation'] ?></td>
      </tr>
      <tr>
        <td>Informes Médicos</td>
        <td><?php echo $print['medical_report'] ?></td>
      </tr>
    </table>
  </div>
  <?php 
  }
  $send = new Patient();
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo $send->formulario_paciente_controller();
  }

  ?>