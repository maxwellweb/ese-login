<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      	<a class="brand" href="#">
		  ese-login
		</a>
		<ul class="nav">
			<li class="active"><a href="admin.php">Inicio</a></li>
		</ul>
			<?php if(!isset($_SESSION['usuario_logueado'])) { ?>
            
            <?php } else { ?>
		<ul class="pull-right nav ">
			<li class="dropdown">
				<a href="#" class="dropdown-tongle" data-toggle="dropdown">
				<i class="icon-user icon-white"></i> 	
				<?=$_SESSION['usuario_logueado']->nombre;?>
					          <b class="caret"></b>
					
					</a>
				
					<ul class="dropdown-menu">
							<a href="usuarios.php">
								<i class="icon-th-list"></i>
								Usuarios</a></li>
						 <li class="divider"></li>
						<li><a href="logout.php">
							<i class="icon-off"></i> 
							Desconectar</a></li>
					    </ul>
				 </li>
		</ul>
		 <?php } ?>	
    </div>
  </div>
</div>