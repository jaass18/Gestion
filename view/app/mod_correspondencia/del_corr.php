<?php
require('../../../controller/class/agent.classInt.php');

$objagent=new agent;

$id_doc=$_GET['id_corres'];

if( $objagent->eliminar_corr($id_doc) == true){
	echo "Correspondencia Eliminada";
}else{
	echo "Ocurrio un error , intenta de nuevo";
}
//include('../../../controller/class/hola.php');
?>