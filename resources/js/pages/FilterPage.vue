<template>
  <div class="test">
    <h1>pagina filtri</h1>
  </div>
</template>

<script>
    import axios from 'axios';
export default {
    name: 'FilterPage',
    created() {
        axios.get('houses/show')
        .then(res => {
            console.log(res);
        })
    }
}
</script>

<style>

</style>