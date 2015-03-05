<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/dist/css/jumbotron.css" rel="stylesheet">
    <link rel="stylesheet" href="js/jquery-ui-1.11.3.custom/jquery-ui.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Registrar</button>
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Registrate.</h4>
				      </div>
				      <div class="modal-body">
				      	<h4>Email: <input type="text" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email" aria-describedby="basic-addon1"></h4>
				      	<h4>Usuario: <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" placeholder="Usuario" aria-describedby="basic-addon1"></h4>
				      	<h4>Contraseña: <input type="text" name="txtPassword" id="txtPassword" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon1"></h4>
				      	<h4>Repetir Contraseña: <input type="text" name="txtRPassword" id="txtRPassword" class="form-control" placeholder="Repetir Contraseña" aria-describedby="basic-addon1"></h4>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				        <button type="button" name="btnNuevoUsuario" id="btnNuevoUsuario" class="btn btn-primary">Guardar Cambios</button>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- Modal -->
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <hr>
          <h3>Administrar Tipo <span id="showAdminTipo" class="glyphicon glyphicon-plus" aria-hidden="true"></span> <span id="hideAdminTipo" style="display:none" class="glyphicon glyphicon-minus" aria-hidden="true"></span></h3>
          <div id="adminTipo" style="display:none">
          <h3>Agregar Tipo</h3>
            <input type="text" name="txtTipo" id="txtTipo"></input>
            <button class="btn btn-default" type="button" name="btnAgregaTipo" id="btnAgregaTipo">Agregar</button>
            <div id="divTipo"></div>
          </div>
          <h3>Administrar Unidad <span id="showAdminUnidad" class="glyphicon glyphicon-plus" aria-hidden="true"></span> <span id="hideAdminUnidad" style="display:none" class="glyphicon glyphicon-minus" aria-hidden="true"></span></h3>
          <div id="adminUnidad" style="display:none">          
          <h3>Agregar Unidad de Medida</h3>
            <input type="text" name="txtUnidad" id="txtUnidad"></input>
            <button class="btn btn-default" type="button" name="btnAgregaUnidad" id="btnAgregaUnidad">Agregar</button>
            <div id="divUnidad"></div>
          </div> 
          <h3>Administrar Medicamento <span id="showAdminMedicamento" class="glyphicon glyphicon-plus" aria-hidden="true"></span> <span id="hideAdminMedicamento" style="display:none" class="glyphicon glyphicon-minus" aria-hidden="true"></span></h3>
          <div id="adminMedicamento" style="display:none">                      
          <h3>Agregar Medicamento</h3>
            <label for="selTipo">Tipo:</label>
              <select name="selTipo" id="selTipo">
              </select>
             <label for="txtCantidad">Cantidad:</label> 
              <input type="text" name="txtCantidad" id="txtCantidad"></input>
              </select>              
             <label for="selUnidad">Unidad:</label> 
              <select name="selUnidad" id="selUnidad">
              </select>
            <label for="txtMedicamento">Descripcion:</label>  
              <input type="text" name="txtMedicamento" id="txtMedicamento"></input>
              <button class="btn btn-default" type="button" name="btnMedicamento" id="btnMedicamento">Agregar</button>              
              <div id="divMedicamento"></div>
            </div>  
              <!-- Modal Ingredientes -->
              <div class="modal fade" id="modalGeneral" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel"><div id='titulo'></div></h4>
                    </div>
                    <div class="modal-body">
                      <div id='cuerpo'></div>
                    </div>
                    <div class="modal-footer">
                      <div id='cuerpo'></div>
                    </div>
                  </div>
                </div>
              </div>
        <hr>

        <footer>
          <p>&copy; Company 2014</p>
        </footer>
      </div>  
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-ui-1.11.3.custom/external/jquery/jquery.js"></script>
    <script src="js/jquery-ui-1.11.3.custom/jquery-ui.js"></script>
    <script src="js/utilidades.js"></script>
    <script src="js/jquery.json-2.4.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>