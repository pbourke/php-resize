<?php
// Idea taken from http://www.php.net/manual/en/function.imagecopyresized.php docs
//
// Usage:
// http://localhost:8888/resize.php?u=http://localhost:8888/test.jpg&w=50&h=50
//
// Increase the memory limit so that large files can be processed. A ~5M image requires
// >30M of memory per script invocation
ini_set("memory_limit", "64M");

// Get the script arguments - source url and maximum dimensions of the scaled image
$src_url = $_GET['u'];
$max_width = $_GET['w'];
$max_height = $_GET['h'];
// Todo: accept expected content type

// Load the original image (most likely over the network) 
$src_image = imagecreatefromjpeg($src_url);

// Compute the width and height of the scaled image, preserving aspect ratio
$src_width = imagesx($src_image);
$src_height = imagesy($src_image);

// create a target for the scaled image
$scaled_image = imagecreatetruecolor($max_width, $max_height);

// Resize
imagecopyresized($scaled_image, $src_image, 0, 0, 0, 0, $max_width, $max_height, $src_width, $src_height);

// Output
// todo: output expected content type
header('Content-type: image/jpeg');
imagejpeg($scaled_image);
?>
