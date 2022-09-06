<template>
  <section class="list_houses">
    <h1>Ricerca avanzata</h1>
    <div class="container">
      <div class="row">
        <div class="card_house" v-for="item in house" :key="item" col-md-3 col-2>
          <h2>{{item.name}}</h2>
          <img :src="item.image" :alt="item.name">
          Prezzo a notte: {{item.price}},00 euro
        </div> 
      </div>
    </div>  
  </section>
</template>

<script>
export default {
    name: 'FilterPage',
    data() {
      return {
        house: this.$route.params.coordinates,
      }
    },
}
</script>

<style lang="scss">
.list_houses {
  .card_house {
    background-color: #bfd7ff;
    color: #495867;
    border-radius: 1.25rem;
    padding: 1.875rem;

    img {
      width: 6.25rem;
    }
  }
}
</style>