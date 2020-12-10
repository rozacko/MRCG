@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="container py-5"> 
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            Atur Alamat
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
                <form method="post" action="/address/{{ $address->id }}" enctype="multipart/form-data">
                  @method('patch')
                  @csrf
                  <div class="form-group">
                      <label for="no_hp">No Handphone Penerima</label>
                      <input type="text" value="{{ $address->no_hp }}" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Ex. 088999999221" id="no_hp" name="no_hp">
                      @error('no_hp')<div class="alert alert-danger">The field is required</div>@enderror
                  </div>
                  <div class="form-group">
                      <label for="nama_penerima">Nama Penerima</label>
                      <input type="text" value="{{ $address->nama_penerima }}" class="form-control @error('nama_penerima') is-invalid @enderror" id="nama_penerima" name="nama_penerima">
                      @error('nama_penerima')<div class="alert alert-danger">The field is required</div>@enderror
                  </div>
                  <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea rows="3" type="text" value="{{ $address->alamat }}" class="form-control @error('alamat') is-invalid @enderror" id="alamat"  name="alamat"></textarea>
                      @error('alamat')<div class="alert alert-danger">The field is required</div>@enderror
                  </div>
                  <div class="form-group">
                      <label for="kecamatan">Kecamatan</label>
                      <input type="text" value="{{ $address->kecamatan }}" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan"  name="kecamatan">
                      @error('kecamatan')<div class="alert alert-danger">The field is required</div>@enderror
                  </div>
                  <div class="form-group">
                      <label for="kabupaten">Kabupaten</label>
                      <input type="text" value="{{ $address->kabupaten }}" class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten"  name="kabupaten">
                      @error('kabupaten')<div class="alert alert-danger">The field is required</div>@enderror
                  </div>
                  <div class="form-group">
                      <label for="catatan">Catatan</label>
                      <textarea rows="3" type="text" value="{{ $address->catatan }}" class="form-control @error('catatan') is-invalid @enderror" id="catatan"  name="catatan" placeholder="ex. Rumah berwarna hijau"></textarea>
                      @error('catatan')<div class="alert alert-danger">The field is required</div>@enderror
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
