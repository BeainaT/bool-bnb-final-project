<template>
  <form @submit.prevent="searchAddress()">
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
            coordinates: {
                latitude: 0,
                longitude: 0
            },
            address: '',
        }
    },
    methods: {
        searchAddress() {
            axios.get(`https://api.tomtom.com/search/2/geocode/${this.address}.json?storeResult=false&view=Unified&key=oHGOEFAGV4iX7o3LHt7UGHGyvzr9hH1N`)
                .then(res => {
                    res.data.results.forEach(elm => {
                        this.coordinates.latitude = elm.position.lat;
                        this.coordinates.longitude = elm.position.lon;
                        this.address = '';
                    })
                    console.log(this.coordinates)
                })
                .catch(e => {
                    console.log(e)
                })
        }
    },


}
</script>

<style>

</style>