<template>
    <div>
        <div class="content-wrapper">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mt-5">
                            <!-- flash message -->
                            <div v-if="$page.props.flash.message" class="alert alert-success" role="alert">
                                {{ $page.props.flash.message }}
                            </div>
                            <!-- flash message -->
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Daftar Anggota</h5>
                                    <div class="d-flex justify-content-end">
                                        <Link href="/anggotas/create" class="btn btn-primary"><span
                                            class="fa fa-plus"></span>
                                        Tambah</Link>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="col-1">No</th>
                                                <th class="col">Nama</th>
                                                <th class="col">No.Identitas</th>
                                                <th class="col">Jenis Identitas</th>
                                                <th class="col">Tgl Lahir</th>
                                                <th class="col">Jenis Kelamin</th>
                                                <th class="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-if="anggotas.length == 0">
                                                <td colspan="6" class="text-center">
                                                    Data kosong
                                                </td>
                                            </tr>
                                            <tr v-else v-for="(anggota, index) in anggotas">
                                                <td>{{ index + 1 }}</td>
                                                <td>{{ anggota.nama }}</td>
                                                <td>{{ anggota.no_identitas }}</td>
                                                <td>{{ anggota.jenis_identitas }}</td>
                                                <td>{{ anggota.tgl_lahir }}</td>
                                                <td><span v-if="anggota.jenkel === 'L'">Laki - laki</span>
                                                    <span v-else>Perempuan</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <Link :href="`/anggotas/${anggota.id}/edit`"
                                                            class="btn btn-xs btn-warning">
                                                        <span class="fa fa-edit"></span>
                                                        </Link>
                                                        <button @click.prevent="deleteAnggota(`${anggota.id}`)"
                                                            class="btn btn-xs btn-danger">
                                                            <span class="fa fa-trash"></span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
//import layout App
import { Inertia } from '@inertiajs/inertia';
import LayoutApp from '../../Layouts/AppDashboard.vue';
//import Link dari inertia
import { Link } from '@inertiajs/inertia-vue3';
// import { Inertia } from '@inertiajs/inertia';
export default {

    //set layout
    layout: LayoutApp,
    components: {
        Link
    },
    //get props
    props: {
        anggotas: Array
    },
    setup() {
        function deleteAnggota(id) {
            Inertia.delete(`/anggotas/${id}`);
        }

        return {
            deleteAnggota
        }
    },

}
</script>
