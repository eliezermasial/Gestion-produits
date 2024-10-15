<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produit;
use App\Contracts\InterfaceAdmin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProduitRequest;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::orderBy('created_at', 'asc')->get();
        return view('table.produits', [
            'produits'=>$produits,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produit = new Produit();
        
        return view('forms.formCreate', [
            'produit' => $produit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProduitRequest $request, InterfaceAdmin $produitService)
    {
        
        
        $produitService->create([
            'name'=> $request['name'],
            'description' => $request['description'],
            'price' => $request['price']
        ]);

        //$notification = implementation d'un message de notification

        return redirect()->route('dashboard')->with('success', 'produit ajouté avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        return view('forms.formCreate', ['produit'=>$produit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProduitRequest $request, string $id,  InterfaceAdmin $produitService)
    {
        $data = [
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description
        ];

        $produitService->update($id, $data);

        
        return redirect()->route('admin.produit.index')->with('success', 'Produit modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, InterfaceAdmin $produitService)
    {
        $produitService->delete($id);

        return redirect()->route('admin.produit.index')->with('success', 'Produit supprimé avec succès');
    }
}
