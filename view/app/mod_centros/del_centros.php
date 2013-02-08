<?php
require('../../../controller/class/agent.classInt.php');

$objagent=new agent;

$iduser=$_GET['idsucursal'];

if( $objagent->eliminar_sucur($iduser) == true){
	echo "Sucursal Eliminada";
}else{
	echo "Ocurrio un error , intenta de nuevo";
}
//include('../../../controller/class/hola.php');
?>