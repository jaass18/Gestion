<?php
if (!empty($_FILES)) {
	
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$file_name = $_FILES['Filedata']['name'];	
	
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	//$targetPathMin = $_SERVER['DOCUMENT_ROOT'] .'min'. '/';
	$targetFile =  str_replace('//','/',$targetPath) . $file_name;	
	$imagen =  $targetFile ;
    $nombre_imagen_asociada = 'thumb_'.$file_name;
	$nombre_imagen_f = 'full_'.$file_name;
   $dir_thumb = '../../../view/app/img/min/' ;
   $dir_norm = '../../../view/app/img/full/' ;

	
	$targetFile =  str_replace('//','/',$targetPath) . $file_name;	
	if (move_uploaded_file($tempFile,$targetFile)){
		redimensionar_imagen($imagen, $nombre_imagen_asociada,65,60,$dir_thumb);
		redimensionar_imagen($imagen, $nombre_imagen_f,320, 134,  $dir_norm);
		echo 'Tu archivo se subió correctamente '.$_POST['texto'];
	} else {
		echo 'Tu archivo falló';
	}
	
}

function redimensionar_imagen($imagen, $nombre_imagen_asociada,$nuevo_ancho,$nuevo_alto ,$directorio)
     {
       //indicamos el directorio donde se van a colgar las imágenes
        //$directorio = ‘imagenes/’ ;
       //establecemos los límites de ancho y alto
       //$nuevo_ancho = 100 ;
      // $nuevo_alto = 100 ;
 
       //Recojo información de la imágen
       $info_imagen = getimagesize($imagen);
       $alto = $info_imagen[1];
       $ancho = $info_imagen[0];
       $tipo_imagen = $info_imagen[2];
 
       //Determino las nuevas medidas en función de los límites
       if($ancho > $nuevo_ancho OR $alto > $nuevo_alto)
       {
         if(($alto - $nuevo_alto) > ($ancho - $nuevo_ancho))
         {
           $nuevo_ancho = round($ancho * $nuevo_alto / $alto,0) ;    
         }
         else
         {
           $nuevo_alto = round($alto * $nuevo_ancho / $ancho,0);  
         }
       }
       else //si la imagen es más pequeña que los límites la dejo igual.
       {
         $nuevo_alto = $alto;
         $nuevo_ancho = $ancho;
       }
 
       // dependiendo del tipo de imagen tengo que usar diferentes funciones
       switch ($tipo_imagen) {
         case 1: //si es gif …
           $imagen_nueva = imagecreate($nuevo_ancho, $nuevo_alto);
           $imagen_vieja = imagecreatefromgif($imagen);
           //cambio de tamaño…
           imagecopyresampled($imagen_nueva, $imagen_vieja, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
           if (!imagegif($imagen_nueva, $directorio . $nombre_imagen_asociada)) return false;
         break;
 
         case 2: //si es jpeg …
           $imagen_nueva = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
           $imagen_vieja = imagecreatefromjpeg($imagen);
           //cambio de tamaño…
           imagecopyresampled($imagen_nueva, $imagen_vieja, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
           if (!imagejpeg($imagen_nueva, $directorio . $nombre_imagen_asociada)) return false;
         break;
 
         case 3: //si es png …
           $imagen_nueva = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
           $imagen_vieja = imagecreatefrompng($imagen);
           //cambio de tamaño…
           imagecopyresampled($imagen_nueva, $imagen_vieja, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
           if (!imagepng($imagen_nueva, $directorio . $nombre_imagen_asociada)) return false;
 
         break;
       }
       return true; //si todo ha ido bien devuelve true
 
     }


?>