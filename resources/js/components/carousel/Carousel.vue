<template>
     <div class="app">
        <carousel-button>
            <carousel-slide v-for="slide in slides" :key="slide" class="carousel-slider">
                <img :src="slide" :alt="slide">
            </carousel-slide>
        </carousel-button>
    </div>    
</template>

<script>
import CarouselButton from './CarouselButton.vue';
import CarouselSlide from './CarouselSlide.vue';

export default {
    name:'Carousel',data(){
        return {
            slides: [
                'https://picsum.photos/id/230/600/300',
                'https://picsum.photos/id/231/600/300',
                'https://picsum.photos/id/232/600/300',
                'https://picsum.photos/id/233/600/300',
                'https://picsum.photos/id/234/600/300',
                'https://picsum.photos/id/235/600/300',
                'https://picsum.photos/id/236/600/300',
            ]
        }
    },
    components:{CarouselSlide, CarouselButton}
}
</script>

<style lang="scss" scoped>
    .app {
        display:flex;
        justify-content: center;
    }
</style>