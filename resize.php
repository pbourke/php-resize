<?php
// Idea taken from http://www.php.net/manual/en/function.imagecopyresized.php docs
//
// Usage:
// http://localhost:8888/resize.php?u=http://localhost:8888/test.jpg&w=50&h=50
//
// Increase the memory limit so that large files can be processed. A ~5M image requires
// >30M of memory per script invocation
ini_set("memory_limit", "64M");
// // Content type
header('Content-type: image/jpeg');
//
// // Get new sizes
$width = $_GET['w'];
$height = $_GET['h'];
$filename = $_GET['u'];
//
// // Load
$thumb = imagecreatetruecolor($width, $height);
$source = imagecreatefromjpeg($filename);
//
// // Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $width, $height, imagesx($source), imagesy($source));
//
// // Output
imagejpeg($thumb);
?>
