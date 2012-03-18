<?php
session_start();
if(!$_SESSION['usuario_logueado']){
    header('Location: index.php');
}
?>

<?php
    
 if ($_POST) {
        require 'conexion.php';
        $agregarUsuario = $db->query("INSERT INTO `usuarios` (
            `id_usuarios` ,
            `nombre` ,
            `apellido` ,
            `login` ,
            `password`
            )
            VALUES ( 
            NULL , '".$_POST['nombre']."', '".$_POST['apellido']."', '".$_POST['login']."', '".sha1($_POST['pwd'])."');");

    if ($agregarUsuario) {
        $graba = '<div class="alert-message success">
        <a href="#" class="close">×</a>
        <p><strong>=D</strong> El usuario se agrego correctamente</p>
      </div>';
    }else{
        $noGraba = '<div class="alert-message error">
        <a href="#" class="close">×</a>
        <p><strong>Oh No!</strong> tenemos un problema :\</p>
      </div>';
    }        
 }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Usuarios</title>
         <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]--> 
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
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
            div.vanadium-valid {
                border-color: green !important;
                border-style: solid !important;
            }
            .vanadium-message-value {
                font-style: italic;
                text-decoration: underline;
            }
            .vanadium-advice.vanadium-invalid, .vanadium-advice.vanadium-invalid * {
                color: red;
            }
            input.vanadium-valid {
                border-color: greenyellow;
            }
            input.vanadium-invalid {
                border-color: pink;
            }
            input.vanadium-valid ~ .vanadium-valid-advice {
                display: inline !important;
                color: green;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="js/vanadium-min.js"></script>
        <script src="bootstrap/js/bootstrap-dropdown.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap-alerts.js"></script>
        <script >
            $('.topbar').dropdown()
            $('.alert-message').alert('close')
        </script>
    </head>
    <body>
    <div class="topbar">
            <div class="fill">
                <div class="container">
                    <a class="brand" href="#">FFM</a>
                    <ul class="nav">
                        <li class="active"><a href="admin.php">Inicio</a></li>
                                                
                    </ul>
                    <ul class="nav secondary-nav">
                        <li class="dropdown" data-dropdown="dropdown">
                            <a href="#" class="dropdown-toggle"><?=$_SESSION['usuario_logueado']->nombre;?></a> 
                            <ul class="dropdown-menu">

                                <li>
                                    <a href="actividades.php">Actividades</a>
                                </li>
                                <li>
                                    <a href="usuarios.php">Usuarios</a>
                                </li>
                                <li class="divider"></li>                                
                                <li>
                                    <a href="logout.php">Desconectar?</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    
                </div>
            </div>
      </div>
        <div class="container">
         <ul class="breadcrumb">
             <li><a href="admin.php">Inicio</a> <span class="divider">/</span></li>
             <li><a href="usuarios.php">Usuarios</a><span class="divider">/</span></li>
             <li class="active">Nuevo Usuario</li>
         </ul>
                <?php if (isset($graba)) { ?>
                    <p> <?php echo $graba; ?></p>
                <?php } ?>
                   <?php if(isset($noGraba)) { ?>
                    <p><?php echo $noGraba; ?></p>
                <?php } ?>
            <form action="" method="post">
                <fieldset>
                    <legend>Nuevo usuario</legend>
                    <div class="clearfix">
                        <label for="login">Login</label>
                        <div class="input">
                            <input type="text" id="login" name="login" class=":required xlarge" />
                        </div>
                    </div>
                    <div class="clearfix">
                        <label for="pwd">Contraseña</label>
                        <div class="input">
                            <input type="password" name="pwd" id="pwd" class=":required xlarge" />
                        </div>
                    </div>
                    <div class="clearfix">
                        <label for="nombre">Nombre</label>
                        <div class="input">
                            <input type="text" name="nombre" id="nombre" class=":required xlarge" />
                        </div>
                    </div>
                    <div class="clearfix">
                        <label for="apellido">Apellido</label>
                        <div class="input">
                            <input id="apellido" name="apellido" class=":required xlarge" />
                        </div>
                    </div>
                    <div class="actions">
                        <input type="submit" class="btn info" value="Grabar" />
                        <FORM><input type="button" class="btn" value="Cancelar" 
                                        onclick="history.go(-1)" /></FORM>
                    </div>
                </fieldset>
            </form>
            
        <footer>
            <p> &COPY; Maxilabs.us <?=date("Y");?> </p>
            <p class="pull-right">Administrador</p>
        </footer>
        </div>
    </body>
</html>
