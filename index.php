<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
         <![endif]--> 
        <style type="text/css">
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
        <title></title>
        <!--<script src="js/jquery-1.7.1.js"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap-dropdown.js"></script>
		<script src="bootstrap/js/bootstrap-carousel.js"></script>
        <script>
            
			$(function(){
				$('#login-form').submit(function(e) {
					e.preventDefault();

					$('#load').show();

					$.post('usuariosLoginjx.php', $(this).serialize(), function(resp) {
					  	if (!resp.error) {
					  		$('#load').hide();

					  		var html = '<h3>Hola, ' + resp.nombre + ' ' + resp.apellido + '!</h3>' +
										'<p>' +
											'<a href="admin.php">Administrar</a>' +
										'</p>'
                                                                                +
										'<p>' +
											'<a href="logout.php">Logout</a>' +
										'</p>';
												
							$('.well').html(html);

					  	} else {
					  		$('#load').hide();

					  		var error = '<p class="error">' +
											'Usuario y/o password incorrecto.' +
										'</p>';

							$('#login-form .error').remove();

							$('.form-actions').before(error);
					  	};
					}, 'json');
					
				});

			});
			$('.siscarrusel').carousel({
			  interval: 2000
			})
        </script>
    </head>
    <body>
	<?php include '_barra.php'; ?>
  
        <div class="container">
            <div class="hero-unit">
                <h2>Bienvenido al Administrador!</h2>
                <p>de contenidos via web </p>
            </div>
            <div class="row">
                <div class="well span3">
                    <?php if(!isset ($_SESSION['usuario_logueado'])) { ?>
                    <form id="login-form" action="" method="post" class="form-stacked">
                        <h3>Acceso</h3>
                        <div class="control-group">
                            <label class="control-label" for="login">Usuario:</label>
                            <div class="controls">
                                <input type="text" name="login" id="login" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="pwd">Password:</label>
                            <div class="controls">
                                <input type="password" name="pwd" id="pwd" />
                            </div>                           
                        </div>
                        <?php if (isset($error)) { ?>
                            <p class="error">
                                <?php echo $error; ?>
                            </p>
                        <?php } ?>
                        <div class="form-actions">
                            <input type="submit" value="login" class="btn btn-primary" />
                            <img src="images/ajax-loader.gif" id="load" alt="Cargando..." class="hide" />
                        </div>
                      
                    </form>
                    <?php } else { ?>
                    <h3>Hola  <?php echo $_SESSION['usuario_logueado']->nombre; ?></h3>
                    <p>
                        <a href="logout.php">Salir</a>                    
                    </p>
                    <?php } ?>
                </div>
                <div class="content span8">
                    <h2>Algo del sistema:</h2>
                    <div id="siscarrusel" class="carousel">
						<!-- Carusel itens-->
						<div class="carousel-inner">
							<div class="active item">
								<img src="images/HTML_Logo.jpg" alt="" />
								<div class="carousel-caption "><h4>HTML 5</h4>
									<p>El sistema esta basado en los nuevos estandartes de HTML5</p>
									</div>
							</div>
							<div class="item"></div>
							<div class="item"></div>
						</div>
						<!-- Carusel Nav-->
						<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
					  	<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
					</div>
                </div>
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
