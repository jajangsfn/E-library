<template>
    <div>
        <div class="register-box">
            <div class="register-logo">
                <a href="#"><b>E-</b>Library</a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register a new membership</p>
                    <form @submit.prevent="storeRegister">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Full name" v-model="form.name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div v-if="errors.name" class="alert alert-danger">
                            {{ errors.name }}
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" v-model="form.email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div v-if="errors.email" class="alert alert-danger">
                            {{ errors.email }}
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" v-model="form.password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div v-if="errors.password" class="alert alert-danger">
                            {{ errors.password }}
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Retype password"
                                v-model="form.password_confirmation">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div v-if="errors.password_confirmation" class="alert alert-danger">
                            {{ errors.password_confirmation }}
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <div class="text-center mt-2">
                        <a href="/login" class="text-center">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

//import layout App
import LayoutApp from '../../Layouts/App.vue';

//import reactivity API dari vue
import { reactive } from 'vue';

//import inertia adapter
import { Inertia } from '@inertiajs/inertia';

export default {

    //set layout
    layout: LayoutApp,

    //get props
    props: {
        errors: Object
    },

    //define composition API
    setup() {

        //define state
        const form = reactive({
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        });

        //method storeRegister
        const storeRegister = () => {

            //send data ke server
            Inertia.post('/register', {
                name: form.name,
                email: form.email,
                password: form.password,
                password_confirmation: form.password_confirmation

            });

        }

        return {
            form,
            storeRegister
        }

    }
}
</script>
