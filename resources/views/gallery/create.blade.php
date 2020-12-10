@extends('layouts.admin')
@section('content')
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
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                  <div class="container my-2">
                  <div class="row">
                      <div class="col-10 px-5">
                          <a href="/gallery" class="btn btn-success my-3">Go back</a>
                          <h1 class="mt-1">Form Data Gallery</h1>
                          @if (session('status'))
                              <div class="alert alert-success">
                                  {{ session('status') }}
                              </div>
                          @endif
                      </div>
                      <div class="col-8 px-5" >
                      <form method="post" action="/gallery" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                              <label for="nama">Judul Gambar :</label>
                              <input type="text" value="{{ old('nama')}}" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Judul Gambar" name="nama">
                              @error('nama')<div class="alert alert-danger">The field is required</div>@enderror
                          </div>
                          <div class="form-group">
                            <label for="">Gambar :</label>
                            <div class="custom-file">
                              <input type="file" value="{{ old('gambar')}}" class="custom-file-input @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                              @error('gambar')<div class="alert alert-danger">The field is required</div>@enderror
                            </div>
                          </div>
                          <div class="form-group">
                              <label for="ket">Keterangan :</label>
                              <input type="text" value="{{ old('ket')}}" class="form-control @error('ket') is-invalid @enderror" id="ket" placeholder="Masukkan Keterangan" name="ket">
                              @error('ket')<div class="alert alert-danger">The field is required</div>@enderror
                          </div>
                          <button type="submit" class="btn btn-primary">Save</button>  
                          <a href="/gallery" class="btn btn-danger my-3">Cancel</a>
                      </form>
                      </div>
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