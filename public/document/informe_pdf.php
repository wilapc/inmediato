<?php 
session_start();
ob_start(); 
?> 
 
<!DOCTYPE html> 
<html> 
  <head> 
    <meta charset="UTF-8"> 
    <title>generar informe</title> 
    <style> 
      body { 
        font-family: Arial, sans-serif; 
        font-size: 12px; 
        line-height: 1.5; 
        margin: 20px; 
      } 
      table { 
        width: 100%; 
        border-collapse: collapse; 
      } 
      th, td { 
        padding: 8px; 
        text-align: left; 
        border-bottom: 1px solid #ddd; 
      } 
      .header { 
        background-color: #f2f2f2; 
        font-weight: bold; 
      } 
      p{ 
        font-family: Arial, sans-serif; 
        font-size: 17px; 
        line-height: 1.5; 
        margin: 20px; 
        text-align: justify 
      } 
    </style> 
  </head> 
  <body> 
  <div style="text-align: center;"> 
    <h4>CERTIFICADO MEDICO-PSICOLOGICO<br>DE SALUD MENTAL</h4> 
    <p> 
        El que suscribe Janaima Anastacio Álava, licenciada en  
        Psicología legamente<br>autoriza para ejercer su profesión 
    </p> 
  </div> 
 
    <h2 style="text-align: center;">INFORME PRELIMINAR</h2> 
 
    <p>  
    Estado general: indicó sentirse “mal”. Esto sugiere que está pasando por un  
    período difícil o experimentando emociones negativas. 
    Emociones abrumadoras: A veces se siente abrumada por sus emociones. Esto podría  
    indicar momentos de vulnerabilidad o ansiedad. 
    Expresión emocional: A veces le resulta difícil expresar cómo se siente. Esto podría  
    afectar su comunicación y búsqueda de apoyo emocional. 
    Apoyo emocional: Siente que tiene un buen apoyo emocional de amigos o familiares. Esto  
    es positivo para la salud mental. Ansiedad y preocupación: A veces se siente ansiosa o  
    preocupada. Es importante prestar atención a estos sentimientos. Cambios en el sueño:  
    No ha experimentado cambios significativos en sus hábitos de sueño. Esto es alentador. 
    Motivación para actividades diarias: A veces se siente motivada para realizar sus actividades  
    cotidianas. Es normal tener altibajos en la motivación. Satisfacción con interacciones sociales: 
    A veces se siente satisfecha con sus interacciones sociales. Puede considerar fortalecer sus conexiones  
    sociales. 
    Concentración en tareas diarias: A veces le resulta difícil concentrarse en sus tareas cotidianas.  
    Esto podría afectar su productividad.  
    Autoimagen negativa: Ha tenido pensamientos negativos sobre sí misma en ocasiones. Es fundamental  
    trabajar en una autoimagen más positiva. 
    </p> 
 
 
    <table> 
      <tr>
        <td> 
          <p style="text-align: center;">Dr. Janaima Anastacio Álava<br>(0412-3551892)<br>C.I.V-11.982.32<br></p> 
        </td> 
        <td> 
          <p style="text-align: center;">Paciente: <?php echo $_SESSION['name'] ?><br>C.I.V- <?php echo $_SESSION['id_card']?><br></p> 
        </td>
      </tr> 
    </table> 
 
  </body> 
</html> 
 
<?php 
$html=ob_get_clean(); 
// echo $html; 
 
require_once 'dompdf/autoload.inc.php'; 
use Dompdf\Dompdf; 
 
$dompdf = new Dompdf(); 
$options= $dompdf->getOptions(); 
$options->set(array('isRemoteEnable' => true)); 
$dompdf->setOptions($options); 
 
$dompdf->loadHtml($html); 
 
$dompdf->setPaper('letter'); 
// $dompdf->setPaper('A4', 'landscape'); 
 
$dompdf->render(); 
 
$dompdf->stream("Informe_medico.pdf", array("Attachment" => true)); //true para descargar 
 
?> 
 
 
