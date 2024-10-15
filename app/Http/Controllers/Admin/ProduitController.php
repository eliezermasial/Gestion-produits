<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Contracts\InterfaceAdmin;
use App\Http\Controllers\Controller;

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
    public function store(Request $request, InterfaceAdmin $produitService)
    {
        $validateRequest = $request->validate([
            'name' => 'required|string|max:20',
            'description' => 'required|string|max:255',
            'price' => 'required|string|max:255',
        ]);
        
        
        $produit = $produitService->create([
            'name'=> $validateRequest['name'],
            'description' => $validateRequest['description'],
            'price' => $validateRequest['price']
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
