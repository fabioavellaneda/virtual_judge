<?php 
  include("header.html");
?>


        <div class="col-xs-12 col-sm-8 col-md-4 col-md-offset-1 ">
            <div class="well call-to-action">
                <div class="well-body">
                    <h3 class="text-center">Mis Envíos</h3>
                    <h5 class="text-center">
                      <font color="#DB8321">
                        Para conocer sus envíos, por favor ingrese sus credenciales.
                      </font>
                    </h5>
                    <form action="mis_archivos.php" method="post" enctype="multipart/form-data">
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
                      <input type="submit" name="submit" value="Enviar" class="btn btn-sm btn-default btn-block">
                    </form>
                </div>

            </div>
        </div>
    </main>
  </header>

<div align=center>Juez creado por: Daniel Serrano, Lenguaje creado por Alfredo Santamaria y Daniel Serrano</div></body>
</html>
