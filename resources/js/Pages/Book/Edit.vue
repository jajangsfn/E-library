<template>
    <div>
        <div class="content-wrapper">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary card-outline  mt-5">
                                <form @submit.prevent="updateBook()" enctype="multipart/form-data">
                                    <div class="card-header">
                                        <h5 class="card-title">Edit Buku</h5>
                                        <div class="d-flex justify-content-end">
                                            <Link href="/books" class="btn btn-primary"><span class="fa fa-home"></span>
                                            Kembali</Link>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Gambar</label>
                                            <input type="file" class="form-control" @change="handleFileChange($event)">
                                            <div v-if="errors.gambar" class="alert alert-danger mt-2">
                                                <span>{{ errors.gambar }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Judul Buku</label>
                                            <input type="text" class="form-control" v-model="book.judul"
                                                placeholder="Judul Buku">
                                            <div v-if="errors.judul" class="alert alert-danger mt-2">
                                                <span>{{ errors.judul }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Pengarang Buku</label>
                                            <input type="text" class="form-control" v-model="book.pengarang"
                                                placeholder="Pengarang Buku">
                                            <div v-if="errors.pengarang" class="alert alert-danger mt-2">
                                                <span>{{ errors.pengarang }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Tahun Terbit</label>
                                            <input type="number" class="form-control" v-model="book.tahun_terbit"
                                                placeholder="Tahun Terbit Buku" min="1970">
                                            <div v-if="errors.tahun_terbit" class="alert alert-danger mt-2">
                                                <span>{{ errors.tahun_terbit }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Kategori</label>
                                            <input type="text" class="form-control" v-model="book.kategori"
                                                placeholder="Kategori Buku">
                                            <div v-if="errors.kategori" class="alert alert-danger mt-2">
                                                <span>{{ errors.kategori }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Deskripsi</label>
                                            <textarea rows="3" cols="4" v-model="book.deskripsi" class="form-control"
                                                placeholder="Deskripsi Buku"></textarea>
                                            <div v-if="errors.deskripsi" class="alert alert-danger mt-2">
                                                <span>{{ errors.deskripsi }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Stok</label>
                                            <input type="number" class="form-control" v-model="book.stok" placeholder="Stok Buku"
                                                min="0">
                                            <div v-if="errors.stok" class="alert alert-danger mt-2">
                                                <span>{{ errors.stok }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Tarif Denda</label>
                                            <input type="number" class="form-control" v-model="book.harga_denda"
                                                placeholder="Tarif Denda Buku" min="0">
                                            <div v-if="errors.harga_denda" class="alert alert-danger mt-2">
                                                <span>{{ errors.harga_denda }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-warning">
                                                <span class="fa fa-save"></span>
                                                Update
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
import LayoutApp from '../../Layouts/AppDashboard.vue'
import { Link } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
export default {
    layout: LayoutApp,
    components: {
        Link
    },

    props: {
        book: Object,
        errors: Object
    },
    setup(props) {
        //state books
        const book = reactive({
            judul: props.book.judul,
            pengarang: props.book.pengarang,
            tahun_terbit: props.book.tahun_terbit,
            deskripsi: props.book.deskripsi,
            kategori: props.book.kategori,
            stok: props.book.stok,
            harga_denda: props.book.harga_denda,
            gambar: '',
        });

        //method for handle file changes
        const handleFileChange = (e) => {
            //assign file to state
            book.gambar = e.target.files[0];

        };

        function updateBook() {
            let judul = book.judul;
            let pengarang = book.pengarang;
            let tahun_terbit = book.tahun_terbit;
            let deskripsi = book.deskripsi;
            let kategori = book.kategori;
            let stok = book.stok;
            let harga_denda = book.harga_denda;
            let gambar = book.gambar;

            Inertia.post(`/books/${props.book.id}`, {
                _method: 'put',
                judul: judul,
                pengarang: pengarang,
                tahun_terbit: tahun_terbit,
                deskripsi: deskripsi,
                kategori: kategori,
                stok: stok,
                harga_denda: harga_denda,
                gambar: gambar,
            });
        }
        return {
            book,
            updateBook,
            handleFileChange
        }
    }
}
</script>
