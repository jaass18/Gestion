<?php
include_once("../../controller/conect/conexion.class.php");
class xmlController{
 //constructor	
 	var $con;
 	function xmlController(){
 		$this->con=new DBManager;
 	}
	
	function getSucursales(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM sucursal");
		}
	}
	function getOfertas(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM oferta WHERE publicacion = 1 AND fecha_ini BETWEEN '000-00-000' AND CURRENT_TIMESTAMP AND fecha_fin >= CURRENT_TIMESTAMP ORDER BY idoferta ");
		}
	}
	
	
	
}
?>