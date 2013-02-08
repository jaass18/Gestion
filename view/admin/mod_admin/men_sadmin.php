<script type="text/javascript">
$(document).ready(function(){
	
	// mostrar formulario de actualizar datos
	$("#sucursales a").click(function(){
		$("#formulario").html("");
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/app/mod_sucursales/mod_sucur.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	
	// llamar a formulario nuevo
	$("#ofertas a").click(function(){
		$("#formulario").html("");
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/app/mod_ofertas/mod_ofer.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	// llamar a formulario nuevo
	$("#usuarios a").click(function(){
		$("#formulario").html("");
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

	
	$("#documentos a").click(function(){
		$("#formulario").html("");
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
	$("#banners a").click(function(){
		$("#formulario").html("");
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'eventos/mod_eventos.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	$("#personal a").click(function(){
		$("#formulario").html("");
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/app/mod_personal/mod_personal.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	$("#centros a").click(function(){
		$("#formulario").html("");
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/app/mod_centros/mod_centros.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	$("#correspondencia a").click(function(){
		$("#formulario").html("");
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/app/mod_correspondencia/mod_corr.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
});

</script>
<div align="center" style=" display:block;height:20px; width:900px;  background-color:#444;">

<div style="width:125px;  float:left; margin-right:5px; display:block;">
   <div style="width:115px; height:16px; background: #444; padding:2px;">
   <span id="documentos"><a  href="partidos/mod_partidos.php" style="text-transform:uppercase; text-decoration:none; color:#fff; font-family:Arial;font-size:11px;	font-stretch:narrower; font-weight:bold;"><font color="#FF0000">[</font> Documentos <font color="#FF0000">]</font></a></span>
  </div></div>
  
  <div style="width:125px;  float:left; margin-right:5px; display:block;">
  <div style="width:115px; height:16px; background: #444; padding:2px;">
  <span id="usuarios"><a  href="mod_users.php" style="text-transform:uppercase; text-decoration:none; color:#fff; font-family:Arial;font-size:11px;	font-stretch:narrower; font-weight:bold;"><font color="#FF0000">[</font> Usuarios <font color="#FF0000">]</font></a></span>
  </div></div>
  
  
    <div style="width:125px;  float:left; margin-right:5px; display:block;">
  <div style="width:115px; height:16px; background: #444; padding:2px;">
  <span id="personal"><a  href="mod_users.php" style="text-transform:uppercase; text-decoration:none; color:#fff; font-family:Arial;font-size:11px;	font-stretch:narrower; font-weight:bold;"><font color="#FF0000">[</font> Personal <font color="#FF0000">]</font></a></span>
  </div></div>
  
  <div style="width:125px;  float:left; margin-right:5px; display:block;">
  <div style="width:115px; height:16px; background: #444; padding:2px;">
  <span id="centros"><a  href="mod_users.php" style="text-transform:uppercase; text-decoration:none; color:#fff; font-family:Arial;font-size:11px;	font-stretch:narrower; font-weight:bold;"><font color="#FF0000">[</font> Centros <font color="#FF0000">]</font></a></span>
  </div></div>
  
  <div style="width:145px;  float:left; margin-right:5px; display:block;">
  <div style="width:135px; height:16px; background: #444; padding:2px;">
  <span id="correspondencia"><a  href="mod_users.php" style="text-transform:uppercase; text-decoration:none; color:#fff; font-family:Arial;font-size:11px;	font-stretch:narrower; font-weight:bold;"><font color="#FF0000">[</font> Correspondencia <font color="#FF0000">]</font></a></span>
  </div></div>
  
   </span></div>
   <div id="wait" style="z-index:-2;margin: 0 auto; height:630px; padding-top: 205px;display:none; " align="center">
    <img src="http://www.ubk.es/images/ajax-loader2.gif" width="50" height="50" /><br />
    <span style=" font-family:Arial Black; font-size:10px; font-weight:bolder; text-transform:uppercase; ">Cargando...</span>
    </div>