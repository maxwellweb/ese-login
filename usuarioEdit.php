<?php
session_start();
if(!$_SESSION['usuario_logueado']){
    header('Location: index.php');
}
?>

<?php
require_once 'conexion.php';
        
if($usuarioEdit = $db->get_row("SELECT * FROM usuarios WHERE id_usuarios =".$_GET['id']."")){
    
    

 
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
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    </head>
    <body>
 
        
        <div class="row show-grid" title="Editar usuario">
        <div class="span11">
         <ul class="breadcrumb">
              <li class="active">Editar Actividad <?=$usuarioEdit->nombre;?></li>
         </ul>

            <form action="usuarios.php" method="post">
                <fieldset>
                    <legend>Nuevo usuario</legend>
                    <div class="clearfix">
             			<input type="hidden" name="id_usuarios" value="<?=$_GET['id']?>" >
                        <label for="login">Login</label>
                        <div class="input">
                            <input type="text" id="login" name="login" value="<?=$usuarioEdit->login;?>" class="xlarge" />
                        </div>
                    </div>
                    <div class="clearfix">
                        <label for="pwd">Contraseña</label>
                        <div class="input">
                            <input type="password" name="pwd" id="pwd" value="<?=$usuarioEdit->password;?>" class="xlarge" />
                        </div>
                    </div>
                    <div class="clearfix">
                        <label for="nombre">Nombre</label>
                        <div class="input">
                            <input type="text" name="nombre" id="nombre" value="<?=$usuarioEdit->nombre;?>" class="xlarge" />
                        </div>
                    </div>
                    <div class="clearfix">
                        <label for="apellido">Apellido</label>
                        <div class="input">
                            <input id="apellido" name="apellido" value="<?=$usuarioEdit->apellido;?>" class="xlarge" />
                        </div>
                    </div>
                    <div class="actions">
                        <input type="submit" class="btn info" name="actualizar" value="Actualizar datos" />
                        
                    </div>
                </fieldset>
            </form>
            <?php
                } else { ?>
                    <p>No existe el usuario</p>
            <?php
                }
            ?>
           
        </div>
  </div>
 
    </body>
</html>
