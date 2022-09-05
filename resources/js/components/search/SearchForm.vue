<template>
  <form @submit.prevent="searchAddress()" method="post">
    <label>Indirizzo</label>
    <input type="text" name="address" id="address" placeholder="Inserisci il luogo in cui vorresti soggiornare" v-model="address">
    <button type="submit">Cerca</button>
  </form>
</template>

<script>
    import axios from 'axios';
export default {
    name: 'SearchForm',
    data() {
        return {
            coordinates: {},
            address: '',
            houses: [], //all houses values
            filtered: [], //houses coordinates
            tomTomCall: [], // tom tom parameters for address
            ttCoordinates: [], // tom tom coordinates for address
        }
    },
    created() {
        axios.get('api/houses')
            .then((res) => {
                this.houses = res.data;
                this.houses.forEach((elm) =>{
                    this.coordinates['latitude'] = elm.latitude;
                    this.coordinates['longitude'] = elm.longitude;
                    this.filtered.push(this.coordinates);
                    this.coordinates = {};
                })
            })
        },
        methods: {
            searchAddress() {
                axios.get(`https://api.tomtom.com/search/2/geocode/${this.address}.json?storeResult=false&view=Unified&key=oHGOEFAGV4iX7o3LHt7UGHGyvzr9hH1N`)
                .then((res) => {
                    console.log(res.data.results, 'tom tom')
                    this.tomTomCall = res.data.results;
                    this.tomTomCall.forEach((elm) => {
                        this.ttCoordinates.push(elm.position);
                    })
                axios.post('api/houses/show',  {
                    coordinates: this.ttCoordinates })
                    .then((res) => {
                        console.log(res)
                        this.address = '';
                    })
                    console.log(this.ttCoordinates, 'test')
                })
                .catch(e => {
                    console.log(e)
                })
            }, 
    },


}
</script>

<style>

</style>