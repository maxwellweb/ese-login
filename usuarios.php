<?php
session_start();
if(!$_SESSION['usuario_logueado']){
    header('Location: index.php');
}
    require 'conexion.php';
    
    require_once 'lib/Zebra_Pagination.php';
    
    $total_usuarios = $db->get_var('SELECT count(*) FROM usuarios');
    $resultados = 10;
    
    $paginacion = new Zebra_Pagination();
    $paginacion->records($total_usuarios);
    $paginacion->records_per_page($resultados);
    
 if ($_POST) {

        $actualizaUsuario = $db->query("UPDATE `usuarios` SET 
            `nombre` = '".$_POST['nombre']."' , `apellido` = '".$_POST['apellido']."' , `login` = '".$_POST['login']."' , `password` = '".sha1($_POST['pwd'])."'
            WHERE `id_usuarios` = ".$_POST['id_usuarios'].";");

    if ($actualizaUsuario) {
        $graba = '<div class="alert alert-success" data-dismiss="alert">
        <a href="#" class="close">×</a>
        <p><strong>El usuario</strong>  se actualizo correctamente</p>
      </div>';
    }else{
        $noGraba = '<div class="alert alert-error"data-dismiss="alert">
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
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="js/box/thickbox.css" />
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
            #load{
                margin-left: 260px;
               
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap-alert.js"></script>
        <script src="js/jquery.color.js"></script>
        <script src="js/jquery.tablesorter.min.js"></script>
        <script src="js/box/thickbox.js"></script>
        <script src="bootstrap/js/bootstrap-dropdown.js"></script>
        <script>
            $(document).ready(function() {
                $('a.delete').click(function(e){
                    
                    e.preventDefault();
                    
                    var  msg = confirm("Desea eliminar este dato?");
                    var parent = $(this).parent();
                    var id = $(this).attr("id");
                    var string = 'id_usuarios='+ id ;
                    if(msg){
                        $('#load').show();
                        $.post('usuarioDelete.php', string , function(resp){
                            if(!resp.error){
                                $('#load').hide();
                                $('td.'+id).animate({'backgroundColor' : '#fb6c6c'}, 500);
                                $('tr#'+id).slideUp(900, function(){
                                    $('tr#'+id).remove();
                                });

                            } else {
                                $('#load').hide();
                                alert("No se elimino")
                            }
                        }, 'json');
                    }
                    return false;
                });     
            });

	$(function() {
            	$("table#tablaUsers").tablesorter({ sortList: [[0,1]] });
    	});
		$('.topbar').dropdown()
         	$('.alert-message').alert('close')
      </script>

    </head>
    <body>
	<?php include '_barra.php'; ?>
        <div class="container">
            <div class="page-header">
                <h1>Usuarios
                <small>Editar, borrar y agregar usuarios</small>
                </h1>
            </div>
         <ul class="breadcrumb">
             <li><a href="admin.php">Inicio</a> <span class="divider">/</span></li>
             <li class="active">Usuarios</li>              
         </ul>
                <?php if (isset($graba)) { ?>
                    <p> <?php echo $graba; ?></p>
                <?php } ?>
                   <?php if(isset($noGraba)) { ?>
                    <p><?php echo $noGraba; ?></p>
                <?php } ?>
            <div class="well" style="padding: 8px 17px 8px;">
                <p><a href="usuarioNew.php" class="btn btn-info"><i class="icon-user icon-white"></i> Nuevo Usuario</a></p>
            </div>
                    <img src="images/loadingAnimation.gif" id="load" alt="Cargando..." class="hide" />
            <table id="tablaUsers" class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="header yellow">#</th>
                        <th class="header">Nombre</th>
                        <th class="header">Apellido</th>
                        <th class="header">login</th>
                        <th class="header">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($usuarioObj = $db->get_results("SELECT * FROM usuarios LIMIT ".(($paginacion->get_page()- 1) * $resultados).",". $resultados) ) { 
                            foreach ($usuarioObj as $usuario ) { ?>
                              
                            <tr id="<?=$usuario->id_usuarios;?>">
                                <td class="<?=$usuario->id_usuarios;?>"><?=$usuario->id_usuarios;?></td>
                                <td class="<?=$usuario->id_usuarios;?>"><?=$usuario->nombre;?></td>
                                <td class="<?=$usuario->id_usuarios;?>"><?=$usuario->apellido;?></td>
                                <td class="<?=$usuario->id_usuarios;?>"><?=$usuario->login;?></td>
                                <td class="<?=$usuario->id_usuarios;?>">
                                <?php if($usuario->id_usuarios == 1) { ?>
								
							<?php	} else {
								?> 
									<a href="usuarioEdit.php?id=<?=$usuario->id_usuarios;?>&height=350&width=650" title="Editar a <?=$usuario->nombre;?> " class="btn btn-info thickbox"><i class="icon-pencil icon-white"></i> Editar</a>
                                    <a href="#" class="btn btn-danger delete" id="<?=$usuario->id_usuarios;?>"><i class="icon-trash icon-white"></i> Borrar</a>
                                    <?php } ?>
                                </td>
                           </tr>
                    <?php          
                            }
                         } else {
                    ?>
                <tr>
                    <td colspan="5">No hay datos</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
                    <div class="row">
                        <div class="span4"> </div>
                        <div class="span12">
                            <div class="span-two-thirds"><?php echo $paginacion->render(); ?></div>
                        </div>
                    </div>
            <div class="well" style="padding: 8px 17px 8px;">
                <p><a href="usuarioNew.php" class="btn btn-info"><i class="icon-user icon-white"></i> Nuevo Usuario</a></p>
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
