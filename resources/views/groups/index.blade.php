@extends('layout.app')

@section('title', 'Groups')

@section('content')
<a href="/groups/create" class="card-link btn-primary"> Tambah Group </a>

@foreach($groups as $group)

<div class="card" style="width: 18rem;">
  
  <div class="card-body">
      <p class="card-text">{{ $group['name'] }}</p>
        <hr>
        <a href="/groups/addmember/{{ $group['id'] }}" class="card-link btn-primary"> Tambah Anggota Group </a>
      
        <ul class="list-group">
        @foreach ($group->friends as $friend)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $friend->nama }}
            <form action="/groups/deletemember/{{ $friend['id'] }}" method="post">
                @csrf
                @method('PUT')
                <button class="card-link btn-danger"> Hapus </button>
            </form>
        </li>
            @endforeach
        </ul>

        <hr>

        <a href="/groups/{{ $group['id'] }}/edit" class="card-link btn-warning"> Edit Groups </a>
        <form action="/groups/{{ $group['id'] }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="card-link btn-danger"> Hapus Danger </button>
        </form>

  </div>
</div>

@endforeach
    {{ $groups->links() }}
@endsection