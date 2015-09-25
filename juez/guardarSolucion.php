<?php
include_once "config.php";

function guardarSolucion($usuario, $problema, $aprobadas, $total) {

    $con = connection_query();
    $result = mysqli_query($con,
                "SELECT usuario, problema, fecha, aprobadas, totalPruebas
                 FROM usuario_problema
                 WHERE usuario = '$usuario' AND problema = '$problema'");
    $entro = false;

    $aprobadasAntes = 0;
    $totalAntes = 1;
    while($row = mysqli_fetch_array($result)) {
        $aprobadasAntes = $row['aprobadas'];
        $totalAntes = $row['totalPruebas'];
        $entro = true;
    }
    mysqli_close($con);
    if($entro){
        if($aprobadas/$total > $aprobadasAntes/$totalAntes){
            echo "<p>Ya habias completado este problema,
                <font color='green'> pero tu puntaje mejoró!!</font> </p>";

                $con = connection_update();

                $fecha = date('Y-m-d');
                $sql = "UPDATE usuario_problema
                        SET aprobadas='$aprobadas', totalPruebas='$total', fecha=now()
                        WHERE usuario = '$usuario' AND problema = '$problema'";

               $retval = mysql_query( $sql );
               if(! $retval )
               {
                 die('Could not enter data: ' . mysql_error());
               }
               
        }else{
            echo "<p>Ya habias completado este problema,
                <font color='red'> tu puntaje no mejoró :( </font> </p>";
        }
    }else{
         //Lo actualiza en la base de datos.
        $con = connection_update();

         $fecha = date('Y-m-d');
         $sql = "INSERT INTO usuario_problema (usuario, problema, fecha, aprobadas, totalPruebas)
                 VALUES ('$usuario', '$problema', now(), '$aprobadas', '$total')";

        $retval = mysql_query( $sql );
        if(! $retval )
        {
          die('Could not enter data: ' . mysql_error());
        }

        echo "<p>Felicitaciones has hecho un problema más, has ganado puntos.</p>";

    }
}
