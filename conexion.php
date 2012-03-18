<?php

/*
 *  Max Soares 
 * 
 * Conectando a la base de datos
 */
include_once 'lib/shared/ez_sql_core.php';
include_once 'lib/mysql/ez_sql_mysql.php';

    $db = new ezSQL_mysql('usuario', 'contraseña', 'base de datos', 'localhost');
?>
