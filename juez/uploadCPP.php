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
					echo "<br> Está intentando resolver el problema: " . $problema_nombre . '<br><br><br>';

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
						//descomprimir el archivo y ejecutar cliente
						exec('unzip uploads/api.zip -d uploads/api');


                        // for de test normales
                        exec('ls -1 problemas/' . $problema_nombre . '/normal/ ', $archivos, $return);
                        //echo 'retrun= ' . $return . '<br> para problemas/' . $problema_nombre . '/normal/ ';
                        //echo 'cont= ' . count($archivos) . '<br>';
                        for($i = 0; $i < count($archivos); $i++){
                            echo 'nombre= ' . $archivos[$i] . '<br>';
    						exec('cp problemas/' . $problema_nombre . '/normal/'
                                  . $archivos[$i] .
                                 ' uploads/api/' . $problema_nombre . '.cpp');

    						exec('c++ -o clientApi uploads/api/*.cpp', $compilacion, $return);

                            if($return == 134){
                                echo "<font color='red'> Assert cuando no se esperaba!! </font>
                                     <br>";
                            }else if($return == 1){
                                echo "<font color='red'> Compilation Error!! </font>
                                     <br>
                                     Recuerda que el nombre del archivo .h debe ser lista.h
                                     <br>
                                     Prueba compilar tu TAD antes de enviarlo
                                     <br>";
                                //TODO sumar el error ??
                            }else{
                                exec('mv clientApi uploads/api');

        						exec('./uploads/api/clientApi', $salida, $return);
                                //echo $salida;
                                echo "retorno " . $return . " <br>";
                                if($return == 123){
                                    echo "<font color='red'> Assert cuando no se debia llamar </font>
                                         <br>";
                                }else if($return != 0){
                                    echo "<font color='red'> Runtime Error!! </font>
                                         <br>";

                                }else{

                                    for($i = 0; $i < count($salida); $i ++)
                                	{
                                		print $salida[$i];
                                        echo '<br>';
                                	}
                                }
                            }

                            exec('rm uploads/api/' . $problema_nombre . '.cpp');

                        }
                        //delete everything inside api folder
                        exec('rm uploads/api/*');
					}
                    //delete zip uploaded
                    exec('rm uploads/api.zip');

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
<div id="footer" class="navbar navbar-default navbar-fixed-bottom">
  <div class="container">
    Juez creado por: Daniel Serrano
    <br>
    Adaptado por: Alfredo Santamaria
  </div>
</div>
</html>
