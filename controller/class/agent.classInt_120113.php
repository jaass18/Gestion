<?php 
include_once("../../../controller/conect/conexion.class.php");
//include("../../../controller/class/UpArchivo/class.upload.php");

class agent{
 //constructor	
 	var $con;
 	function agent(){
 		$this->con=new DBManager;
 	}
	
	function getSucursales(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM sucursal")or die( mysql_error() );
		}
	}
	function getOfertas(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM oferta")or die( mysql_error() );
		}
	}
function combo()
{
	//
	// recibe los argumentos (*combo,*campo_valor,*valor_actual,*query,*onchange,*mensaje,*habilitado,[*campo1,campo2,...])
	// del 0 al 6 son campos obligatorios
	//$combo_id,$llave,$valor_llave,$sql,$url,$mensaje,$habilitar,$campo1
	$argumentos=func_num_args();
	$combo_id=func_get_arg(0);
	$llave=func_get_arg(1);
	$valor_llave=func_get_arg(2);
	$sql=func_get_arg(3);
	$url=func_get_arg(4);
	$mensaje=func_get_arg(5);
	$habilitar=func_get_arg(6);
	if($this->con->conectar()==true){
			$result = mysql_query($sql);
			$registros = mysql_num_rows($result);
		}
	
	//$result = mysql_query($sql);//devuelve la consulta
	//$registros = mysql_num_rows($result);

	//echo $sql." / Registros: ".$registros."<br>";

	$comboi='    <select name="'.$combo_id.'" class="etiquetas_campos" '.$habilitar.' onChange='.$url.'>';
	//echo"url".$url;
	if ($valor_llave == 0){
		$comboi.="<option value= '0' selected='selected'>".$mensaje."</option>";
	}
	while ($rows = mysql_fetch_array($result)){
	  if ($valor_llave == $rows[$llave]) {
	  		$selecc=" selected='selected' ";}
	  else {
	  		$selecc=" ";
	  }		
	  $campos="";
	  
	  for ($i=7;$i<$argumentos;$i++){
	    $variable=func_get_arg($i);
		$campos.=$rows[$variable];
		if ($i<$argumentos) { $campos.=" "; }
	  }
	  $comboi.="<option value= '".$rows[$llave]."'".$selecc.">".$campos."</option>";
	  
 	  	  //echo $llave." = ".$row[$llave]."<br>";

	} 
	$comboi.="    </select>";
	
	return $comboi;
}
	/*/Metodos Usuario
	
	*/	
	function obtener_user($pass,$user){
		if($this->con->conectar()==true){
			$q = "SELECT * FROM Usuarios WHERE Password = '".$pass."' AND Usuario = '".$user."'";
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
	
	function insertar_user($nombre,$a_paterno,$a_materno,$depart,$user,$pass,$nivel){
		if($this->con->conectar()==true){
			return mysql_query("INSERT INTO Usuarios (ID_Usuario,Nombre,A_Paterno,A_Materno,Departamento,Usuario,Password,T_Usuario) VALUES (null,'".$nombre."', '".$a_paterno."' ,'".$a_materno."', '".$depart."','".$user."','".$pass."',".$nivel.")");
		}
	}
	
	function consulta_user(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM Usuarios ORDER BY ID_Usuario ASC");
		}
	}
	function consulta_sucur(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM sucursal ORDER BY idsucursal ASC");
		}
	}
	function consulta_ofer(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM oferta ORDER BY idoferta ASC");
		}
	}
	function eliminar_user($iduser){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM Usuarios WHERE ID_Usuario =".$iduser)or die( mysql_error() );
		}
	}
	function eliminar_sucur($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM sucursal WHERE idsucursal =".$id)or die( mysql_error() );
		}
	}
	function eliminar_ofer($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM oferta WHERE idoferta =".$id)or die( mysql_error() );
		}
	}
	function mostrar_user($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM Usuarios WHERE ID_Usuario =".$id);
		}
	}
	function mostrar_sucur($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM sucursal WHERE idsucursal=".$id);
		}
	}
	function mostrar_ofer($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM oferta WHERE idoferta=".$id);
		}
	}
	function mostrar_idsucursales($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT idsucursales FROM oferta WHERE idoferta=".$id);
		}
	}
	function edit_user($nombre,$a_paterno,$a_materno,$depart,$user,$nivel,$pass,$id){
		if($this->con->conectar()==true){
	    return mysql_query("UPDATE usuarios SET Nombre='".$nombre."', A_Paterno='".$a_paterno."', A_Materno='".$a_materno."', Departamento='".$depart."', Usuario='".$user."', Password='".$pass."', T_Usuario='".$nivel."' WHERE ID_Usuario =".$id)or die( mysql_error() );
		}
	}
	
	function edit_sucur($nombre,$razon_s,$dir,$zona,$x,$y,$img,$id){
		if($this->con->conectar()==true){
	    return mysql_query("
		UPDATE sucursal SET nombre = '".$nombre."',razon_s = '".$razon_s."',direccion = '".$dir."',zona = '".$zona."',coordenada_x = '".$x."',coordenada_y = '".$y."',img = '".$img."'  WHERE idsucursal=".$id)or die( mysql_error() );
		}
	}
	function edit_ofer($nom_product,$costo,$descuento,$publicacion,$descrip,$fech_ini,$fech_fin,$img,$id_sucursales,$id){
		if($this->con->conectar()==true){
	    return mysql_query("
		UPDATE oferta SET nom_product = '".$nom_product."',descrip = '".$descrip."', costo = '".$costo."',descuento = '".$descuento."',fecha_ini = '".$fech_ini."',fecha_fin = '".$fech_fin."',publicacion = '".$publicacion."' ,img = '".$img."',id_sucursales = '".$id_sucursales."' WHERE idoferta=".$id )or die( mysql_error() );
		}
	}
	
	function insertar_suc($nombre,$razon_s,$zona,$dir,$x,$y,$img){
	if($this->con->conectar()==true){
	return mysql_query("INSERT INTO sucursal (idsucursal, nombre, razon_s, direccion, zona, coordenada_x, coordenada_y, img) VALUES (NULL, '".$nombre."', '".$razon_s."', '".$dir."', '".$zona."', '".$x."', '".$y."', '".$img."')")or die( mysql_error() );
	  }
	}
	function insertar_ofer($nom_product,$costo,$descuento,$publicacion,$descrip,$fech_ini,$fech_fin,$img,$id_sucursales){
	if($this->con->conectar()==true){
	return mysql_query("INSERT INTO oferta ( nom_product, descrip, costo, descuento,  fecha_ini, fecha_fin,publicacion,img,id_sucursales) VALUES ('".$nom_product."','".$descrip."', '$costo', '$descuento', '".$fech_ini."', '".$fech_fin."', '".$publicacion."', '".$img."', '".$id_sucursales."')")or die( mysql_error() );
		}
	}
}
?>