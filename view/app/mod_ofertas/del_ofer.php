<?php
require('../../../controller/class/agent.classInt.php');

$objagent=new agent;

$idsoferta=$_GET['idsoferta'];

if( $objagent->eliminar_ofer($idsoferta) == true){
	echo "Oferta Eliminada";
}else{
	echo "Ocurrio un error , intenta de nuevo";
}
//include('../../../controller/class/hola.php');
?>