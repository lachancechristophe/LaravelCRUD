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
    Edit Prix
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
      <form method="post" action="{{ route('prix_produit.update', $prix_produit->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="id_produit">Id Produit:</label>
              <input type="text" class="form-control" name="id_produit" value="{{$prix_produit->id_produit}}"/>
          </div>
          <div class="form-group">
              <label for="id_magasin">ID Magasin:</label>
              <input type="text" class="form-control" name="id_magasin" value="{{$prix_produit->id_magasin}}"/>
          </div>
          <div class="form-group">
              <label for="format">Format :</label>
              <input type="text" class="form-control" name="format" value="{{$prix_produit->format}}"/>
          </div>
          <div class="form-group">
              <label for="prix_unite">Prix:</label>
              <input type="text" class="form-control" name="prix_unite" value="{{$prix_produit->prix_unite}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Prix</button>
      </form>
  </div>
</div>
@endsection