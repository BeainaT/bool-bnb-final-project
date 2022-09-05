<template>
    <div class="main_content">
        <h1>Benvenuti su 4BnB</h1>
        <carousel/>
        <SearchForm/>
        <FilterPage/>
    </div>
</template>

<script>
import Carousel from "../carousel/Carousel.vue";
import SearchForm from '../search/SearchForm.vue';
import FilterPage from '../macro/FilterPage.vue';
export default {
    name: 'BaseMain',
    components:{Carousel, SearchForm, FilterPage}
}
</script>

<style lang="scss" scoped>
    .main_content {
        width: 100%;
        text-align: center;
    }
</style>