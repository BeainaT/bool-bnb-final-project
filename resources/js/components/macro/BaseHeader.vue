<template>
    <header class="header">
        <div class="logo">
            4BnB
        </div>
        <div class="user_login">
            <a href="/login">Accedi</a>
            <a href="/register">Registrati</a>
        </div>
    </header>
</template>

<script>
export default {
    name: 'BaseHeader',
}
</script>

<style lang="scss">
.header {
    display: flex;
    background-color: black;
    height: 60px;
    justify-content: space-between;
    align-items: center;
    padding: .625rem 1.25rem;
    font-size: 1.75rem;
    text-transform: uppercase;
    color: white;

    a {
        text-decoration: none;
        color: inherit;
    }
}
</style>
