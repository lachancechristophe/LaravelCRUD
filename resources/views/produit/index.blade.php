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
          <td>Unité</td>
          <td>Code</td>
          <td>Compagnie</td>
          
          <td colspan="3">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($produits as $produit)
        <tr>
            <td>{{$produit->id}}</td>
            <td>{{$produit->nom}}</td>
            <td>{{$produit->unite}}</td>
            <td>{{$produit->code}}</td>
            <td>{{$produit->compagnie}}</td>
            <td><a href="{{ route('produit.edit',$produit->id)}}" class="btn btn-primary">Modifier</a></td>
            <td>
                <form action="{{ route('produit.destroy', $produit->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Effacer</button>
                </form>
            </td>
            <td><a href="{{ route('prix_produit.create',$produit->id)}}" class="btn btn-primary">Enregistrer Prix</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection