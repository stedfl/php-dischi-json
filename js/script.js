const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: 'server.php',
      albumsList: [],
      genreList: [],
      isMoreInfo: false,
      infoAlbum: {},
      selectedGenre: ''
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
    }
  },
  mounted() {
    this.getAlbums();
  }

}).mount('#app');