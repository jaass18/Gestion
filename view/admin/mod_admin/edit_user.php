<?php
if(isset($_POST['submit'])){
	require('../../../controller/class/agent.classInt.php');
	$objagent=new agent;
	
	$id = htmlspecialchars(trim($_POST['ID_Usuario']));
	$nombre = htmlspecialchars(trim($_POST['Nombre']));
	$a_paterno = htmlspecialchars(trim($_POST['A_Paterno']));
	$a_materno = htmlspecialchars(trim($_POST['A_Materno']));
	$depart = htmlspecialchars(trim($_POST['Departamento']));
	$user = htmlspecialchars(trim($_POST['Usuario']));
	$nivel = htmlspecialchars(trim($_POST['T_Usuario']));
	$pass = htmlspecialchars(trim($_POST['Password']));
	
	
	if ( $objagent->edit_user($nombre,$a_paterno,$a_materno,$depart,$user,$nivel,$pass,$id) == true){
			echo 'DATOS  GUARDADOS ¡CLICK EN ACEPTAR!';
			
	}else{
		echo 'SE PRODUJO UN ERROR , INTENTE NUEVAMENTE';
	}
	
}else{
	if(isset($_GET['ID_Usuario'])){
		
		require('../../../controller/class/agent.classInt.php');
		$objagent=new agent;
		$consulta = $objagent->mostrar_user($_GET['ID_Usuario']);
		$agent = mysql_fetch_array($consulta);
	?>
   <script type="text/javascript">

function formReset()
{
document.getElementById("frmUserEdit").reset();
}

$.validator.setDefaults({
	submitHandler: function() { 
	EditUser(); return false
	 }
});

$().ready(function() {
	$("#frmUserEdit").validate({
	rules: {
			Nombre:  
			{
				required: true,
      			maxlength: 30
							
			},
			Usuario:  
			{
				required: true,
      			maxlength: 8
							
			},
			Password:  
			{
				required: true,
      			maxlength: 8
							
			},
			T_Usuario:  
			{
				required: true,
      			
							
			},
			
			},
		messages: {
			Nombre:
			{
				required: "Ingresa el Nombre del Usuario",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 20 Caracteres"
			},
			Usuario:
			{
				required: "Ingresa el Nickname del Usuario",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 8 Caracteres"
			},
			Password:
			{
				required: "Ingresa el password",
				minlength: "Mas de  1 Caracteres",
				maxlength:"No mas de 8 Caracteres"
			},
			
			
			
			}
	});
	$("#atras a").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'medios/mod_medios.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	
	$("#cancelar").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/admin/mod_admin/consul_user.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	$("#cancelar0").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/admin/mod_admin/consul_user.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	$("#cancelar1").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/admin/mod_admin/consul_user.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	$("#cancelar2").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/admin/mod_admin/mod_users.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	$("#cancelar3").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/admin/mod_admin/mod_users.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	
});
</script>
<div>

<div style="background-color: #444444;height: 60px;padding-left: 20px;padding-right: 20px;padding-top: 20px;">
  <div style="width:60%; float:left; padding-top: 10px;"> <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> <font color="#fff" size="+1">
    Administrar Usuarios </font> <font color="#FF0000" size="+2"> ]</font> </span>
       
  <!-- <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Selecciona la acción a Realizar</span>--> 
   </div>
   <div style="width:40%; float:left;">
   <table width="120" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td width="80" align="center"><span id="cancelar0"><a href="#"><img src="view/admin/img/32x32/notification_error.png" width="32" height="32" border="0"  /></a></span></td>
    <td width="80" align="center"><span id="cancelar2"><a href="#"><img src="view/admin/img/32x32/calendar.png" width="32" height="32" border="0"  /></a></span></td>
  </tr>
  <tr>
    <td align="center"><span id="cancelar1"><a href="#"><font color="#FFFFFF">Cerrar </font></a></span></td>
    <td align="center"><span id="cancelar3"><a href="#"><font color="#FFFFFF">Panel </font></a></span></td>
  </tr>
</table>
    </div>
  </div>
   
<div style="padding-left: 20px;   padding-right: 20px;    padding-top: 3px; float:left; width:900px;"> 
<form class="cmxform" id="frmUserEdit" style="position:relative;" name="frmUserEdit" method="post" action="view/admin/mod_admin/edit_user.php" >

   <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> <font color="#333" size="+1">
    Usuario </font> <font color="#FF0000" size="+2"> ]</font> </span> <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Editar</span>  <br />   
  
   <input type="hidden" name="ID_Usuario" id="ID_Usuario" value="<?php echo $agent['id_usuario']?>" /><br />
