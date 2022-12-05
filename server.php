<?php
$albumsString = file_get_contents('dischi.json');
$albums = json_decode($albumsString, true);

header('Content-Type: application/json');
echo json_encode($albums);

?>