const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: 'server.php',
      albumsList: []
    }
  },
  methods: {
    getAlbums() {
      axios.get(this.apiUrl)
      .then(results => {
        this.albumsList = results.data;
      })
    }

  },
  mounted() {
    this.getAlbums();
  }

}).mount('#app');