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

    public function delete (int $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return $produit;
    }

}
?>