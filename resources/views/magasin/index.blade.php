<!-- index.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nom</td>
          <td>Ville</td>
          <td>Note</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($magasins as $magasin)
        <tr>
            <td>{{$magasin->id}}</td>
            <td>{{$magasin->nom}}</td>
            <td>{{$magasin->ville}}</td>
            <td>{{$magasin->note}}</td>
            <td><a href="{{ route('magasin.edit',$magasin->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('magasin.destroy', $magasin->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection