<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
  <form action="" method="POST" >
	<div class="login-wrap">
		<div class="login-html">

			<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Iniciar Sesión</label>
			<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarse</label>
				<div class="login-form">
					<div class="sign-in-htm">
					<div class="group">
							<label for="pass" class="label">Correo electrónico</label>
							<input id="usermail" name="email_log" type="email" class="input" >
						</div>
						<div class="group">
							<label for="pass" class="label">Contraseña</label>
							<input id="pass" name="clave_log" type="password" class="input" data-type="password" >
						</div>
						<!-- <div class="group">
						<input id="check" type="checkbox" class="check" checked>
						<label for="check"><span class="icon"></span> Keep me Signed in</label>
						</div> -->
						<div class="group">
							<input type="submit" class="button" value="Entrar">
						</div>
						<div class="hr"></div>
						<!-- <div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div> -->
					</div>
					<div class="sign-up-htm">
						<div class="group">
							<label for="user" class="label">Nombre y Apellido</label>
							<input id="usuario" name="user_reg" type="text" class="input" >
						</div>
						<div class="group">
							<label for="pass" class="label">Contraseña</label>
							<input id="clave1" name="clave1_reg" type="password" class="input" data-type="password" >
						</div>
						<div class="group">
							<label for="pass" class="label">Repetir Contraseña</label>
							<input id="clave2" name="clave2_reg" type="password" class="input" data-type="password" >
						</div>
						<div class="group">
							<label for="pass" class="label">Correo electrónico</label>
							<input id="email" name="email_reg" type="email" class="input" >
						</div>
						<div class="group">
							<label for="pass" class="label">Cédula</label>
							<input id="text" name="cedula_reg" type="text" class="input" >
						</div>
						<div class="group">
							<label for="pass" class="label">Sexo</label>
							<select name="sexo_reg" id="" required class="input">
                <option value="1" style="color: black;">Masculino</option>
                <option value="2" style="color: black;">Femenino</option>
              </select>
						</div>
            <div class="group">
              <label for="pass" class="label">Direccion</label>
              <input id="dir" name="direccion_reg" type="text" class="input" >
            </div>
						<div class="group">
							<input type="submit" class="button" value="Registrar">
						</div>
						<div class="hr"></div>
						<div class="foot-lnk">
							<label for="tab-1">Ya eres miembro?</a>
						</div>
					</div>
				</div>
			
		</div>
	</div>
  </form>
<?php

$reg = new Patient();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  if(!empty($_POST['cedula_reg'])){
    echo $reg->registrar_usuario_controller();
  
   } 
   else {
    $ver = $reg->iniciar_sesion_controller();
    echo $ver;
  }
}
?>
