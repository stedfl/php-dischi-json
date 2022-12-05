<?php

$albumsString = file_get_contents('dischi.json');
$albums = json_decode($albumsString, true);

if(isset($_POST['diskIndex'])) {
  $albums = $albums[$_POST['diskIndex']];
}

header('Content-Type: application/json');
echo json_encode($albums);

?>