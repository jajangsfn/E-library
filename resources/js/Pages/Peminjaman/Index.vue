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
                            <div v-if="errors.message_error" class="alert alert-danger" role="alert">
                                {{ errors.message_error }}
                            </div>
                            <!-- flash message -->
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Daftar Peminjaman Buku</h5>
                                    <div class="d-flex justify-content-end">
                                        <Link href="/peminjaman/create" class="btn btn-primary"><span
                                            class="fa fa-plus"></span>
                                        Tambah</Link>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="col-1">No</th>
                                                <th class="col">Buku</th>
                                                <th class="col">Peminjam</th>
                                                <th class="col">Qty</th>
                                                <th class="col">Tgl Pinjam</th>
                                                <th class="col">Tgl Pengembalian</th>
                                                <th class="col">Tgl Kembali</th>
                                                <th class="col">Denda</th>
                                                <th class="col">Status</th>
                                                <th class="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-if="peminjaman.length == 0">
                                                <td colspan="10" class="text-center">Data Kosong</td>
                                            </tr>
                                            <tr v-else v-for="(pinjam, index) in peminjaman">
                                                <td>{{ index + 1 }}</td>
                                                <td>{{ pinjam.judul }}</td>
                                                <td>{{ pinjam.nama }}</td>
                                                <td>{{ pinjam.qty }}</td>
                                                <td>{{ pinjam.tgl_peminjaman }}</td>
                                                <td>{{ pinjam.tgl_pengembalian }}</td>
                                                <td>{{ pinjam.tgl_kembali }}</td>
                                                <td>{{ pinjam.denda }}</td>
                                                <td>
                                                    <span v-if="pinjam.tgl_kembali !== null"
                                                        class="badge badge-success">Sudah
                                                        Kembali</span>
                                                    <span v-else class="badge badge-warning">Belum Kembali</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group" v-if="pinjam.tgl_kembali === null">
                                                        <Link :href="`/peminjaman/${pinjam.id}/edit`"
                                                            class="btn btn-xs btn-warning">
                                                            <span class="fa fa-edit"></span>
                                                        </Link>
                                                        <button @click.prevent="deletePinjam(`${pinjam.id}`)"
                                                            class="btn btn-xs btn-danger">
                                                            <span class="fa fa-trash"></span>
                                                        </button>
                                                        <Link :href="`/peminjaman/${pinjam.id}`"
                                                            class="btn btn-xs btn-primary">
                                                            <span class="fa fa-eye"></span>
                                                        </Link>
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
import { Inertia } from '@inertiajs/inertia';
import LayoutApp from '../../Layouts/AppDashboard.vue';
import { Link } from '@inertiajs/inertia-vue3';
export default {
    layout: LayoutApp,
    components: {
        Link
    },
    props: {
        peminjaman: Array,
        errors: Array
    },
    setup() {
        function deletePinjam(id) {
            Inertia.delete(`/peminjaman/${id}`);
        }
        return {
            deletePinjam
        }
    }
}
</script>
