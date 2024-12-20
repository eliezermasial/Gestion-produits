<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProduitRequest;
use App\Services\ServiceAdminInterface;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::orderBy('created_at', 'asc')->get();
        
        return view('table.produits',['produits'=>$produits,]);
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
    public function store(ProduitRequest $request, ServiceAdminInterface $produitService)
    {
        $produitService->create([
            'name'=> $request['name'],
            'price' => $request['price'],
            'category' => $request['category'],
            'description' => $request['description'],
        ]);

        //$notification = implementation d'un message de notification

        return redirect()->route('dashboard')->with('success', 'produit ajouté avec success');
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
    public function update(ProduitRequest $request, string $id,  ServiceAdminInterface $produitService)
    {
        $data = [
            'name'=>$request->name,
            'price'=>$request->price,
            'category'=>$request->category,
            'description'=>$request->description
        ];

        $produitService->update($id, $data);

        return redirect()->route('admin.produit.index')->with('success', 'Produit modifié avec succès');
    }

    public function listing (Request $request, ServiceAdminInterface $produitService)
    {
        $produits = [];
        
        if ($request->has('category'))
        {
            $validateRequest = $request->validate(['category'=>'required|string|min:5']);
            
            $produits = $produitService->searchProduit($request);

            return view('search.searchByCategory', ['produits'=>$produits, 'validated'=>$validateRequest['category']]);
        }
        
        return view('search.searchByCategory', ['produits'=>$produits]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, ServiceAdminInterface $produitService)
    {
        $produitService->delete($id);

        return redirect()->route('admin.produit.index')->with('success', 'Produit supprimé avec succès');
    }
}
