<?php
	include "config.php";
?>






    <div class="col-xs-12 col-sm-8 col-md-5 col-md-offset-1 ">
        <div class="well call-to-action">
            <div class="well-body">
                <h3 class="text-center">Agregar Problema</h3>
                <h5 class="text-center"><font color="#DB8321">Solo administradores pueden agregar problemas.</font></h5>
                <form action="insert_problem.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                          <input type="text" class="form-control" placeholder="Usuario" name="usuario" />
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                          <input type="password" class="form-control" placeholder="Contraseña" name="pass" />
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-bullhorn"></span></span>
                          <input type="text" class="form-control" placeholder="Nombre Problema" name="nombre" />
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                          <textarea class="form-control" placeholder="Descripción" rows="4" cols="50" name="descripcion" ></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                          <input type="text" class="form-control" name="fecha"  placeholder="Fecha Máxima (YYYY-MM-DD)" />
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-comment"></span></span>
                          <input type="text" class="form-control" name="lenguaje"  placeholder="Lenguaje (dis/py)" />
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon btn btn-default btn-file">
                            <span class="glyphicon glyphicon-floppy-open" > Códgio(.dis) </span>
                                <input type="file" name="uploadedfile" id="uploadedfile" multiple>

                        </span>
                        <input type="text" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon btn btn-default btn-file">
                            <span class="glyphicon glyphicon-floppy-open" > Entrada(.in) </span>
                                <input type="file" name="filein" id="filein" >

                        </span>
                        <input type="text" class="form-control" readonly>
                    </div>
                  </div>
                  <input type="submit" name="submit" value="Enviar" class="btn btn-sm btn-default btn-block">
                </form>
            </div>

        </div>
    </div>
    <div class="cleaner">&nbsp;</div>
  </main>
</header>
<div align=center>Juez creado por: Daniel Serrano, Lenguaje creado por Alfredo Santamaria y Daniel Serrano</div></body>
</html>



          <h2>Agregar Problema</h2>
          <p>


					<?php


					$con = connection_query();



					$usuario = $_POST["usuario"];
					$pass = sha1($_POST["pass"]);

					$result = mysqli_query($con, "SELECT usuario, password FROM admon WHERE usuario = '$usuario' AND password = '$pass'");
					$entro = false;

					while($row = mysqli_fetch_array($result)) {
					  $entro = true;
					}

					if(!$entro){
						die('El usuario o la contraseña son incorrectos ');
					}


					mysqli_close($con);

					$con = connection_update();



					$nombre = $_POST["nombre"];
					$desc = $_POST["descripcion"];
					$fecha = $_POST["fecha"];
					$lenguaje = $_POST["lenguaje"];
					$archivo = $nombre . ".dis";
					$in = $nombre . ".in";

					  $sql = "INSERT INTO problema (nombre, descripcion, codigo, fecha_maxima, lenguaje)
					  VALUES ('$nombre', '$desc','$archivo', '$fecha', '$lenguaje')";

					$retval = mysql_query( $sql );
					if(! $retval )
					{
					  die('Could not enter data: ' . mysql_error());
					}





					//Subir el codigo del problema
					$target_path = "problemas/";

					//$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
					$target_path = $target_path . $archivo;

					if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
						echo "The file ".  basename( $_FILES['uploadedfile']['name']).
						" has been uploaded";
					} else{
						echo "There was an error uploading the file, please try again!";
					}

					/*Converts to unix format*/
					$file = file_get_contents("problemas/code.dis");
					$file = str_replace("\r", "", $file);
					file_put_contents("problemas/code.dis", $file);


					//UPLOAD THE IN FILE

					$target_path = "problemas/";

					//$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
					$target_path = $target_path . $in;

					if(move_uploaded_file($_FILES['filein']['tmp_name'], $target_path)) {
						echo "The file ".  basename( $_FILES['filein']['name']).
						" has been uploaded";
					} else{
						echo "There was an error uploading the file, please try again!";
					}

					/*Converts to unix format*/
					$file = file_get_contents("problemas/code.dis");
					$file = str_replace("\r", "", $file);
					file_put_contents("problemas/code.dis", $file);



					echo "Problema insertado con exito" ;
					// some code

					mysql_close($con);


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

