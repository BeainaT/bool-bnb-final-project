<template>
    <div class="home">
        <h1>Benvenuti su 4BnB</h1>
        <SearchForm/>
        <MainCarousel/>
    </div>
</template>

<script>
import MainCarousel from '../components/carousel/MainCarousel.vue'
import SearchForm from '../components/search/SearchForm.vue'

export default {
  components: { MainCarousel, SearchForm },
    name: 'Home'
}
</script>

<style lang="scss">
.home {
    width: 100%;
    text-align: center;
}
</style>