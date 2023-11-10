<template>
    <nav>
        <ul class="d-flex list-inline mb-0">
            <li>
                <NavLink comp="Home" href="/" />
            </li>
            <li>
                <NavLink comp="About" href="/about" />
            </li>
            <li>
                <NavLink comp="Users" href="/users" />
            </li>
            <li>
                <Link
                    class="btn text-primary btn-sm"
                    href="/logout"
                    method="post"
                    as="button"
                    :data="{ foo: 'baar' }"
                >
                    Logout</Link
                >
            </li>
        </ul>
    </nav>
</template>

<script>
import { Link } from "@inertiajs/vue3";
import NavLink from "./NavLink.vue";

export default {
    components: { Link, NavLink },
};
</script>
