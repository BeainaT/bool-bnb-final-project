<template>
     <div class="carousel_container">
        <carousel-button>
            <carousel-slide v-for="slide in slides" :key="slide" class="carousel-slider">
                <img :src="'/storage/'+slide" :alt="slide">
            </carousel-slide>
        </carousel-button>
    </div>    
</template>

<script>
import CarouselButton from './CarouselButton.vue';
import CarouselSlide from './CarouselSlide.vue';
import axios from 'axios';
export default {
    name:'Carousel',
    components:{CarouselSlide, CarouselButton},
    data(){
        return {
            slides: [
                // 'https://picsum.photos/id/230/600/300',
                // 'https://picsum.photos/id/231/600/300',
                // 'https://picsum.photos/id/232/600/300',
                // 'https://picsum.photos/id/233/600/300',
                // 'https://picsum.photos/id/234/600/300',
                // 'https://picsum.photos/id/235/600/300',
                // 'https://picsum.photos/id/236/600/300',
            ],
        }
    },
    created() {
        axios.get('/api/home')
        .then(res => {
            res.data.forEach(elm => {
                // this.slides.push(elm.image);
                this.slides.push(elm.image)
            })
            this.slides.splice(0, 9)
            console.log(this.slides)
            // console.log(this.slides)
        })
        .catch(e => {
            console.log(e)
        })
    }
}
</script>

<style lang="scss" scoped>
    .carousel_container {
        display:flex;
        justify-content: center;
        width: 100%;
    }
</style>