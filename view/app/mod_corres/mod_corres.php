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
	$("#nuevo a").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/app/mod_ofertas/add_ofer.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	// llamar a formulario nuevo
	$("#editar a").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'view/app/mod_ofertas/consul_ofer.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	$("#del a").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'users/consulta_del_user.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	$("#reg_list").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'users/consulta_user.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
	
		$("#atras a").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$("#wait").show();
		$.ajax({
			type: "GET",
			url: 'users/super_admin.php',
			success: function(datos){
				$("#formulario").html(datos);
				$("#wait").hide();
			}
		});
		return false;
	});
		
});

</script>

      

   
  <div align="center" style="padding-top:80px">
   <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> <font color="#333" size="+1">
    Administrar Correspondencia </font> <font color="#FF0000" size="+2"> ]</font> </span>
       
   <span class="variable2" style=" font-family:'Lucida Sans Unicode';text-align:center; font-size:10px;">Selecciona la acción a Realizar</span></div>
   <br /> 
   <div style="position:relative; display:block; z-index:10; padding-top:50px;  opacity: 1.0;" align="center" >
   <div style="width:auto; height:120px;   " align="center">
   <div style=" width:300px; height:100px; text-align:center;margin: 0 auto;" >
    
    <div style="width:125px; margin-right:50px; float:left;" >
   <span id="nuevo"> <a  href="nuevo_add_user.php"><img src="view/admin/img/64x64/document_add.png" width="64" height="64" border="0" /></a><br /><br />
   </span><div style="width:115px; height:40px;  background: #D41439; padding:5px;">
    <span id="nuevo"><a  href="nuevo_add_user.php" style="text-transform:uppercase; text-decoration:none; color:#fff; font-family:Arial;font-size:12px;	font-stretch:narrower; font-weight:bold;" >Agregar <br />Correspondencia</a> </span>
   </div></div>
     <div style="width:125px;  float:left; margin-right:0px;">
   <span id="editar"><a href="consulta_edit.php"><img src="view/admin/img/64x64/document_edit.png" width="64" height="64" border="0" /></a><br /><br />
   <div style="width:115px; height:40px;  background: #D41439; padding:5px;"><a  style="text-transform:uppercase; text-decoration:none; color:#fff; font-family:Arial;font-size:12px;	font-stretch:narrower; font-weight:bold;"href="users/consulta_user.php"  >Modificar <br />Correspondencia</a></div></span>
   </div>
    
    </div>
 </div>
   <br /> <br />
</div>