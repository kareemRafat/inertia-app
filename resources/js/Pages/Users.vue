<template>
    <h1 class="text-danger fw-bold">Users</h1>
    <!-- users table -->
    <table class="mt-4 table table-hover table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>created at</th>
                <th>Controls</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users.data">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.created_at }}</td>
                <td>
                    <Link
                        onclick="if (!confirm('warning deletion')) return false"
                        class="btn btn-danger btn-sm"
                        href="/delete"
                        method="delete"
                        as="button"
                        :data="{ id: user.id }"
                        preserve-scroll
                        >Delete</Link
                    >
                </td>
            </tr>
        </tbody>
    </table>

    <!-- paginator -->
    <Paginator :links="users.links" />
</template>

<script>
import { Link } from "@inertiajs/vue3";
import Layout from "../Shared/layout.vue";
import Paginator from "../Shared/Paginator.vue";

export default {
    layout: Layout, // make the layout is the parent component
    props: ["users"],
    components: { Layout, Link, Paginator },
    data() {
        return {
            username: "kareem",
        };
    },
};
</script>

<style></style>
