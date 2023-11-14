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
                                <form @submit.prevent="updatePeminjaman()">
                                    <div class="card-header">
                                        <h5 class="card-title">Edit Peminjaman Buku</h5>
                                        <div class="d-flex justify-content-end">
                                            <Link href="/peminjaman" class="btn btn-primary"><span
                                                class="fa fa-home"></span>
                                            Kembali</Link>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Buku</label>
                                            <select class="form-control" v-model="peminjaman.buku">
                                                <option :value="book.id" v-for="book in books">
                                                    {{ book.judul }}
                                                </option>
                                            </select>
                                            <div v-if="errors.buku" class="alert alert-danger mt-2">
                                                <span>{{ errors.buku }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Peminjam</label>
                                            <select class="form-control" v-model="peminjaman.peminjam">
                                                <option :value="pinjam.id" v-for="pinjam in peminjam">
                                                    {{ pinjam.nama }}
                                                </option>
                                            </select>
                                            <div v-if="errors.peminjam" class="alert alert-danger mt-2">
                                                <span>{{ errors.peminjam }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Qty</label>
                                            <input type="number" class="form-control" v-model="peminjaman.qty" placeholder="Qty Buku"
                                                min="0">
                                            <div v-if="errors.qty" class="alert alert-danger mt-2">
                                                <span>{{ errors.qty }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Tgl Pinjam</label>
                                            <input type="date" class="form-control" v-model="peminjaman.tgl_pinjam" placeholder="Tgl Pinjam Buku"
                                                min="0">
                                            <div v-if="errors.tgl_pinjam" class="alert alert-danger mt-2">
                                                <span>{{ errors.tgl_pinjam }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Tgl Pengembalian</label>
                                            <input type="date" class="form-control" v-model="peminjaman.tgl_pengembalian" placeholder="Tgl Pengembalian Buku"
                                                min="0">
                                            <div v-if="errors.tgl_pengembalian" class="alert alert-danger mt-2">
                                                <span>{{ errors.tgl_pengembalian }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">
                                                <span class="fa fa-save"></span>
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
import { reactive } from 'vue';
import LayoutApp from '../../Layouts/AppDashboard.vue';
import { Link } from '@inertiajs/inertia-vue3';
export default {
    layout: LayoutApp,
    components: {
        Link
    },
    props: {
        peminjaman: Object,
        books: Array,
        peminjam: Array,
        errors: Object
    },
    setup(props) {
        const peminjaman = reactive({
            buku: props.peminjaman.id_buku,
            peminjam:  props.peminjaman.peminjam,
            tgl_pinjam:  props.peminjaman.tgl_peminjaman,
            tgl_pengembalian:  props.peminjaman.tgl_pengembalian,
            qty:  props.peminjaman.qty
        });

        function updatePeminjaman() {
            let buku = peminjaman.buku;
            let peminjam = peminjaman.peminjam;
            let tgl_pinjam = peminjaman.tgl_pinjam;
            let tgl_pengembalian = peminjaman.tgl_pengembalian
            let qty = peminjaman.qty;

            Inertia.put(`/peminjaman/${props.peminjaman.id}`, {
                type: null,
                buku: buku,
                peminjam: peminjam,
                tgl_pinjam: tgl_pinjam,
                tgl_pengembalian: tgl_pengembalian,
                qty: qty
            });
        }
        return {
            peminjaman,
            updatePeminjaman
        }
    }
}
</script>
