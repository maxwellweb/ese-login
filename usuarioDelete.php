<?php
session_start();
if(!$_SESSION['usuario_logueado']){
    header('Location: index.php');
}
require_once 'conexion.php';


        $uEliminar = $db->query("DELETE FROM usuarios WHERE id_usuarios = ".$_POST['id_usuarios']."");
        
        if($uEliminar){
            echo json_encode($uEliminar);
        }else{
            echo json_decode(array('error' => true));
        }
     
                
?>
