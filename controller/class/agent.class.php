<?php 
include_once("controller/conect/conexion.class.php");

class agent{
 //constructor	
 	var $con;
 	function agent(){
 		$this->con=new DBManager;
 	}

	/*/Metodos Usuario
	
	*/	
	function obtener_user($pass,$user){
		if($this->con->conectar()==true){
			$q = "SELECT * FROM sis_usuarios WHERE password = '".$pass."' AND usuario = '".$user."'";
    		$result = mysql_query($q) or oiError(mysql_error());
			$array = array();
		while ($row = @mysql_fetch_object($result)){
			$array[] = $row;
		}
		return $array;  
    		//$ret = mysql_fetch_array($result);  
    		//$segm = $ret['roll'];  
    		//mysql_free_result($result);  
    		//return $result;//$segm;  
		}
	}
	
	
}
?>