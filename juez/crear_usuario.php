<?php 
  include("header.html");
?>





        <div class="col-xs-12 col-sm-8 col-md-4 col-md-offset-1 ">
            <div class="well call-to-action">
                <div class="well-body">
                    <h3 class="text-center">Crear usuario</h3>
                    <form action="insertar_usuario.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <div class="input-group">
                              <span class="input-group-addon"><span class="glyphicon glyphicon-font"></span></span>
                              <input type="text" class="form-control" placeholder="Nombre" name="nombre" />
                          </div>
                      </div>
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
                              <span class="input-group-addon"><span class="glyphicon glyphicon-tag"></span>
                              </span>
                              <input type="text" class="form-control" placeholder="Colegio" name="colegio" />
                          </div>
                      </div>
                      <input type="submit" name="submit" value="Registrar" class="btn btn-sm btn-default btn-block">
                    </form>
                </div>

            </div>
        </div>
    </main>
  </header>
    <div class="cleaner">&nbsp;</div>


<div align=center>Juez creado por: Daniel Serrano, Lenguaje creado por Alfredo Santamaria y Daniel Serrano</div></body>
</html>
