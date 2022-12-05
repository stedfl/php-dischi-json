const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: 'server.php',
      albumsList: [],
      isMoreInfo: false,
      infoAlbum: {}
    }
  },
  methods: {
    getAlbums() {
      axios.get(this.apiUrl)
      .then(results => {
        this.albumsList = results.data;
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
    }
  },
  mounted() {
    this.getAlbums();
  }

}).mount('#app');