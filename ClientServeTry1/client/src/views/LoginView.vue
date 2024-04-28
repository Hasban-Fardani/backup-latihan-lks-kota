<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useUser } from '@/stores/user';


const user = useUser()
const formData = ref({
    email: "",
    password: ""
})

const submit = async () => {
    await user.login(formData.value.email, formData.value.password).then((res) => {
        console.log("Login success", res)
    })
}
</script>
<template>
    <div class="container-fluid vh-100 d-flex flex-column align-items-center justify-content-center">
        <h2>Login</h2>
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="submit">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" v-model="formData.email">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" v-model="formData.password">
                    <button type="submit" class="btn btn-primary mt-3">Login</button>
                </form>
            </div>
        </div>
    </div>
</template>