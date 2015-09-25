<?php
include "config.php";

$con = connection_query();

$array_usuarios = array();
$array_puntos = array();
$array_nombre = array();
$array_colegio = array();
$array_ejercicios = array();

//Este es para la barra de colegios.
$array_colegios = array();
$cuantos_colegio = array();
$puntos_colegio = array();


//consulta para los ejercicios
$result = mysqli_query($con, "SELECT nombre FROM problema");

while($row = mysqli_fetch_array($result)) {
  array_push($array_ejercicios, $row['nombre']);
}

$result = mysqli_query($con, "SELECT nombre, usuario, colegio FROM Usuario");


while($row = mysqli_fetch_array($result)) {
  array_push($array_usuarios, $row['usuario']);
  $array_puntos[$row['usuario']] = 0;
  $array_nombre[$row['usuario']] = $row['nombre'];
  $array_colegio[$row['usuario']] = $row['colegio'];

  //Barra de colegios
 if(!in_array ($row['colegio'], $array_colegios))
	array_push($array_colegios, $row['colegio']);
  $cuantos_colegio[$row['colegio']] += 1;
  $puntos_colegio[$row['colegio']] = 0;
}

$result = mysqli_query($con, "SELECT usuario, problema, fecha_maxima, id, fecha FROM usuario_problema, problema WHERE problema = id");
$puntos = 0;
while($row = mysqli_fetch_array($result)) {
  $fecha_envio = strtotime( $row['fecha'] );
  $fecha_maxi = strtotime( $row['fecha_maxima'] );
  if($fecha_maxi - $fecha_envio >= 0){
	$puntos = 10;
  }else{
	$puntos = 5;
  }
  $array_puntos[$row['usuario']] = $array_puntos[$row['usuario']] + $puntos;
  $puntos_colegio[$array_colegio[$row['usuario']]] += $puntos;
}

for($i = 0; $i < count($array_usuarios); $i++){
	for($j = 0 ; $j < count($array_usuarios) - 1; $j++){
		if($array_puntos[$array_usuarios[$j]] < $array_puntos[$array_usuarios[$j+1]] ){
			$auxil = $array_usuarios[$j];
			 $array_usuarios[$j] =  $array_usuarios[$j+1];
			 $array_usuarios[$j+1] = $auxil;

		}
	}
}



?>

<?php
$html = file_get_contents('header.html');
echo $html;

?>
        <br><br><br>
        <div class="col-xs-12 col-sm-7 well well-lg call-to-action">

            <h3 class="media-heading text-uppercase reviews">Puntajes </h3>
            <p class="media-comment">
               <font size="3" color="#DB8321">Poner acá como son los puntajes!!
               se otorgan 5 puntos.
               </font>
            </p>
        </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <br><br>

		<?php
			//Calcular el maximo para el porcentaje.
			$maxi = 0;
			foreach ($array_colegios as $val)
			{
				if(($puntos_colegio[$val] / $cuantos_colegio[$val]) > $maxi){
					$maxi = ($puntos_colegio[$val] / $cuantos_colegio[$val]);
				}
			}

			foreach ($array_colegios as $val)
			{
				if($puntos_colegio[$val] == 0)continue;

				$ancho = (($puntos_colegio[$val] / $cuantos_colegio[$val]) * 100) / $maxi;
				//echo 'nombre: ' . $val . ' cuantos: ' . $cuantos_colegio[$val] . ' puntos: ' . $puntos_colegio[$val] . '<br>';
				echo '<div class="progress progress-striped">';
				echo '<div class="progress-bar  progress-bar-custom" style="width: ' . $ancho . '%">';
				echo  $val ;
			    echo '</div>';
				echo '</div>';

			}

		?>

        <div class="panel panel-custom filterable">
          <div class="panel-heading">
              <h3 class="panel-title">Tabla de posiciones Usuarios</h3>
          </div>

          <table class="table table-hover" id="dev-table">
            <tr>
              <th><font color="#DB8321"> # </font></th>
              <th><font color="#DB8321"> Usuario </font></th>
              <th><font color="#DB8321"> Nombre </font></th>

              <?php
                foreach ($array_ejercicios as $nomEjercicio) {
                    echo ' <th><font color="#DB8321"> ' . $nomEjercicio . ' </font></th> ';
                }
               ?>
            </tr>
            <p>
      				<?php

      				for($i = 0; $i < count($array_usuarios);$i++)
      				{
      					echo '<tr>' .
                          '<td>' . ($i + 1)  . '</td>' .
                          '<td>' .
                            '<a href="envios_usuario.php?usuario=' . $array_usuarios[$i] . '">' .
                            $array_usuarios[$i] . '</a>' .
                          '</td>' .
                          '<td>' . $array_nombre[$array_usuarios[$i]]  . '</td>' .
                      '</tr>';
      				}


      				?>

            </p>
					</table>
        </div>
      </div>
  </main>
</header>

<br><br><br><br><br><br>
<div id="footer" class="navbar navbar-default navbar-fixed-bottom">
  <div class="container">
    Juez creado por: Daniel Serrano
    <br>
    Adaptado por: Alfredo Santamaria
  </div>
</div>

</html>
