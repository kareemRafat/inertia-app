<template>
    <Head :title="$page.component" />
    <header class="bg-secondary bg-opacity-25">
        <div class="container d-flex justify-content-between p-3">
            <div class="d-flex gap-4">
                <h1 class="fs-4 text-success align-self-center">My App</h1>
                <h1 class="fs-6 text-secondary align-self-center"> welcome {{ username }} !</h1>
            </div>
            <Nav />
        </div>
    </header>
    <div class="container mt-4">
        <slot />
    </div>
</template>

<script>
import { Head } from "@inertiajs/vue3";
import Nav from "./Nav.vue";

export default {
    components: { Nav, Head },
    computed : {
        username(){
            // get data from inertia object in initialPage <$page>
            return this.$page.props.auth.user.username
        }
    }
};
</script>

<style></style>
