<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
  <script src='https://unpkg.com/vue@3'></script>
  <title>Spotify - Dischi</title>
</head>
<body>
  <div id="app">
    <header>
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <img src="img/logo.svg" alt="logo">
        <select @change="getAlbumsByGenre()" v-model="selectedGenre" class="form-select" aria-label="Default select example">
          <option selected value="">All Genres</option>
          <option v-for="(genre, index) in genreList" :key="index" :value="genre">{{genre}}</option>
        </select>
      </div>
    
    </header>
    <main class="py-5">
      <div class="container ">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
          <div v-for="(album, index) in albumsList" :key="index" class="col px-5">
            <div @click="getMoreInfo(index)" class="card mb-5 text-center p-5">
              <img class="cover" :src="album.poster" :alt="album.title">
              <h2 class="album mt-3">{{album.title}}</h2>
              <h3 class="artist">{{album.author}}</h3>
              <h4 class="publication-year">{{album.year}}</h4>
            </div>
          </div>
        </div>
  
      </div>
      <div v-if="isMoreInfo" class="info-album p-5 text-center rounded rounded-3">
        <div class="text-end mb-3">
          <i @click="isMoreInfo=false" class="fa-solid fa-xmark icon"></i>
        </div>
        <img :src="infoAlbum.poster" :alt="infoAlbum.title">
        <ul class="mt-4">
          <li class="mt-2">Title: "{{infoAlbum.title}}"</li>
          <li class="mt-2">Author: "{{infoAlbum.author}}"</li>
          <li class="mt-2">Year: "{{infoAlbum.year}}"</li>
          <li class="mt-2">Genre: "{{infoAlbum.genre}}"</li>
        </ul>
      </div>
    </main>
  
  </div>
  <script src="js/script.js"></script>
</body>
</html>