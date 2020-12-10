@extends('layouts.admin')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Master Harga</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Master Harga</li>
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
                          <h1 class="mt-1">Form Data Harga</h1>
                          @if (session('status'))
                              <div class="alert alert-success">
                                  {{ session('status') }}
                              </div>
                          @endif
                      </div>
                      <div class="col-8 px-5" >
                      <form method="post" action="/m_harga">
                          @csrf
                          <div class="form-group">
                              <label for="kd_barang">Kode Barang :</label>
                              <input type="text" value="{{ old('kd_barang')}}" class="form-control @error('kd_barang') is-invalid @enderror" id="kd_barang" placeholder="Masukkan Kode Barang" name="kd_barang">
                              @error('kd_barang')<div class="alert alert-danger">The field is required</div>@enderror
                          </div>
                          <div class="form-group">
                              <label for="harga">Harga :</label>
                              <input type="text" value="{{ old('harga')}}" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukkan Harga" name="harga">
                              @error('harga')<div class="alert alert-danger">The field is required</div>@enderror
                          </div>
                          <button type="submit" class="btn btn-primary">Save</button>  
                          <a href="/harga" class="btn btn-danger my-3">Cancel</a>
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