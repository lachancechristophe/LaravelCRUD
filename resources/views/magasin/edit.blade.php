<!-- edit.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Magasin
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('magasin.update', $magasin->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nom">Nom du magasin:</label>
              <input type="text" class="form-control" name="nom" value="{{$magasin->nom}}"/>
          </div>
          <div class="form-group">
              <label for="ville">Ville:</label>
              <input type="text" class="form-control" name="ville" value="{{$magasin->ville}}"/>
          </div>
          <div class="form-group">
              <label for="note">Note :</label>
              <textarea class="form-control" name="note"> {{$magasin->note}} </textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update Magasin</button>
      </form>
  </div>
</div>
@endsection