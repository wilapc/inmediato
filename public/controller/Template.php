<?php
require_once('Patient_controller.php');

class Template {
  

  public function view(string $ruta = null){

  if(isset($ruta)){
    if ($ruta == 'login' || $ruta == 'registro' || $ruta == 'inicio') {
      include "view/".$ruta.".php";
    } else {
      include "view/plantilla.php";
    }
  }else {
    include "view/plantilla.php";
  }
  }

  public function getView(string $url){
    
    if ($url == 'inicio' || $url == 'cuestionario' || $url == 'diagnostico') {
      $link = ($url=='inicio')?'inicioPatient':''.$url.'';
      include "view/patient/".$link.".php";
    }elseif ($url == 'salir') {
      $close = new Patient();
      $close->close();
      header('location:index.php');
    }
  }

}
