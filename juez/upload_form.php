<?php
	include "config.php";
?>


<?php 
  include("header.html");
?>
					<div class="col-xs-12 col-sm-8 col-md-4 col-md-offset-1 ">
						<div class="well call-to-action">
							<div class="well-body">
								<h3 class="text-center">Envía un problema</h3>
								<h5 class="text-center">
									<font color="#DB8321">
										Para conocer sus envíos, por favor ingrese sus credenciales.
									</font>
								</h5>
								<form action="upload.php" method="post" enctype="multipart/form-data">
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
											<span class="input-group-addon "><span class="glyphicon glyphicon-list"> Elegir problema</span></span>
											<select class="form-control" name="problema">
												
												<?php
													$con = connection_query();
													$result = mysqli_query($con, "SELECT id, nombre FROM problema");

													while($row = mysqli_fetch_array($result)) {
														echo '<option value ="' . $row['id'] . '">' .  $row['nombre']  . '</option>'   ;
													}
												?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon btn btn-default btn-file">
												<span class="glyphicon glyphicon-floppy-open" > Elegir Archivo... </span>
												<input type="file" name="uploadedfile" id="uploadedfile" multiple>
											</span>
											<input type="text" class="form-control" readonly>
										</div>
									</div>

									<input type="submit" name="submit" value="Enviar" class="btn btn-sm btn-default btn-block">
								</form>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-sm-8 col-md-8  col-md-offset-2 col-sm-offset-3">
						
						<!-- begin panel group -->
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<?php

								$result = mysqli_query($con, "SELECT id, descripcion, nombre, fecha_maxima, lenguaje FROM problema");
								while($row = mysqli_fetch_array($result)) {
									echo '<div class="panel panel-default">' ;
									echo '<span class="side-tab">' .
											'<div class="panel-heading" role="tab" id="heading' . $row['id'] .
												'" data-toggle="collapse" data-parent="#accordion"' .
												'href="#collapse' . $row['id'] . '" aria-expanded="true"' .
												'= aria-controls="collapse' . $row['id'] . '">' .
												'<h6 class="panel-title">' .
													$row['nombre'] .
													'<span id="span' . $row['id'] . '" class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>' .
													'<h6 class="panel-sub">' .
														'<span class="glyphicon glyphicon-time"></span>' .
														'  ' . $row['fecha_maxima'] .
													'</h6>' .
												'</h6>' .
											'</div>' .
										'</span>' .
										'<div id="collapse' . $row['id'] . '" class="panel-collapse collapse" role="tabpanel"
											aria-labelledby="heading' . $row['id'] . '">' .
											'<div class="panel-body">' .
												$row['descripcion'] .
												'<br>
												<h6>
													<left>
														lenguaje: ' . $row['lenguaje'] .
													'</left>
												 </h6>' .
											'</div>' .
										'</div>';
									echo '</div>';
								}
							?>
						</div> <!-- / panel-group -->
					</div> <!-- /col-md-8 -->

					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
					<script src="../js/bootstrap.min.js"></script>
				</div>
			</main>
		</header>
		<div align=center>Juez creado por: Daniel Serrano, Lenguaje creado por Alfredo Santamaria y Daniel Serrano</div>
	</body>
</html>
