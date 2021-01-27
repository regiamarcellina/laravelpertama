@extends('layout.app')

@section('title', 'Tambah Data Groups')

@section('content')

<form action="/groups" method="post">
@csrf
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Group</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Deskripsi</label>
    <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</form>

@endsection