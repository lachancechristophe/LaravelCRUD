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
    Ajouter Produit
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
    <form method="post" action="{{ route('produit.store') }}">
          <div class="form-group">
              @csrf
              <label for="nom">Nom:</label>
              <input type="text" class="form-control" name="nom"/>
          </div>
          <div class="form-group">
              <label for="code">Code:</label>
              <input type="text" class="form-control" name="code"/>
          </div>
          <div class="form-group">
              <label for="compagnie">Compagnie:</label>
              <input type="text" class="form-control" name="compagnie"/>
          </div>
          <div class="form-group">
              <label for="unite">Unité:</label>
              <input type="text" class="form-control" name="unite"/>
          </div>
          <button type="submit" class="btn btn-primary">Créer Produit</button>
      </form>
  </div>
</div>
@endsection