<?php //session_start();
header("Cache-control: private");
header("Cache-Control: no-store, no-cache, must-revalidate");
include_once ("../../controller/class/xml_controller.php");
$xml= new xmlController();
$sucursales = $xml->getSucursales();
header ("Content-Type:text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
?>
<geolocalizacion>
<ofertas>
		<?php
		if($sucursales){
			$sucN=0;
			while( $suc = mysql_fetch_array($sucursales)) {
		//foreach($sucursales  as $suc){
		 ?>

               
                 
				
				<?php
					$ofertas = $xml->getOfertas();
		 			if($ofertas){
						$b=0;
						//foreach($ofertas  as $ofer){
							while( $ofer = mysql_fetch_array($ofertas)) {
							
							$tempi = $ofer['id_sucursales'];
							$idsucur = explode(',',$tempi);
							//$var = $idsucur[$b];
							//echo "->".$var;
							foreach ($idsucur as $key => $item) {

							if( $item == $suc['idsucursal']){
								?>
                        <oferta imgthubmS="http://www.indiga.mx/proyectos/geolocalizacion/view/app/img/min/thumb_<?php echo $suc['img'];?>" imgfullS="http://www.indiga.mx/proyectos/geolocalizacion/view/app/img/full/full_<?php echo $suc['img'];?>" coorY="<?php echo $suc['coordenada_x'];?>" coorX="<?php echo $suc['coordenada_y'];?>" idofert="<?php echo $ofer['idoferta'];?>" idsucu="<?php echo $suc['idsucursal'];?>" imgthubm="http://www.indiga.mx/proyectos/geolocalizacion/view/app/img/app_ofertas/min/thumb_<?php echo $ofer['img'];?>" imgfull="http://www.indiga.mx/proyectos/geolocalizacion/view/app/img/app_ofertas/full/full_<?php echo $ofer['img'];?>">
                                     <nombre_product><![CDATA[<?php echo $ofer['nom_product'];?>]]></nombre_product>
                                     <descrip><![CDATA[<?php echo $ofer['descrip'];?>]]></descrip>
									 <nombre_suc><![CDATA[<?php echo $suc['nombre'];?>]]></nombre_suc>
                					 <razon><![CDATA[<?php echo $suc['razon_s'];?>]]></razon>
                  					 <direccion><![CDATA[<?php echo $suc['direccion'];?>]]></direccion>
                					 <zona><![CDATA[<?php echo $suc['zona'];?>]]></zona>
                                     <sucN><![CDATA[<?php echo $sucN;?>]]></sucN>
                                     <nombre_suc><![CDATA[<?php echo $suc['nombre'];?>]]></nombre_suc>
                                </oferta>
                       
                       <?php }
								}$b++;
								
								//echo $b;
							}
						}
						 ?>
                          
            
        
            <?php
		$sucN++;}
		
		}
		 ?>
         </ofertas>
</geolocalizacion>