<?php

namespace App\Http\Controllers\Profil;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\ServiceUserInterface;
use Illuminate\Support\Facades\Storage;

class MyProfilController extends Controller
{
    public function displayProfil (ServiceUserInterface $serviceProfilUser)
    {
        $images = $serviceProfilUser->displayProfilUser();
        
        return view('profil.myProfil', ['images'=>$images]);
    }

    public function update(Request $request, ServiceUserInterface $serviceProfilUser)
    {

        // Vérifiez si un fichier a bien été uploadé
        if ($request->hasFile('image')) {
            
            $serviceProfilUser->updateProfil($request);

            return redirect()->route('dashboard')->with('success', 'image à jour');
            
        } else {
            
            return redirect()->back()->withErrors(['image'=>'non mise à jour']);
        }   
        
    }
    //

    public function delete (Request $request, ServiceUserInterface $serviceProfilUser)
    {
        $request->image;
        
        $serviceProfilUser->deleteImage($request);

        return redirect()->back()->withErrors(['image'=>'non supprimé']);
    }
}
