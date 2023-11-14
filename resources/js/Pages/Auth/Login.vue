<template>
    <div>
        <div class="register-box">
            <div class="register-logo">
                <a href="#"><b>E-</b>Library</a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form @submit.prevent="storeLogin">
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
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <Link  href="/register/">Register Account</Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
//import layout App
import LayoutApp from '../../Layouts/App.vue';

//import reactivity API dari vue
import {
    reactive
} from 'vue';

import { Link } from '@inertiajs/inertia-vue3';
//import inertia adapter
import { Inertia } from '@inertiajs/inertia';

export default {

    //set layout
    layout: LayoutApp,
    //component
    components: {
        Link
    },
    //get props
    props: {
        errors: Object
    },

    //define composition API
    setup() {

        //define state
        const form = reactive({
            email: '',
            password: '',
        });

        //method storeLogin
        const storeLogin = () => {

            //send data ke server
            Inertia.post('/login', {
                email: form.email,
                password: form.password,

            });

        }

        return {
            form,
            storeLogin
        }

    }
}
</script>

