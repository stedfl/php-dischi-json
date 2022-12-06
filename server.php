<?php

$albumsString = file_get_contents('dischi.json');
$albums = json_decode($albumsString, true);

if(isset($_POST['diskIndex'])) {
  $albums = $albums[$_POST['diskIndex']];
};

if(isset($_POST['selectedGenre'])) {
  if(!empty($_POST['selectedGenre'])) {
    $albums = array_filter($albums, function($album) {
      return $album['genre'] === $_POST['selectedGenre'];
    });
  } else {
    $albums = $albums;
  }
};

if(isset($_POST['title']) && isset($_POST['author'])
  && isset($_POST['year']) && isset($_POST['poster']) && isset($_POST['genre'])) {
  $newAlbum = [
    'title' => ucwords($_POST['title']),
    'author' => ucwords($_POST['author']),
    'year' => empty($_POST['year']) ? null : (int)$_POST['year'] ,
    'poster' => $_POST['poster'],
    'genre' => $_POST['genre']
  ];
  $albums[] = $newAlbum;
  file_put_contents('dischi.json', json_encode($albums));
};

header('Content-Type: application/json');
echo json_encode($albums);

?>