@extends('layouts.app')

@section('title', 'Friends')

@section('content')
<a href="/friends/create" class="btn btn-outline-primary">Add Friends</a>
    <div class="row mt-3">
		<div class="col-md-6">

@foreach($friends as $friend)

<div class="card border-success" style="width: 18rem;">
<div class="card-header">
<a href="/friends/{{ $friend['id'] }}" style="background-color: #ffffff">{{ $friend['nama'] }}</a>
  </div>
    <div class="card-body">
        
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $friend['no_telp'] }}</li>
            <li class="list-group-item">{{ $friend['alamat'] }}</li>
            <li class="list-group-item">{{ $friend['pendidikan'] }}</li>
            <li class="list-group-item">{{ $friend['nama_grup'] }} </li>
        </ul>
        <a href="/friends/{{ $friend['id'] }}/edit" class="btn btn-outline-warning">Edit</a>
        <form action="/friends/{{ $friend['id'] }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-outline-danger">Delete</button>
        </form>
    </div>
</div>

@endforeach

<div>
<div class="row mt-3">
		<div class="col-md-6">
{{ $friends->links() }}
</div>
</div>
</div>

@endsection
