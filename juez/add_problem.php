<?php 
  include("header.html");
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
