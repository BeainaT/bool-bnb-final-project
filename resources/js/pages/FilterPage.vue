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
            <p>Distanza (km)</p>
            <input class="input" type="number" placeholder="Distanza" v-model="radius" min="1">
          </div>
          <div class="col-md-2"> 
            <p>Stanze (n.)</p>
            <input class="input" type="number" placeholder="Numero" v-model="number_rooms" min="0">
          </div>
          <div class="col-md-2">
            <p>Persone (n.)</p>
            <input class="input" type="number" placeholder="Numero" v-model="number_beds" min="0">
          </div>
          <!-- /input type  -->
          <!-- button submit  -->
          <button class="col-md-1 btn submit" type="submit">Ricerca</button> 
          <!-- /button submit  -->
        </div>
        <div class="row justify-content-center">
            <div v-for="service in servicesAvailable" :key="service.id">
                <input type="checkbox" :id="service.name" :value="service.id" name="service" v-model="servicesFilter">
                <label :for="service.name">{{service.name}}</label>
            </div>
        </div>
          <!-- /dropdown menu  -->
      </div>
    </form>
    <div class="container house_list_filter">
      <div v-if="houses == false" class="not_find">
        <h5>Ci dispiace, nessun appartamento corrisponde con i filtri inseriti :(</h5> 
      </div>
      <div v-else class="row">
        <router-link v-for="house in houses" :key="house.id" class="col-lg-4 col-md-6 col-sm-12 card_house" :to="{name: 'house-details', params: {id: house.id}}">
          <div class="card_house_image">
            <img :src="house.image_path" :alt="house.name">
          </div>
          <div class="card_house_details">
            <h5>{{house.name}}</h5>
            <p>{{house.address}}</p>
            <p>{{house.price}} euro/notte</p>
          </div>
        </router-link>
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
      number_rooms: '0', //number of rooms filtered
      number_beds: '0', //number of beds filtered
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
      if(!this.address == '') {
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
            console.log(res.data, 'risposta finale');
            this.houses = res.data;
            console.log(this.houses, 'alberghi');
          })
          .catch(e => {
              console.log(e)
          })
        })
      } else {
        this.houses = false;
      }
      
    }
  }
}
</script>

<style lang="scss">
section.list_houses {
  form {
    .row {
      gap: .625rem;
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
      color:#f7f7ff;
      border-radius: 1.25rem;
      padding: .625rem;
      border: .3125rem solid white;
      text-decoration: none;

      &_image {
        width: 100%;
        height: 70%;

        img {
          width: 100%;
          height: 100%;
          border-radius: .625rem;
        }
      }

      &_details {
        text-align: left;
        padding-top: .625rem;
        p {
          margin: 0;
          color: #495867;
          padding: 0;
        }
        h5 {
          padding: 0;
          margin: 0;
        }
      }

    }
  }

  
}
</style>