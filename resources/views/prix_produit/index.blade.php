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
          <td>Produit</td>
          <td>Magasin</td>
          <td>Format</td>
          <td>Prix</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($prix_produits as $prix_produit)
        <tr>
            <td>{{$prix_produit->id}}</td>
            <td>
              <?php 
                $produit = App\Produit::find($prix_produit->id_produit);
                echo $produit['nom'];
              ?>
            </td>
            <td>
              <?php 
                $magasin = App\Magasin::find($prix_produit->id_magasin);
                echo $magasin['nom'];
              ?>
            </td>
            <td>{{$prix_produit->format}}</td>
            <td>{{$prix_produit->prix_unite}}</td>
            <td><a href="{{ route('prix_produit.edit',$prix_produit->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('prix_produit.destroy', $prix_produit->id)}}" method="post">
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