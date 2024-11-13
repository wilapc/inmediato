<?php 
require_once "model/Connection.php";

class PatientBD extends Connection{
  private $connect;

  public function __construct() {
    $this->connect = new Connection();
    $this->connect = $this->connect->getConnect();
  }

  /**------------------- MODELO PARA REGISTRAR USUARIO --------------------- */
  public function registrar_usuario_model(array $datos){
    $var = 1;
    $sql=$this->connect->prepare("INSERT INTO user(name, address, id_card, email, password, fk_sex, fk_rol) VALUES (:Usuario,:Direccion,:Cedula,:Correo,:Clave,:Sexo,:Rol)");

    $sql->bindParam(":Usuario",$datos['Usuario']);
    $sql->bindParam(":Clave",$datos['Clave']);
    $sql->bindParam(":Correo",$datos['Correo']);
    $sql->bindParam(":Cedula",$datos['Cedula']);
    $sql->bindParam(":Sexo",$datos['Sexo']);
    $sql->bindParam(":Direccion",$datos['Direccion']);
    $sql->bindParam(":Rol",$var);
    $sql->execute();

    return $sql;
  }

  /**------------------- MODELO PARA INICIAR SESION --------------------- */
  public function iniciar_sesion_model(array $datos){
    $sql=$this->connect->prepare("SELECT * FROM user WHERE email=:Correo AND password=:Clave");

    $sql->bindParam(":Correo",$datos['Correo']);
    $sql->bindParam(":Clave",$datos['Clave']);
    $sql->execute();
    return $sql->fetch(PDO::FETCH_ASSOC);
  }

  /**------------------- MODELO PARA REGISTRAR FORMULARIO ------------------ */
  public function formulario_paciente_model(array $datos){

    $sql=$this->connect->prepare("INSERT INTO status(condicion, state_of_mind, emotion_name, type_clasification, evaluation, medical_report) VALUES (:Condicion,:Animo,:Emocion,:Tipo,:Evaluacion,:Informe)");

    $sql->bindParam(":Condicion",$datos['Condicion']);
    $sql->bindParam(":Animo",$datos['Animo']);
    $sql->bindParam(":Emocion",$datos['Emocion']);
    $sql->bindParam(":Tipo",$datos['Tipo']);
    $sql->bindParam(":Evaluacion",$datos['Evaluacion']);
    $sql->bindParam(":Informe",$datos['Informe']);
    $sql->execute();
    $lastid = $this->connect->lastInsertId();
    $insert = $this->insertStatusId($lastid, $datos['id_user']);
    return $sql;
  }

  /**------------------- MODELO PARA MOSTRAR ID DEL ESTADO ------------------ */
  public function insertStatusId($datos, $id) {
    $sql = $this->connect->prepare("UPDATE user SET fk_status= :fkrol WHERE id = :id");
    $sql->bindParam(":fkrol", $datos);
    $sql->bindParam(":id", $id);
    $sql->execute();
    $_SESSION['fk_status'] = $datos;
    return $sql;
  }

  /**------------------- MODELO PARA MOSTRAR DATOS DEL FORMULARIO ------------------ */
  public function mostrar_formulario_paciente_model($id){
    $sql = $this->connect->prepare("SELECT status.condicion, status.state_of_mind, status.emotion_name, status.type_clasification, status.evaluation, status.medical_report FROM status INNER JOIN user ON user.fk_status = status.id WHERE user.id = :id;");
    $sql->bindParam(":id", $id);
    $sql->execute();

    return $sql->fetch(PDO::FETCH_ASSOC);
  }

  /**------------------- MODELO PARA LLENAR CUESTIONARIO ------------------ */
  public function cuestionario_model($ask,$test,$id){

    $sql = $this->connect->prepare("INSERT INTO questionnaire(ask, answer, fk_user) VALUES (:ask,:test,:id)");
    $sql->bindParam(":ask",$ask,PDO::PARAM_INT);
    $sql->bindParam(":test",$test,PDO::PARAM_STR);
    $sql->bindParam(":id",$id,PDO::PARAM_INT);
    $sql->execute();
    return $sql;
  }

  public function verificar_cuestionario_model($id){
    $sql = $this->connect->prepare("SELECT * FROM questionnaire WHERE fk_user = :id");
    $sql->bindParam(":id",$id,PDO::PARAM_INT);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }

}