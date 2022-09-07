<template>
    <div class="search_bar">
        <input type="text" name="address" id="address" placeholder="Dove vuoi soggiornare?" v-model="address">
        <router-link class="btn" :to="{name: 'FilterPage', params: {place: address}}">Ricerca</router-link>
    </div>
</template>
  
<script>
export default {
    name: 'SearchForm',
    data() {
        return {
        address: '',
        }
    },
  }
  </script>
  
  <style lang="scss">
  .search_bar {
    display: flex;
    gap: .625rem;
    justify-content: center;
    align-items: stretch;
    padding-bottom: .5rem;

    input {
        background-color: #bfd7ff;
        color: #495867;
        border: .0625rem solid #bfd7ff;
        border-radius: .3125rem;
        padding: .625rem;
    }

    input::placeholder {
        color: #f7f7ff;
    }

    .btn {
        background-color: #9bb1ff;
        color: #f7f7ff;
        border: .0625rem solid #9bb1ff;
        display: flex;
        align-items: center;
    }

    .btn:hover {
        color: #495867;
        background-color: #f7f7ff;
        border: .0625rem solid #f7f7ff;

    }
  }
  </style>