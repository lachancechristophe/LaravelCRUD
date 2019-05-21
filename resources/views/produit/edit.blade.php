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
    Edit Produit
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
      <form method="post" action="{{ route('produit.update', $produit->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nom">Nom:</label>
              <input type="text" class="form-control" name="nom" value="{{$produit->nom}}"/>
          </div>
          <div class="form-group">
              <label for="code">Code:</label>
              <input type="text" class="form-control" name="code" value="{{$produit->code}}"/>
          </div>
          <div class="form-group">
              <label for="compagnie">Compagnie:</label>
              <input type="text" class="form-control" name="compagnie" value="{{$produit->compagnie}}"/>
          </div>
          <div class="form-group">
              <label for="unite">Unité:</label>
              <input type="text" class="form-control" name="unite" value="{{$produit->unite}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Produit</button>
      </form>
  </div>
</div>
@endsection