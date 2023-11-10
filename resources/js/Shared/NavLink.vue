<template>
    <Link
        class="btn text-priamry btn-sm"
        :class="{ 'fw-bold text-primary text-decoration-underline': $page.component == comp }"
        >{{ comp }}</Link
    >
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    props : ['comp'],
    components: { Link },
};

</script>

<style></style>
