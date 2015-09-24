<?php
include "config.php";

$mensaje = 'sin cambiar';

//COnectamos a base de datos.
$con = connection_query();


$usuario = $_POST["usuario"];
$pass = sha1($_POST["pass"]);

$result = mysqli_query($con, "SELECT usuario, password FROM Usuario WHERE usuario = '$usuario' AND password = '$pass'");
$entro = false;

while($row = mysqli_fetch_array($result)) {
  $entro = true;
}

if(!$entro){
//	die('El usuario o la contraseña son incorrectos ');
}



$target_path = "uploads/";

//Saber cual es el problema
$problema = $_POST["problema"];


$result = mysqli_query($con, "SELECT id, nombre, lenguaje FROM problema WHERE id = $problema");

$problema_nombre = 'Sin_nombre';
$lenguaje = "ninguno";
while($row = mysqli_fetch_array($result)) {
  $problema_nombre = $row['nombre'];
  $lenguaje = $row['lenguaje'];
}
?>


<?php
$html = file_get_contents('header.html');
echo $html;

?>
          <h2>Resultados</h2>
          <p>
					<?php
					if(!$entro){
						die('El usuario o la contraseña son incorrectos ');
					}
					echo "<br>Está intentando resolver el problema: " . $problema_nombre . '<br>';

					//Subir el archivo al servidor, todos con el mismo nombre, para que no se llene.

					//$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
					$target_path = $target_path . 'api.zip';

					if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
						echo "El archivo ".  basename( $_FILES['uploadedfile']['name']).
						" ha sido subido al servidor con éxito<br>";
					} else{
						die ('Hubo un problema subiendo el archivo al servidor, por favor intenta de nuevo.');
					}

					if($lenguaje == "cpp"){
						//descomprimir el archivo
						$salida = "";
						exec('unzip uploads/api.zip -d uploads/api', $salida);
						echo $salida;
						exec('cp problemas/' . $problema_nombre . '.cpp uploads/api/' . $problema_nombre . '.cpp' , $salida);
						echo $salida;
						exec('c++ -o clientApi uploads/api/*.cpp', $salida);
						echo $salida;
						exec('./uploads/api/clientApi', $salida);
						echo $salida;
						echo 'acabe';
					}

					/**
					Converts to unix format
					*/
					/*$file = file_get_contents("uploads/code.dis");
					$file = str_replace("\r", "", $file);
					file_put_contents("uploads/code.dis", $file);
					*/


					?>

          </p>


        </div>
      </div>
    </div>
    <div class="cleaner">&nbsp;</div>
  </div>
</div>
<div align=center>Juez creado por: Daniel Serrano, Lenguaje creado por Alfredo Santamaria y Daniel Serrano</div></body>
</html>
