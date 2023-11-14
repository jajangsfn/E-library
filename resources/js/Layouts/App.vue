<template>
    <div class="hold-transition login-page">
        <slot />
    </div>
</template>
<script>

//import Link dari inertia
import { Link } from '@inertiajs/inertia-vue3';

export default {

    //register Link di component
    components: {
        Link
    },

    props: {
        auth: Object
    }

}
</script>

