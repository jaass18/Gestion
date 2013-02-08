<?php
require('../../../controller/class/agent.classInt.php');

$objagent=new agent;

$idpersonal=$_GET['id_personal'];

if( $objagent->eliminar_personal($idpersonal) == true){
	echo "Oferta Eliminada";
}else{
	echo "Ocurrio un error , intenta de nuevo";
}
//include('../../../controller/class/hola.php');
?>