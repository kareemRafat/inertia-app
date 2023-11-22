<template>
    <div class="row align-items-center justify-content-between">
        <div class="col-6 d-flex align-items-center">
            <h1 class="text-danger fw-bold">Users</h1>
            <Link href="/create" class="btn text-primary fw-bold ms-2">Add user</Link>
        </div>
        <div class="col-4">
            <input
                v-model="search"
                placeholder="search..."
                type="email"
                class="form-control"
            />
        </div>
    </div>
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
    props: ["users" , "searchFilter"],
    components: { Layout, Link, Paginator },
    data() {
        return {
            // take the data from search in laravel
            search: this.searchFilter,
        };
    },
    watch: {
        // watch any change is search property
        search(newSearch, oldSearch) {
            // to send get request with querey string parameter
            this.$inertia.get(
                "/users",
                { search: newSearch },
                { preserveState: true , replace : true}
                //replace (for no history records) option video : min : 1:52
            );
        },
    },
};
</script>

<style></style>
