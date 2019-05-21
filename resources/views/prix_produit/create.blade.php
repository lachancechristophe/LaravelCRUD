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
    Ajouter Prix
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
    <form method="post" action="{{ route('prix_produit.store') }}">
          <div class="form-group">
              @csrf
              <label for="id_produit">Nom Produit:</label>
              <select name="id_produit" class="form-control">
                  <option>Nom produit</option><!--selected by default-->
                  @foreach($produits as $produit)
                      <option value="{{ $produit->id }}">
                          {{ $produit->nom }} - Unité: {{ $produit->unite }}
                      </option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="id_magasin">ID Magasin:</label>
              <select name="id_magasin" class="form-control">
                  <option>Nom magasin</option><!--selected by default-->
                  @foreach($magasins as $magasin)
                      <option value="{{ $magasin->id }}">
                          {{ $magasin->nom }}
                      </option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="format">Format :</label>
              <input type="text" class="form-control" name="format"/>
          </div>
          <div class="form-group">
              <label for="prix_unite">Prix:</label>
              <input type="text" class="form-control" name="prix_unite"/>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter Prix</button>
      </form>
  </div>
</div>
@endsection