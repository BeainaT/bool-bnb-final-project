<template>
  <div class="container">
    <div class="row">
        <h2>Pagina dettaglio casa {{house.name}}</h2>
    </div>
    <div class="row card_house justify-content-between">
        <div class="col-lg-4 col-md-6 col-sm-10">
            <img :src="house.image_path" :alt="house.name">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 text-left">
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
            <div><strong>Prezzo: </strong>{{house.price}} ???/notte</div>
        </div>
    </div>
    <div class="container_bottom d-flex flex-wrap py-2 justify-content-around">
        <form class="col-lg-6 col-sm-8 mb-2" @submit.prevent="sendMsg()">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome</label>
                <input type="text" class="form-control" placeholder="Inserisci il tuo nome" v-model="msgData.name" name="sender_name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">E-mail</label>
                <input type="email" class="form-control" placeholder="name@example.com" v-model="msgData.email" name="sender_email">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Inserisci il messaggio</label>
                <textarea class="form-control" rows="4" v-model="msgData.message" name="text"></textarea>
            </div>
            <button class="btn btn_send" type="submit">Contatta l'host</button>
            <div class="text-success py-2" v-if="msgSent">Il messaggio ?? stato inviato all'host</div>
        </form>
        <div id="map-div" class="col-lg-6 col-sm-10" style="width:100%; height:400px; overflow: hidden;">
            <div id="map" style="width:100%; height:400px;"></div>
        </div>
    </div>
  </div>
</template>

<script>
    import axios from 'axios';
    import tt from '@tomtom-international/web-sdk-maps';
    import 'mapbox-gl/dist/mapbox-gl.css';

export default {
    name: 'HouseDetails',
    data() {
        return {
            house: [],
            msgData: {
                name: '',
                email: '',
                message: ''
            },
            messages: {},
            msgSent: false,
        }
    },
    created() {
        axios.get( `/api/houses/details/${this.$route.params.id}`)
        .then(res => {
            this.house = res.data;
            this.mapCreate(this.house);
        });
    },
    methods: {
        sendMsg() {
            axios.post(`/api/messages/${this.$route.params.id}`, this.msgData)
                .then((res) => {
                    this.messages = res.data;
                    this.msgData.name = '';
                    this.msgData.email = '';
                    this.msgData.message = '';
                    this.msgSent = true;
                })
        },
        mapCreate(house) {
            document.getElementById('map').innerHTML = '';
            const map = tt.map({
            key: 'Gtj5RKWvcq5LP9DUEi2JeewGgSDNceEA',
            container: 'map',
            center: [house.longitude, house.latitude],
            zoom: 15,
        });
        new tt.Marker()
        .setLngLat([house.longitude, house.latitude])
        .addTo(map);
        },
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
    .btn_send {
        background-color: #fe5f55;
    }
</style>
