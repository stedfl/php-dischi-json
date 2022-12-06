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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add Album
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Album To List</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                  <div v-if="error" class="alert alert-danger" role="alert">
                    Fill in at least the Title and Author fields!
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" v-model.trim="newTitle" class="form-control" >
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Author</label>
                    <input type="text"v-model.trim="newAuthor" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Year</label>
                    <input type="number" v-model.trim="newYear" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Cover Album</label>
                    <input type="text" v-model.trim="newPoster" class="form-control" placeholder="Image Url">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Genre</label>
                    <select v-model="newGenre" class="form-select" aria-label="Default select example">
                      <option selected value="">Choose</option>
                      <option v-for="(genre, index) in genreList" :key="index" :value="genre">{{genre}}</option>
                    </select>
                  </div>
              </form>
              </div>
              <div class="modal-footer">
                <button @click="addNewAlbum()" type="button" class="btn btn-info">
                  <i class="fa-solid fa-plus"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
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