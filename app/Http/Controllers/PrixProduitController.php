<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prix_Produits;
use App\Produit;
use App\Magasin;


class PrixProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prix_produits = Prix_produits::all();

        return view('prix_produit.index', compact('prix_produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produits = Produit::select(array('id','nom','unite'))->get();
        $magasins = Magasin::select(array('id','nom'))->get();

        return view('prix_produit.create')
            ->with(compact('produits', 'magasins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_produit' => 'required|numeric',
            'format'     => 'required|max:100',
            'prix_unite' => 'required|numeric',
            'id_magasin' => 'required|numeric'
        ]);
        $prix_produit = Prix_produits::create($validatedData);

        return redirect('/prix_produit')->with('success', 'Le prix est correctement sauvegardé.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prix_produit = Prix_produits::findOrFail($id);

        return view('prix_produit.edit', compact('prix_produit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_produit' => 'required|numeric',
            'format'     => 'required|max:100',
            'prix_unite' => 'required|numeric',
            'id_magasin' => 'required|numeric'
        ]);
        Prix_produits::whereId($id)->update($validatedData);

        return redirect('/prix_produit')->with('success', 'Le prix est correctement modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prix_produit = Prix_produits::findOrFail($id);
        $prix_produit->delete();

        return redirect('/prix_produit')->with('success', 'Le prix est correctement effacé.');
    }
}
