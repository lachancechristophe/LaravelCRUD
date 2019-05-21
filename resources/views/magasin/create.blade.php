<!-- create.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Ajouter magasin
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
      <form method="post" action="{{ route('magasin.store') }}">
          <div class="form-group">
              @csrf
              <label for="nom">Nom du magasin:</label>
              <input type="text" class="form-control" name="nom"/>
          </div>
          <div class="form-group">
              <label for="ville">Ville:</label>
              <input type="text" class="form-control" name="ville"/>
          </div>
          <div class="form-group">
              <label for="quantity">Notes, Cartes Fidélité, etc.:</label>
              <textarea class="form-control" name="note"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Créer magasin</button>
      </form>
  </div>
</div>
@endsection