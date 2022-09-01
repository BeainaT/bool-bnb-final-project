<template>
  <div>
    <BaseMain/>
    <BaseFooter/>
  </div>
</template>

<script>
import BaseMain from '../components/macro/BaseMain.vue';
import BaseFooter from '../components/macro/BaseFooter.vue';
export default {
  name: 'App',
  components: {
    BaseMain,
    BaseFooter
  },
}
</script>

<style>
</style>