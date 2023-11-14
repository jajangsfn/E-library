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
                                <form @submit.prevent="pengembalianBuku()">
                                    <div class="card-header">
                                        <h5 class="card-title">Detail Peminjaman Buku</h5>
                                        <div class="d-flex justify-content-end">
                                            <Link href="/peminjaman" class="btn btn-primary"><span
                                                class="fa fa-home"></span>
                                            Kembali</Link>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Buku</label>
                                            <input type="text" class="form-control" v-model="peminjaman.buku" placeholder="Judul Buku"
                                                readonly="readonly">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Peminjam</label>
                                            <input type="text" class="form-control" v-model="peminjaman.peminjam" placeholder="Judul Buku"
                                                readonly="readonly">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Qty</label>
                                            <input type="number" class="form-control" v-model="peminjaman.qty" placeholder="Qty Buku"
                                                min="0"  readonly="readonly">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Tgl Pinjam</label>
                                            <input type="date" class="form-control" v-model="peminjaman.tgl_pinjam" placeholder="Tgl Pinjam Buku"
                                                min="0"  readonly="readonly">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Tgl Pengembalian</label>
                                            <input type="date" class="form-control" v-model="peminjaman.tgl_pengembalian" placeholder="Tgl Pengembalian Buku"
                                                min="0" readonly="readonly">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Tgl Kembali</label>
                                            <input type="date" class="form-control" v-model="peminjaman.tgl_kembali" placeholder="Tgl Kembali Buku" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Status Pengembalian</label>
                                            <input type="text" class="form-control text-danger" v-model="peminjaman.status" placeholder="Status" readonly="readonly"
                                            v-if="peminjaman.status === 'Telat'">
                                            <input type="text" class="form-control text-success" v-model="peminjaman.status" placeholder="Status" readonly="readonly"
                                            v-if="peminjaman.status ==='Tepat Waktu'">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Denda</label>
                                            <input type="text" class="form-control" v-model="peminjaman.denda" placeholder="Tgl Pengembalian Buku"
                                                readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">
                                                <span class="fa fa-save"></span>
                                                Proses Pengembalian
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
        peminjaman: Object
    },
    setup(props) {
        const peminjaman = reactive({
            buku: props.peminjaman.judul,
            id_buku: props.peminjaman.id_buku,
            id_peminjam: props.peminjaman.peminjam,
            peminjam:  props.peminjaman.nama,
            tgl_pinjam:  props.peminjaman.tgl_peminjaman,
            tgl_pengembalian:  props.peminjaman.tgl_pengembalian,
            qty:  props.peminjaman.qty,
            status: props.peminjaman.status,
            denda: props.peminjaman.denda
        });

        function pengembalianBuku() {
            let id_buku = peminjaman.id_buku;
            let id_peminjam = peminjaman.id_peminjam;
            let tgl_pinjam = peminjaman.tgl_pinjam;
            let tgl_pengembalian = peminjaman.tgl_pengembalian
            let tgl_kembali = peminjaman.tgl_kembali;
            let qty = peminjaman.qty;
            let denda = peminjaman.denda;

            Inertia.put(`/peminjaman/${props.peminjaman.id}`, {
                type: 'pengembalian',
                buku: id_buku,
                peminjam: id_peminjam,
                tgl_pinjam: tgl_pinjam,
                tgl_pengembalian: tgl_pengembalian,
                tgl_kembali: tgl_kembali,
                qty: qty,
                denda: denda
            });
        }
        return {
            peminjaman,
            pengembalianBuku
        }
    }
}
</script>
