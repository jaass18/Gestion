<?php //session_start(); 
 //header("Cache-control: private");
// include ("controller/conect/conexion.class.php");
 require('controller/class/agent.class.php');
 $objagent=new agent;
//$_SESSION['objagent'] = $objagent;
 //$db = DBManager::getInstance(); 
 if (isset($_POST["Usuario"], $_POST["Password"])) 
{
	//echo"entra";

$user=$_POST["Usuario"];
$pass=$_POST["Password"];

$aplicacion = $objagent->obtener_user($pass,$user);
//echo"entra aplicacion";
if (empty($aplicacion))
	{
	$actUs = 0;
	//echo"entra aplicacion";
		}
		else{
			//echo"entra aplicacion else";
			$actUs = 1;
			foreach($aplicacion as $apli)
			{
		  	if($apli->usuario == $user)
			{ $userl = $apli->usuario;
			if($apli->password == $pass)
				{  
				if($apli->t_usuario == 0)
				{
					$nivl="Super Administrador";
					}
				
				} 
			}}
		}
}
 setlocale(LC_TIME, "es_MX", "mex", "spanish-mexican", "esm"); 
?>
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>Bienvenido</h1>
				<h2>Backend</h2><br />	
                <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> <font color="#FFFFFF" >Sistema de Gesti&oacute;n </font> <font color="#FF0000" size="+2"> ]</font> </span>	
				<p class="grey"><br />Este sistema ha sido desarrollado con la finalidad optimizar las recepci&oacute;n de documentos.</p>
			</div>
			<div class="left">
            <?php 
			if($actUs == 1)
			{ 
			?>
			<h1>Usuario </h1>
            <span class="variabletit" style="color:#666666"> 
            <font color="#FF0000" size="+2">[ </font> 
            <font color="#FFFFFF" ><?php echo $userl;?> </font> 
            <font color="#FF0000" size="+2"> ]</font> </span>	
				<span class="grey"></br><?php echo $nivl;?></span>
			<?php
			}else{
			?>
			<form class="clearfix" action="index.php" method="post">
					<h1>Login</h1>
					<label class="grey" for="log">User Name:</label>
					<input class="field" type="text" name="Usuario" id="Usuario" value="Usuario" size="15" />
					<label class="grey" for="pwd">Password:</label>
					<input class="field" type="password" name="Password" id="Password" value="user"size="15" />
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
				</form>
              <?php 
			}
			?>  
			</div>
			<div class="left right">			
			<h2>Solo usuarios autorizados podran tener acceso al sistema.</h2><br /><br />
            Si no eres Usuario autorizado por favor ponte en contacto con el soporte técnico de 
            <a href="http://www.starktec.mx/">starktec tic consulting</a>
			</div>
		</div>
</div>
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li></li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">Log In | Usuarios</a>
				<a id="close" style="display: none;" class="close" href="#">Cerrar Panel</a>			
			</li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> 
</div> 
<div style="width:100%; height:94px; display:block; background:url(view/admin/img/bk_admin.jpg);">
<div style="width:1000px;margin: 0 auto; height:130px; padding-top:0px;"><br /><br />
<img src="view/admin/img/logo.png" width="173"  alt="e-indiga" />

<div style="float:right;  height:40px; margin-right:240px;  padding-top:5px;" align="right">
  <span class="variabletit" style="color:#666666"> <font color="#FF0000" size="+2">[ </font> <font color="#FFFFFF" size="+1">Sistema de Gesti&oacute;n</font> <font color="#FF0000" size="+2"> ]</font> </span>
<span style="color:#f2f2f2; text-transform:capitalize;" class="variable" ><?php echo mb_convert_encoding(strftime("%A %d de %B del %Y"), 'UTF-8');  ?> </span>
<?php
					if($userl)
					{
			echo'| <a href="logout.php" style="text-decoration:none; color:#FF0000" ><span class="variable" >Salir</span></a>';	
						}

?>

</div></div>

</div>
<!-- Contenedor -->

<div id="contenedor" align="left">
 <?php 
	if ($pass != NULL && $user != NULL) 
{
	//echo"entra";
	//echo"entra pass:".$pass;
	//echo"entra user:".$user;

//$sql="select * from user where user = '".$user."'";
//$db->setQuery($sql); 
//$aplicacion = $db->loadObjectList();
	if (empty($aplicacion))
	{//usuario no existe
			echo '<script language ="JavaScript" >alert("Lo sentimos no eres usuario autorizado.");</script>';
			echo '<meta http-equiv="refresh" content=".05;URL=./index.php"/>';
	}
	else
	{
		//echo "else";
		foreach($aplicacion as $apli)
		{  
		//echo "foreach";
			if($apli->usuario == $user)
			{
				//echo "nombre";
				$password=md5($password);
        		if($apli->password == $pass)
				{
				//	echo "pass";
				//correcto, redireccionar
				$_SESSION['usuario'] = $apli->usuario;
				$_SESSION['id_usuario'] = $apli->id_usuario;
				@setcookie("T_Usuario", $apli->t_usuario);
					if($apli->t_usuario==0)
					{
					include ('view/admin/mod_admin/men_sadmin.php');
					}else{
					include ('view/admin/mod_admin/men_user.php');	
						}
					 ?>
					<div id="formulario">
    				</div>
    				<div id="tabla" >
    				<?php  
					if($apli->t_usuario==0)
					{
					include ('view/admin/mod_admin/super.php'); 
                    }else{
                    
					include ('view/admin/mod_admin/user.php');
					}?>
    				</div>
    				<?php
					//echo '<meta http-equiv="refresh" content=".05;URL=./admin.php"/>';
					
				}
				else
				{//contraseña incorrecta
				echo '<script language ="JavaScript" >alert("Tu contraseña no es correcta.");</script>';
				echo '<meta http-equiv="refresh" content=".05;URL=./index.php?"/>';
				}
			}else{
				echo '<script language ="JavaScript" >alert("Tu usuario no es correcto.");</script>';
				}
		}
 }
 }else{
	 echo 'entrar else';
	 include ('view/default.php');
	  }
	 ?>
    
</div> 
    
<!-- FIN Contenedor -->