<template>
  <section class="list_houses">
    <form @submit.prevent="filtersearch()" method="post">
      <div class="container">
        <div class="row">
          <!-- input type  -->
          <div class="col">
            <p>Località</p>
            <input class="input" type="text" placeholder="Dove" v-model="address">
          </div>
          <div class="col-md-2">
            <p>Raggio</p>
            <input class="input" type="number" placeholder="Distanza" v-model="radius" min="1">
          </div>
          <div class="col-md-2"> 
            <p>Stanze</p>
            <input class="input" type="number" placeholder="Numero" v-model="number_rooms" min="1">
          </div>
          <div class="col-md-2">
            <p>Letti</p>
            <input class="input" type="number" placeholder="Numero" v-model="number_beds" min="1">
          </div>
          <!-- /input type  -->
          <!-- button submit  -->
          <button class="col-md-1 btn submit" type="submit">Ricerca</button> 
          <!-- /button submit  -->
        </div>
        <div class="row justify-content-center">
            <div v-for="service in servicesAvailable" :key="service">
                <input type="checkbox" :id="service.name" :value="service.id" name="service" v-model="servicesFilter">
                <label :for="service.name">{{service.name}}</label>
            </div>
        </div>
          <!-- /dropdown menu  -->
        </div>
      </div>
    </form>
    <div class="container house_list_filter">
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
      servicesAvailable: '',
      address: '', //address filtered
      radius: '20', //radius filtered
      number_rooms: '', //number of rooms filtered
      number_beds: '', //number of beds filtered
      servicesFilter: [], //all services choose by user
      houses: [], //all houses from controller api
      position: [], // tom tom coordinates for input address address
    }
  },
  created() {
    //api to obtain services and populate checkbox in form
    axios.get('api/services')
    .then((res) => {
      this.servicesAvailable = res.data;
      console.log(res.data, 'services');
    })
    .catch(e => {
      console.log(e);
    })
    //api to get user's input coordinates
    this.address = this.$route.params.place;
    axios.get(`https://api.tomtom.com/search/2/geocode/${this.address}.json?storeResult=false&view=Unified&key=oHGOEFAGV4iX7o3LHt7UGHGyvzr9hH1N`)
    .then((res) => {
        this.position = res.data.results[0];
        this.position = this.position.position;

        //api to get houses filtered
        axios.post('api/houses/show', {
          coordinates: this.position, 
          distance: this.radius, 
          rooms: this.number_rooms, 
          beds: this.number_beds,
          services: this.servicesFilter
        })
        .then((res) => {
            this.houses = res.data;
            console.log(this.houses, 'filtered houses');
        })
        .catch(e => {
            console.log(e);
        })
    })
  },
  methods: {
    filtersearch() {
      axios.get(`https://api.tomtom.com/search/2/geocode/${this.address}.json?storeResult=false&view=Unified&key=oHGOEFAGV4iX7o3LHt7UGHGyvzr9hH1N`)
      .then((res) => {
        this.position = res.data.results[0];
        this.position = this.position.position

        axios.post('api/houses/show',  {
          coordinates: this.position, 
          distance: this.radius, 
          rooms: this.number_rooms, 
          beds: this.number_beds ,
          services: this.servicesFilter
        })
        .then((res) => {
          console.log(res.data);
            this.houses = res.data;
            console.log(res.data)
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
  form {
    .row {
      gap: .625rem;
      align-items: end;
    }
    .input {
      background-color: #bfd7ff;
      color: #495867;
      border: .0625rem solid #bfd7ff;
      border-radius: .3125rem;
      padding: .625rem;
      width: 100%;
    }

    .input::placeholder {
        color: #f7f7ff;
    }

    .btn {
      background-color: #9bb1ff;
      color: #f7f7ff;
      border: .0625rem solid #9bb1ff;
      display: flex;
      align-items: center;
    }

    .btn.submit {
      align-self: stretch;
      display: flex;
      justify-content: center;
    }

    .btn:hover {
      color: #495867;
      background-color: #f7f7ff;
      border: .0625rem solid #f7f7ff;

    }
    .dropdown-toggle {
      color: #f7f7ff;
      .container {
        .row {
        justify-content: center;
        align-items: center;

        }
      }
    }
  }
  .house_list_filter {
    padding: 1.25rem;

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

  
}
</style>