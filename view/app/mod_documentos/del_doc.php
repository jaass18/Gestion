<?php
require('../../../controller/class/agent.classInt.php');

$objagent=new agent;

$id_doc=$_GET['id_documentos'];

if( $objagent->eliminar_doc($id_doc) == true){
	echo "Documento Eliminado";
}else{
	echo "Ocurrio un error , intenta de nuevo";
}
//include('../../../controller/class/hola.php');
?>