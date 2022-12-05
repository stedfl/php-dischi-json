const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: 'server.php',
      albumsList: [],
      genreList: [],
      isMoreInfo: false,
      infoAlbum: {},
      selectedGenre: '',
      newTitle:'',
      newAuthor:'',
      newYear: null,
      newGenre:'',
      newPoster: ''
    }
  },
  methods: {
    getAlbums() {
      axios.get(this.apiUrl)
      .then(results => {
        this.albumsList = results.data;
        this.getGenreList();
      })
    },
    getMoreInfo(index) {
      const data = new FormData();
      data.append('diskIndex',index);

      axios.post(this.apiUrl, data)
      .then(results => {
        this.infoAlbum = results.data;
        this.isMoreInfo = true;
      })
    },
    getGenreList() {
      this.albumsList.forEach(album => {
        if(!this.genreList.includes(album.genre)) {
          this.genreList.push(album.genre);
        }
      });
    },
    getAlbumsByGenre() {
      const data = new FormData();
      data.append('genre', this.selectedGenre);
      axios.post(this.apiUrl, data)
      .then(results => {
        this.albumsList = results.data;
      })
    },
    addNewAlbum() {
      if(this.newTitle !== '') {
        const data = {
          title: this.newTitle,
          author: this.newAuthor,
          year: this.newYear,
          poster: this.newPoster,
          genre: this.newGenre
        };
        axios.post(this.apiUrl, data, 
          {
            headers: { 'Content-Type' : 'multipart/form-data'}
        })
        .then( results => {
          this.resetAllInput();
          this.albumsList = results.data;
        })
      }
    },
    resetAllInput() {
      this.newTitle = '',
      this.newAuthor = '',
      this.newYear = null,
      this.newGenre = '',
      this.newPoster = ''
    }
  },
  mounted() {
    this.getAlbums();
  }

}).mount('#app');