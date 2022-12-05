<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
  <script src='https://unpkg.com/vue@3'></script>
  <title>Spotify - Dischi</title>
</head>
<body>
  <div id="app">
    <header>
      <div class="container h-100 d-flex align-items-center">
        <img src="img/logo.svg" alt="logo">
      </div>
    </header>
    <main class="py-5">
      <div class="container ">
        <div class="row row-cols-3">
          <div v-for="(album, index) in albumsList" :key="index" class="col px-5">
            <div class="card mb-5 text-center p-5">
              <img class="cover" :src="album.poster" :alt="album.title">
              <h2 class="album mt-3">{{album.title}}</h2>
              <h3 class="artist">{{album.author}}</h3>
              <h4 class="publication-year">{{album.year}}</h4>
            </div>
          </div>
        </div>
      </div>
    </main>
  
  </div>
  <script src="js/script.js"></script>
</body>
</html>