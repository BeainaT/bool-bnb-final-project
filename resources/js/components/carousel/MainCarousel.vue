<template>
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item"  v-for="(slide, id) in slides" :key="id" :class="{ active: id==0 }">
            <img class="d-block w-100" :src="slide" alt="First slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
</template>

<script>
    import axios from 'axios';
export default {
    name: 'MainCarousel',
    data(){
        return {
            slides: [],
            imgSlider: []
        }
    },
    created() {
        axios.get('api/houses')
            .then((res) => {
                this.imgSlider = res.data;
                this.imgSlider.forEach((elm) => {
                    this.slides.push(elm.image);
                    
                })
            }) 
    },
}
</script>

<style lang="scss" scoped>
    .carousel-inner {
        max-height: 37.5rem;
    }
    img {
        height: 37.5rem;
        width: 100%;
        object-fit: cover;
    }
</style>