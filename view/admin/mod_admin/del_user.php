<?php
require('../../../controller/class/agent.classInt.php');

$objagent=new agent;

$iduser=$_GET['ID_Usuario'];

if( $objagent->eliminar_user($iduser) == true){
	echo "Usuario Eliminado";
}else{
	echo "Ocurrio un error , intenta de nuevo";
}
//include('../../../controller/class/hola.php');
?>