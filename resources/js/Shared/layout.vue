<template>
    <header class="bg-secondary bg-opacity-25">
        <div class="container d-flex justify-content-between p-3">
            <h1 class="fs-4 text-success">kareem</h1>
            <Nav />
        </div>
    </header>
    <div class="container mt-4">
        <slot />
    </div>
</template>

<script>
import Nav from "./Nav.vue";

export default {
    components: { Nav },
};
</script>

<style></style>
