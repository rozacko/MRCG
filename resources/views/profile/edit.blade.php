@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="container py-5"> 
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            Atur Profile
            </div>
            <div class="row card-body">   
            <div class="col-10 px-5">
                  <a href="/set_profile" class="btn btn-success my-3">Kembali</a>
                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif
              </div>
              <div class="col-8 px-5" >
                <form method="post" action="/set_profile/{{ $profile->id }}" enctype="multipart/form-data">
                  @method('patch')
                  @csrf
                  <div class="form-group">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text" value="{{ $profile->nama }}" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                      @error('nama')<div class="alert alert-danger">The field is required</div>@enderror
                  </div>
                  <div class="form-group">
                      <label for="ttl">Tempat, Tanggal lahir</label>
                      <input type="text" value="{{ $profile->ttl }}" class="form-control @error('ttl') is-invalid @enderror" id="ttl" name="ttl">
                      @error('ttl')<div class="alert alert-danger">The field is required</div>@enderror
                  </div>
                  <div class="form-group">
                      <label for="jenis_kel">Jenis Kelamin</label>
                      <input type="text" value="{{ $profile->jenis_kel }}" class="form-control @error('jenis_kel') is-invalid @enderror" id="jenis_kel"  name="jenis_kel">
                      @error('jenis_kel')<div class="alert alert-danger">The field is required</div>@enderror
                  </div>
                  <div class="form-group">
                      <label for="pekerjaan">Pekerjaan</label>
                      <input type="text" value="{{ $profile->pekerjaan }}" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan"  name="pekerjaan">
                      @error('pekerjaan')<div class="alert alert-danger">The field is required</div>@enderror
                  </div>
                  <div class="form-group">
                      <label for="">Foto </label>
                      <img src="{{asset('storage/' .$profile->gambar)}}" width="70px" alt="">
                      <div class="custom-file">
                        <input type="file" value="{{ $profile->gambar }}" class="custom-file-input @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        @error('gambar')<div class="alert alert-danger">The field is required</div>@enderror
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Save</button>  
                  <a href="/set_profile" class="btn btn-danger my-3">Cancel</a>
                </form>
              </div>
            </div>
        </div>            
        </div>
    </div>
</div>    

@endsection
