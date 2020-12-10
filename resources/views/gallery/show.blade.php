@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Gallery</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gallery</li>
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
                    <a href="/gallery" class="btn btn-success my-3">Go back</a>
                </div>
                <div class="card px-3" style="width: 18rem;">
                    <div class="card-body">
                        <img src="{{asset('storage/' .$gallery->gambar)}}" width="200px" alt="">
                        <h5 class="card-title">{{$gallery->nama}}</h5>
                        <p class="card-text">Keterangan : {{$gallery->ket}}</p>
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
