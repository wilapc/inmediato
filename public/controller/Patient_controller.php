<?php
require_once "model/Patient_model.php";


class Patient extends PatientBD
{
  private $model;
  public function __construct()
  {
    $this->model = new PatientBD();
  }

  /**----------------- CONTROLADOR PARA REGISTRAR USUARIO ----------------- */
  public function registrar_usuario_controller()
  {
    $usuario = $_POST['user_reg'];
    $clave1 = $_POST['clave1_reg'];
    $clave2 = $_POST['clave2_reg'];
    $correo = $_POST['email_reg'];
    $cedula = $_POST['cedula_reg'];
    $sexo = $_POST['sexo_reg'];
    $direccion = $_POST['direccion_reg'];


    if ($clave1 != $clave2) {
      return '<script> 
              alert("Las contraseñas no coinciden!");
            </script>';
    } else {
      $clave = $clave1;
      $datos_registros = [
        "Usuario" => $usuario,
        "Clave" => $clave,
        "Correo" => $correo,
        "Cedula" => $cedula,
        "Sexo" => $sexo,
        "Direccion" => $direccion
      ];

      $registrar_usuarios = $this->model->registrar_usuario_model($datos_registros);
      return '<script> 
              alert("Registro éxitoso!");
            </script>';
    }
  }
  /**Fin Controlador */

  /**----------------- CONTROLADOR PARA REGISTRAR USUARIO ----------------- */
  public function iniciar_sesion_controller(){

      $correo = $_POST['email_log'];
      $clave = $_POST['clave_log'];

      $datos_login = [
        "Correo" => $correo,
        "Clave" => $clave
      ];

      $iniciar_sesion = $this->model->iniciar_sesion_model($datos_login);

      if (!empty($iniciar_sesion)) {
        
      $_SESSION['login'] = true;
      $_SESSION['name'] = $iniciar_sesion['name'];
      $_SESSION['id_card'] = $iniciar_sesion['id_card'];
      $_SESSION['email'] = $iniciar_sesion['email'];
      $_SESSION['fk_sex'] = $iniciar_sesion['fk_sex'];
      $_SESSION['fk_status'] = $iniciar_sesion['fk_status'];
      $_SESSION['address'] = $iniciar_sesion['address'];
      $_SESSION['id'] = $iniciar_sesion['id'];
      $_SESSION['rol'] = $iniciar_sesion['fk_rol'];
 
        return header("Location: index.php");
        
        
    } else {
      return '<script>
                console.log("negativo");
                alert("Datos incorrecto");
              </script>';
    }          
  }

  /**---------FUNCION PARA CERRAR SESION ----------- */
  public function close(){
    unset($_SESSION);
    session_destroy();
  }

  /**----------------- CONTROLADOR PARA LLENAR FORMULARIO PACIENTE ----------------- */
  public function formulario_paciente_controller(){

    $condicion = $_POST['condicion_pat'];
    $animo = $_POST['animo_pat'];
    $emocion = $_POST['emocion_pat'];
    $tipo = $_POST['tipo_pat'];
    $evalucion = $_POST['evaluaciones_pat'];
    $informe = $_POST['informes_pat'];

    if ($condicion=="" || $animo=="" || $emocion=="" || $tipo==""|| $evalucion=="" || $informe=="") {
      return '<script> 
              alert("OCURRIO UN ERROR! Hay campos vacios!");
            </script>';
    }else {
      $datos_formulario = [
        "Condicion"=>$condicion,
        "Animo"=>$animo,
        "Emocion"=>$emocion,
        "Tipo"=>$tipo,
        "Evaluacion"=>$evalucion,
        "Informe"=>$informe,
        "id_user" => $_SESSION['id']
      ];

      $registrar_formulario = $this->model->formulario_paciente_model($datos_formulario);
      

      if ($registrar_formulario->rowCount() == 1){
        return '<script> 
              alert("Formulario Registrado con éxito!");
              window.location.href = "index.php";
            </script>';
      }else{
        return '<script> 
              alert("Ocurrio un error en el registro!");
            </script>';
      }
    }
  }

  public function mostrar_formulario_paciente(){
    $show = $this->model->mostrar_formulario_paciente_model($_SESSION['id']);
    return $show;
  }

  /**------------ CONTROLADOR PARA LLENAR CUESTIONARIO PACIENTE ------------- */
  public function cuestionario_controller(){

    $test1=$_POST['test1'];
    $test2=$_POST['test2'];
    $test3=$_POST['test3'];
    $test4=$_POST['test4'];
    $test5=$_POST['test5'];
    $test6=$_POST['test6'];
    $test7=$_POST['test7'];
    $test8=$_POST['test8'];
    $test9=$_POST['test9'];
    $test10=$_POST['test10'];

    if($test1=="" || $test2=="" || $test3=="" || $test4=="" || $test5=="" || $test6=="" || $test7=="" || $test8=="" || $test9=="" || $test10==""){
      return '<script> 
              alert("Ocurrio un error, hay campos vacios!");
            </script>';
    }else {
      $datos_cuestionario=[
        0=>$test1,
        1=>$test2,
        2=>$test3,
        3=>$test4,
        4=>$test5,
        5=>$test6,
        6=>$test7,
        7=>$test8,
        8=>$test9,
        9=>$test10
      ];

      for ($i=0; $i < 10; $i++) { 
        if(!empty($datos_cuestionario[$i])){
          $registrar_cuestionario = $this->model->cuestionario_model($i,$datos_cuestionario[$i],$_SESSION['id']);
          if($i == 9) {
             $bool = true;
          } 
        } else {
          $bool = false;
        }
      }
      

      if ($bool){
        return '<script> 
              alert("Formulario Registrado con éxito!");
              window.location.href= "index.php";
            </script>';
      }else{
        return '<script> 
              alert("Ocurrio un error en el registro!");
            </script>';
      }
    }
  }

  public function verificar_cuestionario(){
    $check = $this->model->verificar_cuestionario_model($_SESSION['id']);
    return $check;

  }
}
