<template>
    <div>
        <div class="content-wrapper">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary card-outline  mt-5">
                                <form @submit.prevent="updateAnggota()">
                                    <div class="card-header">
                                        <h5 class="card-title">Edit Anggota</h5>
                                        <div class="d-flex justify-content-end">
                                            <Link href="/anggotas" class="btn btn-primary"><span class="fa fa-home"></span>
                                            Kembali</Link>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Nama</label>
                                            <input type="text" class="form-control" v-model="anggota.nama"
                                                placeholder="Nama Anggota">
                                            <div v-if="errors.nama" class="alert alert-danger mt-2">
                                                <span>{{ errors.nama }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">No. Identitas</label>
                                            <input type="text" class="form-control" v-model="anggota.no_identitas"
                                                placeholder="Nomor Identitas Anggota">
                                            <div v-if="errors.no_identitas" class="alert alert-danger mt-2">
                                                <span>{{ errors.no_identitas }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Jenis Identitas</label>
                                            <input type="text" class="form-control" v-model="anggota.jenis_identitas"
                                                placeholder="Jenis Identitas Anggota">
                                            <div v-if="errors.jenis_identitas" class="alert alert-danger mt-2">
                                                <span>{{ errors.jenis_identitas }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Tanggal Lahir</label>
                                            <input type="date" class="form-control" v-model="anggota.tgl_lahir"
                                                placeholder="Tanggal Lahir Anggota">
                                            <div v-if="errors.tgl_lahir" class="alert alert-danger mt-2">
                                                <span>{{ errors.tgl_lahir }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Jenis Kelamin</label>
                                            <input type="radio" value="L" v-model="anggota.jenkel">Laki Laki
                                            <input type="radio" value="P" v-model="anggota.jenkel">Perempuan
                                            <div v-if="errors.jenkel" class="alert alert-danger mt-2">
                                                <span>{{ errors.jenkel }}</span>
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

//import layout App
import { reactive } from 'vue';
import LayoutApp from '../../Layouts/AppDashboard.vue';
//import Link dari inertia
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
// import { Inertia } from '@inertiajs/inertia';
export default {
    //set layout
    layout: LayoutApp,
    components: {
        Link
    },
    //get props
    props: {
        anggota: Object,
        errors: Object,
    },
    setup(props) {
        const anggota = reactive({
            nama: props.anggota.nama,
            no_identitas: props.anggota.no_identitas,
            jenis_identitas: props.anggota.jenis_identitas,
            tgl_lahir: props.anggota.tgl_lahir,
            jenkel: props.anggota.jenkel
        });
        const handleJenkelChange = (e) => {
            anggota.jenkel = e.target.value;
        }

        function updateAnggota() {
            let nama = anggota.nama;
            let no_identitas = anggota.no_identitas;
            let jenis_identitas = anggota.jenis_identitas;
            let tgl_lahir = anggota.tgl_lahir;
            let jenkel = anggota.jenkel;

            Inertia.put(`/anggotas/${props.anggota.id}`, {
                nama: nama,
                no_identitas: no_identitas,
                jenis_identitas: jenis_identitas,
                tgl_lahir: tgl_lahir,
                jenkel: jenkel
            });
        }
        return {
            anggota,
            updateAnggota,
            handleJenkelChange
        }
    }
}
</script>
