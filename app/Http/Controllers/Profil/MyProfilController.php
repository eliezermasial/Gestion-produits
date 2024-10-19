<?php

namespace App\Http\Controllers\Profil;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MyProfilController extends Controller
{
    public function edit ()
    {
        return view('profil.myProfil');
    }

    public function update(Request $request)
    {

        // Vérifiez si un fichier a bien été uploadé
        if ($request->hasFile('image')) {

            
            $image = $request->file('image'); // Récupérer le fichier image depuis la requête

            $imagePath = $image->store('blog', 'public'); // Stocker l'image dans le disque public, sous le répertoire 'blog'

            $user = Auth:: user ();

            // Si user a deja l'image, la supprimer
            if($user->image)
            {
                Storage::disk('public')->delete($user->image); // suppression de l'image apres la verification
            }

            // mettre à jour l'image
            $user->image = $imagePath;
            $user->save();

            return redirect()->route('dashboard')->with('success', 'image à jour');
            
        } else {
            
            return redirect()->back()->withErrors(['image'=>'non mise à jour']);
        }   
        
    }
    //
}
