<template>
  <div class="test">
    <h1>pagina filtri</h1>
    <ul>
      <li>
        {{house}}
      </li>
    </ul>
  </div>
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

<style>

</style>