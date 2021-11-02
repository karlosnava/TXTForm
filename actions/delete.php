<?php

require '../funcs.php';

$key = filter_var($_POST['key'], FILTER_SANITIZE_STRING);

$contents = file_get_contents($dir);
$new_contents= "";

if( strpos($contents, $key) !== false) {
	$contents_array = preg_split("/\\r\\n|\\r|\\n/", $contents);

  foreach ($contents_array as $record) {
    if (strpos($record, $key) !== false) {
    	// ENCONTRADO
    }else{
      $new_contents .= $record . "\r\n";
    }
  }

  file_put_contents($dir, $new_contents);

  $fichero=file($dir);
	for($i=0; $i<1; $i++){
	  array_pop($fichero);
	}
	$fichero=implode("",$fichero);
	$f = fopen($dir,"w");
	fwrite($f,$fichero);

  echo success("Registro eliminado.");
}
else{
	echo error("La llave ". $key ." no existe.");
}
