<?php

include '../funcs.php';

$name          = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$document_type = filter_var($_POST['document_type'], FILTER_SANITIZE_STRING);
$documentt     = filter_var($_POST['documentt'], FILTER_SANITIZE_STRING);
$direction     = filter_var($_POST['direction'], FILTER_SANITIZE_STRING);
$birthday      = filter_var($_POST['birthday'], FILTER_SANITIZE_STRING);


if (empty($name) || empty($document_type) || empty($documentt) || empty($direction) || empty($birthday)) {
	$errors[] = "Todos los campos son obligatorios";
}

if (!is_numeric($documentt)) {
	$errors[] = "El documento debe ser numérico";
}

$key = generate_string("abcdefgh12345678", 8);

if (count($errors) === 0)
{
	$file = fopen($dir, "a");
	
	if(fwrite($file, "{$key}|{$name}|{$document_type}|{$documentt}|{$direction}|{$birthday}" . PHP_EOL)){
		$success[] = "Registrado correctamente.";
	}

	fclose($file);
}

echo success($success);
echo errors($errors);
