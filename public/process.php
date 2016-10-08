<?php
require '../vendor/autoload.php';
require '../lib/converter.php';

if (!$_FILES['video'] || !$_POST['imageURL']) {
    die('You either don\'t have HTML5 validation for some reason 
    or feel accomplished for being able to use the developer console.');
}
$getID3 = new getID3();
$videoAnalyzed = $getID3->analyze($_FILES['video']['tmp_name']);
$xResolution = $videoAnalyzed['video']['resolution_x'];
$yResolution = $videoAnalyzed['video']['resolution_y'];
$tmpDir = tempnam(sys_get_temp_dir(), 'images');
if (file_exists($tmpDir)) {
    unlink($tmpDir);
}
mkdir($tmpDir);
move_uploaded_file($_FILES['video']['tmp_name'], $tmpDir . '/input');
createIntroVideo($_POST['top'], $_POST['middle'], $_POST['bottom'], $_POST['imageURL'], $xResolution, $yResolution, $tmpDir);