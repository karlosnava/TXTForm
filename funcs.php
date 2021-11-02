<?php

$dir = "../data.txt";

$errors = [];
$success = [];

function errors($errors)
{
	foreach ($errors as $error) {
		return "<div class='text-red'>{$error}</div>";
	}
}

function success($success)
{
	foreach ($success as $succes) {
		return "<div style='color:green'>{$succes}</div>";
	}
}

function generate_string($input, $strength = 100) {
	$input_length = strlen($input);
	$random_string = '';
	
	for($i = 0; $i < $strength; $i++) {
		$random_character = $input[mt_rand(0, $input_length - 1)];
		$random_string .= $random_character;
	}

	return $random_string;
}
