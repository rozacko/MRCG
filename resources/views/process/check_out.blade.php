@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <form>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Alamat :</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly></textarea>
            </div>
            <a href="/address" class="btn btn-outline-primary my-3">Ubah Alamat</a>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Catatan :</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Qty.</th>
                  <th scope="col">Value</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $Data)
                  <tr>
                    <th scope="row">{{ $loop->iteration}}</th>
                    <td>{{$Data->nama}}</td>
                    <td>{{$Data->qty}}</td>
                    <td>{{$Data->value}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <a href="/make_order" class="btn btn-primary my-3">Buat Pesanan</a>
          </form>
        </div>
    </div>
</div>
@endsection
