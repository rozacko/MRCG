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
              <li class="breadcrumb-item active">Master Barang</li>
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
                <a href="/m_barang/create" class="btn btn-primary my-3">Tambah Data</a>
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
                      <th>Gambar</th>
                      <th>Kode barang</th>
                      <th>Nama barang</th>
                      <th>Satuan</th>
                      <th data-option="align:'center'">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($barang ?? '' as $Barang)
                    <tr>
                    <td scope="row">{{ $loop->iteration}}</td>
                    <td>@if($Barang->gambar)
                    <img src="{{asset('storage/'.$Barang->gambar)}}" width="70px" alt="">                    
                    @else
                    Belum ada gambar
                    @endif</td>
                    <td>{{$Barang->kd_barang}}</td>
                    <td>{{$Barang->nama}}</td>
                    <td>{{$Barang->satuan}}</td>
                    <td align="center">
                        <a href="/m_barang/{{$Barang->id}}" class="btn btn-primary">View</a>
                        <a href="/m_barang/{{$Barang->id}}/edit" class="btn btn-success">Update</a>
                        <form action="/m_barang/{{$Barang->id}}"  method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" onclick="return confirm('Are you sure for delete this data?')" class="btn btn-danger">Delete</button>        
                        </form>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$barang->links()}}
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
