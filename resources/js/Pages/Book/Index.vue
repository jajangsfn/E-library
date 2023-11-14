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
                                    <h5 class="card-title">Daftar Buku</h5>
                                    <div class="d-flex justify-content-end">
                                        <Link href="/books/create" class="btn btn-primary"><span class="fa fa-plus"></span>
                                        Tambah</Link>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="col-1">No</th>
                                                <th class="col">Gambar</th>
                                                <th class="col">Judul</th>
                                                <th class="col">Pengarang</th>
                                                <th class="col">Tahun Terbit</th>
                                                <th class="col">Kategori</th>
                                                <th class="col">Deskripsi</th>
                                                <th class="col">Stok</th>
                                                <th class="col">Tarif Denda</th>
                                                <th class="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-if="books.length == 0">
                                                <td colspan="10">Data Kosong</td>
                                            </tr>
                                            <tr v-else v-for="(book, index) in books" :key="book.id">
                                                <td>{{ index + 1 }}</td>
                                                <td><img :src="book.gambar" width="100" /></td>
                                                <td>{{ book.judul }}</td>
                                                <td>{{ book.pengarang }}</td>
                                                <td>{{ book.tahun_terbit }}</td>
                                                <td>{{ book.kategori }}</td>
                                                <td>{{ book.deskripsi }}</td>
                                                <td>{{ book.stok }}</td>
                                                <td>{{ book.harga_denda }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <Link :href="`/books/${book.id}/edit`"
                                                            class="btn btn-xs btn-warning">
                                                        <span class="fa fa-edit"></span>
                                                        </Link>
                                                        <button @click.prevent="deleteBook(`${book.id}`)"
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
import LayoutApp from '../../Layouts/AppDashboard.vue';
//import Link dari inertia
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
export default {

    //set layout
    layout: LayoutApp,
    components: {
        Link
    },
    //get props
    props: {
        books: Array,
    },
    setup() {
        //method delete Book
        function deleteBook(id) {
            Inertia.delete(`/books/${id}`)
        }

        return {
            deleteBook
        }
    }
}
</script>
