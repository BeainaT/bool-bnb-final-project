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
    padding: 1rem;

    input {
        background-color: #bfd7ff;
        color: #495867;
        border: .0625rem solid #788bff;
        border-radius: .3125rem;
        padding: .625rem;
    }

    input::placeholder {
        color: #495867;
    }

    .btn {
        background-color: #bfd7ff;
        color: #495867;
        border: .0625rem solid #788bff;
    }

    .btn:hover {
        color: #495867;
        background-color: #f7f7ff;
    }
  }
  </style>