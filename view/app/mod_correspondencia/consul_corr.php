<?php
require('../../../controller/class/agent.classInt.php');
$objagent=new agent;
$consulta=$objagent->consulta_doc();
?>
<script type="text/javascript">
$(document).ready(function(){
	// mostrar formulario de actualizar datos
	$("table tr .modi a").click(function(){
		$('#tabla').hide();
		$("#formulario").show();
		$("#wait").show();
		$.ajax({
			url: this.href,
			type: "GET",
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	
	// llamar a formulario nuevo
	$("#cancelar").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/app/mod_documentos/mod_doc.php',
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
			url: 'view/app/mod_documentos/mod_doc.php',
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
			url: 'view/app/mod_documentos/mod_doc.php',
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
			url: 'view/app/mod_documentos/mod_doc.php',
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
			url: 'view/app/mod_documentos/mod_doc.php',
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
<div style="background-color: #444444;height: 65px;padding-left: 20px;padding-right: 20px;padding-top: 20px;">
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
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr class="nada" >
		    <td height="28" align="center" valign="middle" bgcolor="#666666"><span class="variabletit" style="color:#666666"> <font color="#FF0000" size="-1">[ </font> <font color="#fff" size="-1">
    Id </font> <font color="#FF0000" size="-1"> ]</font> </span></td>
		    <td align="center" valign="middle" bgcolor="#666666">
            <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="-1">[ </font> <font color="#fff" size="-1">
    Para</font> <font color="#FF0000" size="-1"> ]</font> </span>
            </td>
             <td align="center" valign="middle" bgcolor="#666666">
            <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="-1">[ </font></span><span class="variabletit"><font color="#fff" size="-1">Asunto</font></span><span class="variabletit" style="color:#666666"><font color="#FF0000" size="-1"> ]</font> </span>
            </td>
            <!--  <td align="center" valign="middle" bgcolor="#666666">
            <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="-1">[ </font></span><span class="variabletit"><font color="#fff" size="-1">Referencia</font></span><span class="variabletit" style="color:#666666"><font color="#FF0000" size="-1"> ]</font> </span>
            </td>-->
            
      <td align="center" valign="middle" bgcolor="#666666"><span class="variabletit" style="color:#666666"> <font color="#FF0000" size="-1">[ </font></span><span class="variabletit"><font color="#fff" size="-1">Tipo</font></span><span class="variabletit" style="color:#666666"><font color="#FF0000" size="-1"> ]</font> </span></td>
        <td align="center" valign="middle" bgcolor="#666666"><span class="variabletit" style="color:#666666"> <font color="#FF0000" size="-1">[ </font></span><span class="variabletit"><font color="#fff" size="-1">Estatus</font></span><span class="variabletit" style="color:#666666"><font color="#FF0000" size="-1"> ]</font> </span></td>
		    <td align="center" valign="middle" bgcolor="#666666">&nbsp;</td>
		    <td align="center" valign="middle" bgcolor="#666666">&nbsp;</td>
		    
		  
    </tr>
   	
<?php
if($consulta) {
	while( $agent = mysql_fetch_array($consulta) ){
	?>
	
		  <tr id="fila-<?php echo $agent['id_documentos'] ?>" >
			  <td width="112" align="center" valign="top"><?php echo $agent['id_documentos'] ?></td>
			  <td width="207" align="center" valign="top"><?php echo $agent['para'] ?></td>
              <td width="207" align="center" valign="top"><?php echo $agent['asunto'] ?></td>
              <!--<td width="207" align="center" valign="top"><?php echo $agent['ref_doc'] ?></td>-->
			<td width="162" align="center" valign="top"><?php if( $agent['tipos']==0){echo "Carta";} if( $agent['tipos']== 1){echo "Oficio";} if( $agent['tipos']== 2){echo "Memorandum";}if( $agent['tipos']== 3){echo "Circulares";}if( $agent['tipos']== 4){ echo "Notas";} ?></td>
            <td width="162" align="center" valign="top"><?php if( $agent['status']==0){echo "Activo";} if( $agent['status']== 1){echo "cancelado";}?></td>
              <td width="89" align="center" valign="top"><span class="modi"><a href=
              "view/app/mod_documentos/edit_doc.php?id_documentos=<?php echo $agent['id_documentos'] ?>"><img src="view/admin/img/32x32/file_edit.png" alt="Editar" width="22" height="22" border="0" title="Editar" /></a></span></td>
			  <td width="144" align="center" valign="middle"><span class="modi" style="font-family:Trebuchet MS; font-weight:bold;  font-size:10px;"><a href="view/app/mod_documentos/edit_doc.php?id_documentos=<?php echo $agent['id_documentos'] ?>" style="text-decoration:none;  ">EDITAR</a></span></td>
			 <!-- <td width="89" align="center" valign="top"><span class="dele"><a onClick="EliminarDocumento(<?php echo $agent['id_documentos'] ?>); return false" href="view/app/mod_documentos/del_doc.php?id_documentos=<?php echo $agent['id_documentos'] ?>"><img src="view/admin/img/32x32/file_delete.png" alt="Eliminar" width="22" height="22" border="0" title="Eliminar" /></a></span></td>
			  <td width="144" align="center" valign="middle"><span class="dele" style="font-family:Trebuchet MS; font-weight:bold;  font-size:10px;"><a onClick="EliminarDocumento(<?php echo $agent['id_documentos'] ?>); return false" href="view/app/mod_documentos/del_doc.php?id_documentos=<?php echo $agent['id_documentos'] ?>" style="text-decoration:none; ">ELIMINAR</a></span></td>
		  </tr>-->
		  
	<?php
	}
	
}else {echo "no consulta";}
?>
    </table>
</div>