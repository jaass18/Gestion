<?php 
include_once("../../../controller/conect/conexion.class.php");
//include("../../../controller/class/UpArchivo/class.upload.php");

class agent{
 //constructor	
 	var $con;
 	function agent(){
 		$this->con=new DBManager;
 	}
	
	function getDocumentos(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM sis_documentos")or die( mysql_error() );
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
			$q = "SELECT us.usuario, us.password,us.t_usuario,p.nombre, p.a_paterno,p.a_materno,dpt.nombre_depar,dpt.sim_dep,ct.sim_ct FROM sis_personal AS p
INNER JOIN sis_puestos AS pu ON pu.id_puesto = p.id_puesto
INNER JOIN sis_depart_ct AS dpt ON dpt.id_dep_ct = p.id_dep_ct
INNER JOIN sis_centro_trabajo AS ct ON ct.id_ct = p.id_ct
INNER JOIN sis_usuarios AS us ON us.id_personal=p.id_personal
WHERE pu.nivel_j <=5 AND us.password = '".$pass."' AND us.usuario = '".$user."' ORDER BY ct.id_ct ASC";
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
	
	function insertar_user($user,$pass,$nivel,$id_personal){
		if($this->con->conectar()==true){
			return mysql_query("INSERT INTO sis_usuarios (id_usuario,usuario,password,t_usuario,id_personal) VALUES (null,'".$user."','".$pass."','".$nivel."','".$id_personal."')");
		}
	}
	//Agregar Funcion Centro de trabajo Julio//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	function insertar_centro($clave_ct,$sim_ct,$nombre,$direccion,$tel,$email,$web){
		if($this->con->conectar()==true){
			return mysql_query("INSERT INTO sis_centro_trabajo (id_ct,clave_ct,sim_ct,nombre,direccion,tel,email,web) VALUES (null,'".$clave_ct."','".$sim_ct."','".$nombre."','".$direccion."','".$tel."','".$email."','".$web."')");
		}
	}
	
	//Agregar Funcion Consulta personal//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	function consulta_centro(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM sis_centro_trabajo ORDER BY id_ct ASC");
		}
	}
	function consulta_departamento(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM sis_depart_ct ORDER BY id_ct ASC");
		}
	}
	function consulta_puesto(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM sis_puestos ORDER BY id_puesto ASC");
		}
	}

	function consulta_personal(){
		if($this->con->conectar()==true){
			return mysql_query("
			SELECT p.id_personal, p.nombre, p.a_paterno,p.a_materno,dpt.nombre_depar,pu.nom_puesto,dpt.sim_dep,ct.sim_ct 
			FROM sis_personal AS p
			INNER JOIN sis_puestos AS pu ON pu.id_puesto = p.id_puesto
			INNER JOIN sis_depart_ct AS dpt ON dpt.id_dep_ct = p.id_dep_ct
			INNER JOIN sis_centro_trabajo AS ct ON ct.id_ct = p.id_ct
			WHERE pu.nivel_j <=5 	
			ORDER BY ct.id_ct ASC");
		}
	}
	
	function consulta_user(){
		if($this->con->conectar()==true){
			return mysql_query("
			SELECT p.id_personal,us.usuario,us.t_usuario, dpt.nombre_depar,pu.nom_puesto,dpt.sim_dep,ct.sim_ct, us.id_usuario 
			FROM sis_personal AS p
			INNER JOIN sis_puestos AS pu ON pu.id_puesto = p.id_puesto
			INNER JOIN sis_depart_ct AS dpt ON dpt.id_dep_ct = p.id_dep_ct
			INNER JOIN sis_centro_trabajo AS ct ON ct.id_ct = p.id_ct
			INNER JOIN sis_usuarios AS us ON us.id_personal=p.id_personal
			WHERE pu.nivel_j <=5 ORDER BY us.id_usuario ASC");
		}
	}
	function consulta_doc(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM sis_documentos ORDER BY id_documentos ASC");
		}
	}
	
	function eliminar_user($iduser){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM sis_usuarios WHERE id_usuario =".$iduser)or die( mysql_error() );
		}
	}
	function eliminar_doc($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM sis_documentos WHERE id_documentos =".$id)or die( mysql_error() );
		}
	}
	
	function mostrar_user($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM sis_usuarios WHERE id_usuario =".$id);
		}
	}
	function mostrar_doc($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM sis_documentos WHERE id_documentos=".$id);
		}
	}

	function mostrar_id_documentos($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT id_documentos FROM sis_documentos WHERE id_documentos=".$id);
		}
	}
	function edit_user($nombre,$a_paterno,$a_materno,$depart,$user,$nivel,$pass,$id){
		if($this->con->conectar()==true){
	    return mysql_query("UPDATE sis_usuarios SET nombre='".$nombre."', a_paterno='".$a_paterno."', a_materno='".$a_materno."', departamento='".$depart."', usuario='".$user."', password='".$pass."', t_usuario='".$nivel."' WHERE id_usuario =".$id)or die( mysql_error() );
		}
	}
	
	function edit_doc($id_documentos,$para,$asunto,$elaboro,$no_folio_asig,$firma,$f_entrega,$tipos,$ori_copia, $status){
		if($this->con->conectar()==true){
	    return mysql_query("UPDATE sis_documentos SET para='".$para."', asunto='".$asunto."', elaboro='".$elaboro."', no_folio_asig='".$no_folio_asig."', firma='".$firma."', f_entrega='".$f_entrega."', ori_copia='".$ori_copia."',status='".$status."' WHERE id_documentos =".$id_documentos)or die( mysql_error() );
		}
	}
	
	function insertar_doc($para,$asunto,$elaboro,$no_folio_asig,$firma,$f_entrega,$tipos,$ori_copia,$status){
	if($this->con->conectar()==true){
	return mysql_query("INSERT INTO sis_documentos (id_documentos,para, asunto, elaboro, no_folio_asig, firma, f_entrega, tipos, ori_copia, status) VALUES (NULL, '".$para."', '".$asunto."', '".$elaboro."', '".$no_folio_asig."', '".$firma."', '".$f_entrega."', '".$tipos."', '".$ori_copia."', '".$status."')")or die( mysql_error() );
	  }
	}
	
}
?>