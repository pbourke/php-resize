<?php
// File and new size
// $filename = 'test.jpg';
// $percent = 0.5;
//
// // Content type
ini_set("memory_limit", "64M");
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
