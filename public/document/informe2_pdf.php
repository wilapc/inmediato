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
    Estado general: A veces te sientes “neutral”. Esto sugiere que tu estado emocional no es 
extremadamente positivo ni negativo. Emociones abrumadoras:A veces te sientes abrumado por  
tus emociones. Es importante prestar atención a estos momentos y considerar estrategias para manejarlos. 
Expresión emocional: A veces te resulta difícil expresar cómo te sientes. Esto podría afectar  
tu comunicación y búsqueda de apoyo emocional. Apoyo emocional: Sientes que tienes un buen apoyo  
emocional de amigos o familiares. Esto es positivo para tu bienestar. Ansiedad y preocupación: A  
veces te sientes ansioso o preocupado. Considera técnicas de relajación para manejar estos sentimientos. 
Cambios en el sueño: No has experimentado cambios significativos en tus hábitos de sueño. Esto es alentador. 
Motivación para actividades diarias: A veces te sientes
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
 
$dompdf->stream("Infome_medico2.pdf", array("Attachment" => false)); //true para descargar 
 
?> 
 
 
 
 
 
