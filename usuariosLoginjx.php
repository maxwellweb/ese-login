<?php
session_start();
    
    require 'conexion.php';
        
        $usuario = $db->get_row("SELECT id_usuarios, nombre, apellido FROM usuarios 
            WHERE login = '".$_POST['login']."' AND password = '".sha1($_POST['pwd'])."'");
    
        if($usuario){
            $_SESSION['usuario_logueado'] = $usuario;
            echo json_encode($usuario);
            
         }else{
             echo json_encode(array('error' => true));
         }
 
?>
