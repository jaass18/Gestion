<?php
/*================================================================
If Your Information Is Dynamic, Use This Header To Clear any Cache
================================================================*/
//header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1


//Get variable Data
$q=$_GET["q"];
$chkinfo=@$_GET["chkinfo"] or exit("No Info Selected"); 

if(phpversion()>=5){
	/* =============================================
		Used This Code Only If You Are Using PHP 5++
	===============================================*/ 
	


	// Load Info Source From XML File
	$xmlDoc=new DOMDocument();
	$xmlDoc->load("myinfo.xml");

	//Get Info From Selection
	if(isset($chkinfo)){
		foreach($chkinfo as $key){
			$x=$xmlDoc->getElementsByTagName(strtoupper($key)); // Make Uppercase Data
			if($x->length){
				echo($x->item(0)->nodeValue."<br>");
			}
		}	
	}

}
else{

	/*=============================================
	Since My Hosting Server Doesn't Used PHP 5++,
	So I Decide To Create some Additional code 
	to support PHP 4 Version
	==============================================*/

/*
	if (!$xmlDoc = domxml_open_file("myinfo.xml")) {
	  echo "Error while parsing the document\n";
	  exit;
	}
	$root = $xmlDoc->document_element();
	if(isset($chkinfo)){
		foreach($chkinfo as $key){
			$x= $root->get_elements_by_tagname(strtoupper($key)); // Make Uppercase Data
			if(count($x)){
				echo $x[0]->get_content() . "<br>";
			}
		}
	}
*/
}


?>