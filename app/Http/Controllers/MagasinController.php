<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Magasin;

class MagasinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magasins = Magasin::all();

        return view('magasin.index', compact('magasins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('magasin.create');
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
            'nom' => 'required|max:100',
            'ville' => 'required|max:100',
            'note' => 'nullable|max:192'
        ]);
        $magasin = Magasin::create($validatedData);

        return redirect('/magasin')->with('success', 'Le magasin est correctement sauvegardé.');
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
        $magasin = Magasin::findOrFail($id);

        return view('magasin.edit', compact('magasin'));
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
            'nom' => 'required|max:100',
            'ville' => 'required|max:100',
            'note' => 'nullable|max:192',
        ]);
        Magasin::whereId($id)->update($validatedData);

        return redirect('/magasin')->with('success', 'Le magasin est correctement modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $magasin = Magasin::findOrFail($id);
        $magasin->delete();

        return redirect('/magasin')->with('success', 'Le magasin est correctement effacé.');
        
    }
}
