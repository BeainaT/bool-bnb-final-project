<template>
    <router-view>
        <div class="main_content">
            <h1>Benvenuti su 4BnB</h1>
            <carousel/>
        </div>
        <button class="btn btn-primary">try router</button>
        <router-link :to="{ name: 'search' }">try router</router-link>
    </router-view>
</template>

<script>
import Carousel from "../carousel/Carousel.vue"
export default {
    name: 'BaseMain',
    components:{Carousel}
}
</script>

<style lang="scss" scoped>
    .main_content {
        width: 100%;
        text-align: center;
    }
</style>