@extends('layout.app')

@section('title', 'Tambah Data Teman')

@section('content')

<form action="/friends" method="post">
@csrf
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Teman</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="nama">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">No Telpon</label>
    <input type="text" name="no_tlp" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Kode Group</label>
    <input type="text" name="groups_id" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</form>

@endsection