<span class="variable" style=" font-size:11px;">Nombre</span><br />
            <input  name="Nombre" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="Nombre" type="text" size="50" value="<?php echo $agent['nombre']?>" > <br /><br />
            <span class="variable" style=" font-size:11px;">Apellido Paterno</span><br />
            <input  name="A_Paterno" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="A_Paterno" type="text" size="50" value="<?php echo $agent['a_paterno']?>" > <br /><br />
   <span class="variable" style=" font-size:11px;">Apellido Materno</span><br />
            <input  name="A_Materno" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="A_Materno" type="text" size="50" value="<?php echo $agent['a_materno']?>" > <br /><br />         
<span class="variable" style=" font-size:11px;">Ligar Usuario</span><br />		
 <select name="id_personal" id="id_personal"  class="required"  style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
<?php
$consultaper=$objagent->consulta_personal();
	if($consulta) {
		while( $agentper = mysql_fetch_array($consultaper) ){
		?>
		<option value="<?php echo $agentper['id_personal'];?>"><?php echo $agentper['n_personal'];?> <?php echo $agentper['a_paterno'];?> <?php echo $agentper['a_materno'];?> | <?php echo $agentper['id_ct']; ?></option>
		<?php
		}
		
	}else {echo "Problema con Consulta";}
?>
</select><br /><br />

<span class="variable" style=" font-size:11px;">Departamento</span><br />
            <input  name="Departamento" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="Departamento" type="text" size="50" value="<?php echo $agent['Departamento']?>" > <br /><br />
            <span class="variable" style=" font-size:11px;">User</span><br />
            <input  name="Usuario" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="Usuario" type="text" size="50" value="<?php echo $agent['usuario']?>" > <br /><br />
 <span class="variable" style=" font-size:11px;">Password</span><br />
            <input  name="Password" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="Password" type="password" size="50" value="<?php echo $agent['password']?>" > <br /><br />
<span class="variable" style=" font-size:11px;">Verifica Pasword</span><br />
            <input  name="veripass" class="required" style="font-family:Arial;font-size:11px;	font-stretch:narrower;" id="veripass" type="password" size="50" value="<?php echo $agent['password']?>" > <br /><br />
			
            
            <span class="variable" style=" font-size:11px;">Nivel de Acceso</span><br />
 <select name="T_Usuario" id="T_Usuario" size="5"  class="required"  style="text-transform:none; font-family:Arial;font-size:11px;	font-stretch:narrower;">
 
 <?php 
 if( $agent['t_usuario'] == 0){ $varSel= " selected='selected' ";
 ?>
 <option value= "0" <?php echo $varSel;?> >Super Administrador</option>
 <option value= "1"  >Administrador</option>
 <?php
 }else{$varSel= " selected='selected' ";
 ?>
<option value= "0"  >Super Administrador</option>
<option value= "1" <?php echo $varSel;?> >Administrador</option>
 <?php
 }
 ?>
</select>
<br /><br />


<p align="center">
  <input  onclick="formReset()" type="image" src="view/admin/img/limpiar.png" class="variable"  />
  <input class="variable" name="submit" id="submit" type="image" src="view/admin/img/guardar.png" />
  <input  class="variable" name="cancelar" id="cancelar" type="image" src="view/admin/img/cancelar.png"   />
  </p>
  
</form>
</div></div>
 
   <?php
	}
}
?>