@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Portofolio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Portofolio</li>
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
              <div class="container my-5">
                <div class="row">
                    <div class="col-10 px-5">
                        <h1 class="mt-3">Form Edit Data Portofolio</h1>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-8 px-5">
                    <form method="post" action="/portofolio/{{ $portofolio->id }}">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="tahun">Tahun :</label>
                            <input type="text" value="{{ $portofolio->tahun }}" class="form-control @error('tahun') is-invalid @enderror" id="tahun" placeholder="Masukkan Tahun" name="tahun">
                            @error('tahun')<div class="alert alert-danger">The field is required</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Portofolio :</label>
                            <input type="text" value="{{ $portofolio->nama }}" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama Portofolio" name="nama">
                            @error('nama')<div class="alert alert-danger">The field is required</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan :</label>
                            <input type="text" value="{{ $portofolio->ket }}" class="form-control @error('ket') is-invalid @enderror" id="ket" placeholder="Masukkan Keterangan" name="ket">
                            @error('ket')<div class="alert alert-danger">The field is required</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>  
                        <a href="/portofolio" class="btn btn-danger my-3">Cancel</a>
                    </form>
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
</div>
@endsection
