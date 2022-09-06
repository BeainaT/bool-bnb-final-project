<template>
  <section class="list_houses">
    <form @submit.prevent="filtersearch()" method="post">
      <input type="text" placeholder="Dove vuoi soggiornare?" v-model="address">
      <input type="number" placeholder="Inserisci il raggio" v-model="radius" min="1">
      <input type="number" placeholder="Numero stanza" v-model="radius" min="1">
      <input type="number" placeholder="Posti letto" v-model="radius" min="1">
      <button class="btn" type="submit">Ricerca per filtri</button>
    </form>
    <h1>Lista ricerca</h1>
    <div class="container">
      <div class="row">
        <div v-for="house in houses" :key="house.id" class="card_house col-md-4 col-2">
          <ul>
            <li>
              <h2>{{house.name}}</h2>
            </li>
            <li>
              <img :src="house.image" :alt="house.name">
            </li>
            <li>
              {{house.address}}
            </li>
          </ul>
          <router-link :to="{name: 'house-details', params: {id: house.id}}">Dettaglio</router-link>
          <!-- <a href="/details">vai al dettaglio</a> -->
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
    name: 'FilterPage',
    data() {
      return {
        coordinates: [],
        address: '',
        radius: '',
        houses: [], //all houses values
        filtered: [], //houses coordinates
        tomTomCall: [], // tom tom parameters for address
        position: [], // tom tom coordinates for address
      }
    },
    created() {
      this.address = this.$route.params.place;
      axios.get(`https://api.tomtom.com/search/2/geocode/${this.address}.json?storeResult=false&view=Unified&key=oHGOEFAGV4iX7o3LHt7UGHGyvzr9hH1N`)
      .then((res) => {
          this.tomTomCall = res.data.results[0];
          this.position = this.tomTomCall.position
          console.log(this.position, 'coordinate')

          axios.post('api/houses/show',  {
          coordinates: this.position })
          .then((res) => {
              this.houses = res.data;
              console.log(this.houses, 'risultato finale')
          })
          .catch(e => {
              console.log(e)
          })
      })
    },
    methods: {
      filtersearch() {
        axios.get(`https://api.tomtom.com/search/2/geocode/${this.address}.json?storeResult=false&view=Unified&key=oHGOEFAGV4iX7o3LHt7UGHGyvzr9hH1N`)
        .then((res) => {
          this.tomTomCall = res.data.results[0];
          this.position = this.tomTomCall.position
          console.log(this.position, 'coordinate')

          axios.post('api/houses/show',  {
          coordinates: this.position })
          .then((res) => {
              this.houses = res.data;
              console.log(this.houses, 'risultato finale')
          })
          .catch(e => {
              console.log(e)
          })
        })
      }
    }
}
</script>

<style lang="scss">
section.list_houses {
    input {
      background-color: #bfd7ff;
      color: #495867;
      border: .0625rem solid #788bff;
      border-radius: .3125rem;
      padding: .625rem;
    }

    input::placeholder {
        color: #495867;
    }
  .card_house {
    background-color: #bfd7ff;
    color: #495867;
    border-radius: .625rem;
    padding: 1.25rem;

    ul {
      list-style: none;
    }

    img {
      width: 100%;
    }
  }
}
</style>