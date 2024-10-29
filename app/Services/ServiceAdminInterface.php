<?php
namespace App\Services;

use App\Models\Produit;
use App\Contracts\InterfaceAdmin;

class ServiceAdminInterface implements InterfaceAdmin
{
    public function create (array $data)
    {
        $produit = Produit::create($data);

        return $produit;
    }

    public function update (int $id, array $data)
    {
        $produit = Produit::findOrFail($id);
        $produit->update($data);

        return $produit;
    }

    public function searchProduit ($request)
    {
        $query = Produit::query();
        $query->where('category', 'like', '%' . $request->category . '%');//l'element like joue le role d'egale(=) pour comparer la requette
        
        return $query->get();
    }

    public function delete (int $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return $produit;
    }

}
?>