<template>
    <div>
        <form @submit.prevent="submit">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    aria-describedby="emailHelp"
                    v-model="form.name"
                />
                <div id="emailHelp" class="form-text fw-bold text-danger">
                    {{ errors.name }}
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                    >Email address</label
                >
                <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    v-model="form.email"
                />
                <div id="emailHelp" class="form-text fw-bold text-danger">
                    {{ errors.email }}
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                    >Password</label
                >
                <input
                    type="password"
                    class="form-control"
                    id="exampleInputPassword1"
                    v-model="form.password"
                />
                <div id="emailHelp" class="form-text fw-bold text-danger">
                   {{ errors.password }}
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <Link href="/users" class="fw-bold text-decoration-none"
                    >Go back</Link
                >
            </div>
        </form>
    </div>
</template>

<script>
import Layout from "../Shared/layout.vue";
import { Link, useForm } from "@inertiajs/vue3";
export default {
    layout: Layout, // will take the template and put it in slot in the layout
    components: { Layout, Link },
    props : ['errors'], // to get the error property from the return object
    data: () => ({
        // useForm helper
        form: useForm({
            name: "",
            email: "",
            password: "",
        }),
    }),
    methods: {
        submit() {
            this.form.post("/users", this.form);
        },
    },
};
</script>

<style></style>
