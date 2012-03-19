<?php
session_start();
if(!$_SESSION['usuario_logueado']){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]--> 
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap-dropdown.js" type="text/javascript"></script>
        <script>
           $('.topbar').dropdown()
        </script>
        <title>Administrador</title>
        <style type="text/css">
            body {
                padding-top: 60px;
            }
            .hero-unit {
                padding-top: 40px;
            }
            .sidebar {
                background: #eee;
            }
            form, .actions {
                margin-bottom: 0
            }
            .error {
                color: red
            }            
        </style>
    </head>
    <body>
<?php include '_barra.php'; ?>
      <div class="container">

          <ul class="breadcrumb">
              <li class="active">Inicio</li>
              
          </ul>
        <div class="hero-unit">
            <h2> </h2>
        </div>
        <footer>
        	<div class="row">
            <div class="span6">
            <p> &COPY; Maxilabs.us <?=date("Y");?> </p>
            </div>
            <div class="span6">
            <p class="pull-right">Administrador</p>
            </div>
            </div>
        </footer>
      </div>

    </body>
</html>
