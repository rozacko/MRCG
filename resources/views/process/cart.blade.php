@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          @foreach($data ?? '' as $Data)
          <div class="card">
            <div class="card-header">
            {{$Data->nama}}
            </div>
            <div class="row card-body">
              <div class="col-md-3">
                <img src="{{asset('storage/' .$Data->gambar)}}" width="150px" alt="...">
              </div>
              <div class="col-md-8">
                <h5 class="card-title">Harga : Rp. {{number_format($Data->harga,2)}}</h5>
                <p class="card-text">Satuan : {{$Data->satuan}}</p>
                <div class="row">
                  <div class="col-1">
                    <button onclick="tambah()" type="button" class="btn btn-outline-light">
                    <img src="{{ asset('/mrcg/img/user.png')}}" alt="" width="20px"/></img>
                    </button>
                  </div>
                  <div class="col-1">
                    <input style="width:40px;" name="{{$Data->kd_barang}}" class="form-control" value="{{$Data->qty}}" id="exampleFormControlInput1">
                  </div>
                  <div class="col-1">
                    <button onclick="tambah()" type="button" class="btn btn-outline-light">
                    <img src="{{ asset('/mrcg/img/user.png')}}" alt="" width="20px"/></img>
                    </button>
                  </div>
                </div>
                <a href="" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>            
            @endforeach
            <a href="/check_out" class="btn btn-primary my-3">Check out</a>
        </div>
    </div>
</div>
<script>
</script>
@endsection
