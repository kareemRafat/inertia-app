<template>
    <div class="paginator mb-5 d-flex justify-content-end">
        <Link
            preserve-scroll
            class="p-2 bg-primary rounded-2 bg-opacity-10 m-1"
            v-for="link in links"
            :href=" link.url ?? '' "
            v-html="link.label"
            :class="{
                'text-opacity-25 text-dark': !link.url,
                'fw-bold': link.active,
            }"
        />
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";


export default {
    components : { Link } ,
    props : {
        links : Object
    }
}

</script>

<style></style>
