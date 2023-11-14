<template>
    <div>
        <div class="content-wrapper">
            <!-- Content Wrapper. Contains page content -->
            <!-- <div > -->
            <!-- Content Header (Page header) -->
            <!-- <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                                <li class="breadcrumb-item active">Top Navigation</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary card-outline  mt-5">
                                <div class="card-body">
                                    <h5 class="card-title">Dashboard</h5>

                                    <p class="card-text">
                                        Selamat Datang di E-Library
                                    </p>
                                </div>
                            </div><!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
            <!-- </div> -->
        </div>
    </div>
</template>
<script>
//import layout App
import LayoutApp from '../../Layouts/AppDashboard.vue';

export default {

    //set layout
    layout: LayoutApp,

    //get props
    props: {
        auth: Object
    },
}
</script>
