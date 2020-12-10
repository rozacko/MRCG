@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Master Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Master barang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-3">
                <div class="col-10">
                    <a href="/m_barang" class="btn btn-success my-3">Go back</a>
                </div>
                <div class="card px-3" style="width: 18rem;">
                    <div class="card-body">
                        <img src="{{asset('storage/'.$m_barang->gambar)}}" width="200px" alt="">
                        <h5 class="card-title">{{$m_barang->kd_barang}}</h5>
                        <p class="card-text">Nama barang : {{$m_barang->nama}}</p>
                        <p class="card-text">Satuan : {{$m_barang->satuan}}</p>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
