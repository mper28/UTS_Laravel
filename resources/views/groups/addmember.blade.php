@extends('layouts.app')

@section('title', 'Groups')

@section('content')

<form action="/groups/addmember/{{$group->id}}" method="POST">
@csrf
@method('PUT')
    <div class="mb-3">
        <label for="exampleInputEmail1" style="background-color: #ffffff">Nama Teman</label>
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
    Pilih Teman
  </button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
    <select class="form-select" aria-label="Default select example" name="friend_id"> 
    
    @foreach ($friend as $f)
    <option value="{{$f->id}}">{{$f->nama}}</option>
    @endforeach
</div>
        <select class="form-select" aria-label="Default select example">
 
</div>
<br>
<br>
            <div class="mb-3"></div>
    <button type="submit" class="btn btn-primary">Tambah ke grup</button>
</form>

@endsection