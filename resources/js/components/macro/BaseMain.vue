<template>
    <div class="main_content">
        <h1>Benvenuti su 4BnB</h1>
        <carousel/>
        <SearchForm/>
    </div>
</template>

<script>
import Carousel from "../carousel/Carousel.vue";
import SearchForm from '../search/SearchForm.vue';
export default {
    name: 'BaseMain',
    components:{Carousel, SearchForm}
}
</script>

<style lang="scss" scoped>
    .main_content {
        width: 100%;
        text-align: center;
    }
</style>