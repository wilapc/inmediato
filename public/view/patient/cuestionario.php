<?php 
  $check = new Patient();
  $result = $check->verificar_cuestionario();
  if (empty($result)) {
?> 
<div class="container">
    <h1>Cuestionario</h1>
    <p>Por favor llena el cuestionario</p>
    <form action="" method="post">

      <div class="form-group">
        <label>1.	¿Cómo te has sentido en las últimas dos semanas en general?</label>
        <div class="radio-group">
          <label><input type="radio" name="test1" value="Muy bien"> Muy bien</label>
          <label><input type="radio" name="test1" value="Bien"> Bien</label>
          <label><input type="radio" name="test1" value="Neutral"> Neutral</label>
          <label><input type="radio" name="test1" value="Muy mal"> Muy mal</label>
        </div>
      </div>

      <div class="form-group">
        <label>2.	¿Con qué frecuencia te sientes abrumado por tus emociones?</label>
        <div class="radio-group">
          <label><input type="radio" name="test2" value="Nunca"> Nunca</label>
          <label><input type="radio" name="test2" value="Raramente"> Raramente</label>
          <label><input type="radio" name="test2" value="A veces"> A veces</label>
          <label><input type="radio" name="test2" value="Frecuentemente"> Frecuentemente</label>
          <label><input type="radio" name="test2" value="Siempre"> Siempre</label>
        </div>
      </div>

      <div class="form-group">
        <label>3.	¿Te resulta difícil expresar cómo te sientes?</label>
        <div class="radio-group">
          <label><input type="radio" name="test3" value="Nunca"> Nunca</label>
          <label><input type="radio" name="test3" value="Raramente"> Raramente</label>
          <label><input type="radio" name="test3" value="A veces"> A veces</label>
          <label><input type="radio" name="test3" value="Frecuentemente"> Frecuentemente</label>
          <label><input type="radio" name="test3" value="Siempre"> Siempre</label>
        </div>
      </div>

      <div class="form-group">
        <label>4.	¿Sientes que tienes un buen apoyo emocional de amigos o familiares?</label>
        <div class="radio-group">
          <label><input type="radio" name="test4" value="Siempre"> Siempre</label>
          <label><input type="radio" name="test4" value="Frecuentemente"> Frecuentemente</label>
          <label><input type="radio" name="test4" value="A veces"> A veces</label>
          <label><input type="radio" name="test4" value="Raramente"> Raramente</label>
          <label><input type="radio" name="test4" value="Nunca">Nunca </label>
        </div>
      </div>

      <div class="form-group">
        <label>5.	¿Con qué frecuencia te sientes ansioso o preocupado?</label>
        <div class="radio-group">
          <label><input type="radio" name="test5" value="Nunca"> Nunca</label>
          <label><input type="radio" name="test5" value="Raramente"> Raramente</label>
          <label><input type="radio" name="test5" value="A veces"> A veces</label>
          <label><input type="radio" name="test5" value="Frecuentemente"> Frecuentemente</label>
          <label><input type="radio" name="test5" value="Siempre"> Siempre</label>
        </div>
      </div>

      <div class="form-group">
        <label>6.	¿Has experimentado cambios en tus hábitos de sueño (dormir más o menos de lo habitual) en las últimas dos semanas?</label>
        <div class="radio-group">
          <label><input type="radio" name="test6" value="Nunca"> No</label>
          <label><input type="radio" name="test6" value="Raramente"> Si, cambios menores</label>
          <label><input type="radio" name="test6" value="A veces"> Si, cambios significativos</label>
        </div>
      </div>

      <div class="form-group">
        <label>7.	¿Te sientes motivado para realizar tus actividades diarias?</label>
        <div class="radio-group">
          <label><input type="radio" name="test7" value="Siempre"> Siempre</label>
          <label><input type="radio" name="test7" value="Frecuentemente"> Frecuentemente</label>
          <label><input type="radio" name="test7" value="A veces"> A veces</label>
          <label><input type="radio" name="test7" value="Raramente"> Raramente</label>
          <label><input type="radio" name="test7" value="Nunca"> Nunca</label>
        </div>
      </div>

      <div class="form-group">
        <label>8.	¿Te sientes satisfecho con tus interacciones sociales?</label>
        <div class="radio-group">
          <label><input type="radio" name="test8" value="Siempre"> Siempre</label>
          <label><input type="radio" name="test8" value="Frecuentemente"> Frecuentemente</label>
          <label><input type="radio" name="test8" value="A veces"> A veces</label>
          <label><input type="radio" name="test8" value="Raramente"> Raramente</label>
          <label><input type="radio" name="test8" value="Nunca"> Nunca</label>
        </div>
      </div>

      <div class="form-group">
        <label>9.	¿Te resulta difícil concentrarte en tus tareas diarias?</label>
        <div class="radio-group">
          <label><input type="radio" name="test9" value="Nunca"> Nunca</label>
          <label><input type="radio" name="test9" value="Raramente"> Raramente</label>
          <label><input type="radio" name="test9" value="A veces"> A veces</label>
          <label><input type="radio" name="test9" value="Frecuentemente"> Frecuentemente</label>
          <label><input type="radio" name="test9" value="Siempre"> Siempre</label>
        </div>
      </div>

      <div class="form-group">
        <label>10.	¿Has tenido pensamientos negativos sobre ti mismo en las últimas dos semanas?</label>
        <div class="radio-group">
          <label><input type="radio" name="test10" value="Nunca"> Nunca</label>
          <label><input type="radio" name="test10" value="Raramente"> Raramente</label>
          <label><input type="radio" name="test10" value="A veces"> A veces</label>
          <label><input type="radio" name="test10" value="Frecuentemente"> Frecuentemente</label>
          <label><input type="radio" name="test10" value="Siempre"> Siempre</label>
        </div>
      </div>

      <button type="submit" class="submit-btn">Enviar</button>

    </form>

  <?php } else { ?>
  </div>

        <div class="info-box">
    <table>
      <tr>
        <th>Pregunta</th>
        <th>Respuesta</th>
      </tr>
      <tr>
        <td>1.	¿Cómo te has sentido en las últimas dos semanas en general?</td>
        <td><?php echo $result[0]['answer'] ?></td>
      </tr>
      <tr>
        <td>2.	¿Con qué frecuencia te sientes abrumado por tus emociones?</td>
        <td><?php echo $result[1]['answer'] ?></td>
      </tr>
      <tr>
        <td>3.	¿Te resulta difícil expresar cómo te sientes?</td>
        <td><?php echo $result[2]['answer'] ?></td>
      </tr>
      <tr>
        <td>4.	¿Sientes que tienes un buen apoyo emocional de amigos o familiares?</td>
        <td><?php echo $result[3]['answer'] ?></td>
      </tr>
      <tr>
        <td>5.	¿Con qué frecuencia te sientes ansioso o preocupado?</td>
        <td><?php echo $result[4]['answer'] ?></td>
      </tr>
      <tr>
        <td>6.	¿Has experimentado cambios en tus hábitos de sueño (dormir más o menos de lo habitual) en las últimas dos semanas?</td>
        <td><?php echo $result[5]['answer'] ?></td>
      </tr>
      <tr>
        <td>7.	¿Te sientes motivado para realizar tus actividades diarias?</td>
        <td><?php echo $result[6]['answer'] ?></td>
      </tr>

            <tr>
        <td>8.	¿Te sientes satisfecho con tus interacciones sociales?</td>
        <td><?php echo $result[7]['answer'] ?></td>
      </tr>

            <tr>
        <td>9.	¿Te resulta difícil concentrarte en tus tareas diarias?</td>
        <td><?php echo $result[8]['answer'] ?></td>
      </tr>

            <tr>
        <td>10.	¿Has tenido pensamientos negativos sobre ti mismo en las últimas dos semanas?</td>
        <td><?php echo $result[9]['answer'] ?></td>
      </tr>
    </table>
  </div>

  <?php 
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $send = new Patient();
    echo $send->cuestionario_controller();
    
   }
  ?>