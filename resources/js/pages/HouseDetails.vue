<template>
  <div class="container">
    <div class="row">
        <h2>Pagina dettaglio casa {{house.name}}</h2>
    </div>
    <div class="row card_house justify-content-between">
        <div class="col-4">
            <img :src="house.image_path" :alt="house.name">
        </div>
        <div class="col-6 text-left">
            <address><strong>Indirizzo: </strong>{{house.address}}</address>
            <p>{{house.description}}</p>
            <div class="row my-3">
                <div class="col-3">
                    <div class="row text-center">
                        <div class="col-12">
                            <i class="fa-solid fa-toilet"></i>
                            <strong>bagni</strong>
                        </div>
                        <div class="col-12">
                            <div>{{house.number_bathrooms}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row text-center">
                        <div class="col-12">
                            <i class="fa-solid fa-bed"></i>
                            <strong>letti</strong>
                        </div>
                        <div class="col-12">{{house.number_beds}}</div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row text-center">
                        <div class="col-12">
                            <i class="fa-solid fa-door-open"> </i>
                            <strong>locali</strong>
                        </div>
                        <div class="col-12">
                            {{house.number_rooms}}
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row text-center">
                        <div class="col-12">
                            <i class="fa-solid fa-house"></i>
                            <strong>m<sup>2</sup></strong>
                        </div>
                        <div class="col-12">
                            {{house.square_meters}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'HouseDetails',
    data() {
        return {
            house: [],
        }
    },
    created() {
        axios.get( `/api/houses/details/${this.$route.params.id}`)
        .then(res => {
            this.house = res.data;
            console.log(this.house)
        })
    }
}
</script>

<style lang="scss" scoped>
    .card_house {
    background-color: #bfd7ff;
    color: #495867;
    border-radius: .625rem;
    padding: 1.25rem;
        img {
            width: 100%;
        }
    }
</style>
