<template>
    <div class="main_content">
        <SearchForm/>
        <h1>Benvenuti su 4BnB</h1>
        <MainCarousel/>
        <FilterPage/>
    </div>
</template>

<script>
import MainCarousel from "../carousel/MainCarousel.vue";
import SearchForm from '../search/SearchForm.vue';
import FilterPage from '../macro/FilterPage.vue';
export default {
    name: 'BaseMain',
    components:{MainCarousel, SearchForm, FilterPage}
}
</script>

<style lang="scss" scoped>
    .main_content {
        width: 100%;
        text-align: center;
    }
</style>