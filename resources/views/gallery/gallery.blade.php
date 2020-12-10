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
              <div class="card-header">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <a href="/gallery/create" class="btn btn-primary my-3">Tambah Data</a>
                <div class="card-tools">
                  <!-- <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Judul Gambar</th>
                      <th>Gambar</th>
                      <th>Keterangan</th>
                      <th data-option="align:'center'">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($gallery ?? '' as $Gallery)
                    <tr>
                    <td scope="row">{{ $loop->iteration}}</td>
                    <td>{{$Gallery->nama}}</td>
                    <td>@if($Gallery->gambar)
                    <img src="{{asset('storage/' .$Gallery->gambar)}}" width="70px" alt="">
                    @else
                    Belum ada gambar
                    @endif</td>
                    <td>{{$Gallery->ket}}</td>
                    <td align="center">
                        <a href="/gallery/{{$Gallery->id}}" class="btn btn-primary">View</a>
                        <a href="/gallery/{{$Gallery->id}}/edit" class="btn btn-success">Update</a>
                        <form action="/gallery/{{$Gallery->id}}"  method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" onclick="return confirm('Are you sure for delete this data?')" class="btn btn-danger">Delete</button>        
                        </form>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$gallery->links()}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
</div>
@endsection
