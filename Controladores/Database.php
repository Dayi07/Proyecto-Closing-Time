<?php  
//codigo para imprimir los errores
//$driver = new mysqli_driver();
//$driver->report_mode = MYSQLI_REPORT_ALL;

	class Database{
		//Variables necesarias para conexion de BD
		protected $con;
		protected $dbhost="localhost";
		protected $dbuser="root";
		protected $dbpass="";
		protected $dbname="closingtime";		
		protected $correo="";
 

		
		//Contructor
		function __construct(){
			$this->connect_db();
		}
		


		//Funcion para conectar la base de datos
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		} 



		public function sanitize($var){
            $return = mysqli_real_escape_string($this->con, $var);
            return $return;
        }


		//Funcion para cerrar la sesion
		public function cerrarSesion(){
			return session_destroy();
		}



		//Funcion para hacer un registro nuevo 
        public function registro($Nombre,$Edad, $Correo, $Contrasena){
            $sql = "INSERT INTO  `usuario` (Nombre_usuario, Edad_usuario, Correo_usuario, Contraseña_usuario) VALUES ('$Nombre', '$Edad','$Correo', '$Contrasena')"; //Sentencia sql para almacenar los datos del usuario en la base de datos
            $res = mysqli_query($this->con, $sql);
            
			if($res){
              	return true;
            }else{
            	return false;
        	}		
		}



		//Funcion para validar el inicio de sesion
		public function inicioUsuario($Correo, $Contrasena){
			$this->correo = $Correo;

            $sql = "SELECT * FROM usuario WHERE Correo_usuario = '$Correo' AND Contraseña_usuario = '$Contrasena'";//Sentencia sql para buscar la existencia del correo y contraseña del usuario
            $res = mysqli_query($this->con, $sql);
           
			$filas=mysqli_num_rows($res);			
			
            return $filas;
		}



		//Funcion de validacion para los campos del registro
		public function confirmarRegistro($Nombre,$Edad, $Correo, $Contrasena){
			
			if ($Nombre == "") {
				echo '<script>alert("El campo nombre no puede estar vacío")</script>'; //Alerta en caso de que no se ingrese el nombre
				return false;
			}else if($Edad == ""){
				echo '<script>alert("El campo edad no puede estar vacío")</script>'; //Alerta en caso de que no se ingrese la edad
				return false;
			}else if( $Edad < 13){
				echo '<script>alert("No tienes edad suficiente para el registro")</script>'; //Alerta en caso de que la edad sea menor a 13
				return false;
			}else if((filter_var($Correo, FILTER_VALIDATE_EMAIL)) == false){
				echo '<script>alert("Ingrese un correo valido")</script>'; //Alerta en caso de que no se ingrese un correo valido
				return false;
			}else if($Contrasena == "" ){
				echo '<script>alert("La contraseña esta vacia")</script>'; //Alerta en caso de que la contraseña no este vacia
				return false;
			}else if(strlen ($Contrasena) <= 7){
				echo '<script>alert("La contraseña debe tener mas de 8 caracteres")</script>'; //Alerta en caso de que la contraseña sea menos o igual a 8 
				return false;
			}else if ($Nombre == "" && $Edad == "" && $Contrasena == "" ){
				echo '<script>alert("Todos los campos estan vacios")</script>'; //Alerta en caso de que no se ingrese nigun campo
			}else {
				return true;
			}
		}



		//Funcion para el cambio de contraseña del usuario
		public function cambiarContrasena($ContraNueva, $id){			

			$sql = "UPDATE usuario SET Contraseña_usuario = '$ContraNueva' WHERE  Id_usuario = '$id'";//Sentencia sql para hacer efectivo el cambio de contraseña del usuario
            $res = mysqli_query($this->con, $sql);
            
			if($res){
              	return true;
            }else{
            	return false;
        	}
			
		}

		public function confirmarCambio(){
			
		}

		//Funcion para mostrar los datos del usuario
		public function datosUsuario($Correo){
			$sql = "SELECT * FROM usuario WHERE Correo_usuario = '$Correo'";//Sentencia sql para obtener todos los datos del usuario
            $res = mysqli_query($this->con, $sql);
            
			if($res){
              	return $res;							
            }else{
            	return false;
        	}

		}



		//Funcion para comprovar que el correo del registro no exista en la base de datos
		public function existenciaCorreo($Correo){
			$sql = "SELECT * FROM usuario WHERE Correo_usuario = '$Correo'";//Sentencia sql para obtener todos los datos del usuario
            $res = mysqli_query($this->con, $sql);
            
			if($res){
              	return true;							
            }else{
            	return false;
        	}

		}

		
	} 
?>
