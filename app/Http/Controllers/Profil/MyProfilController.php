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
        $images = storage::disk('public')->files('blog');
        
        return view('profil.myProfil', ['images'=>$images]);
    }

    public function update(Request $request)
    {

        // Vérifiez si un fichier a bien été uploadé
        if ($request->hasFile('image')) {

            
            $image = $request->file('image'); // Récupérer le fichier image depuis la requête

            $imagePath = $image->store('blog', 'public'); // Stocker l'image dans le disque public, sous le répertoire 'blog'

            $user = Auth:: user ();

            // mettre à jour l'image
            $user->image = $imagePath;
            $user->save();

            return redirect()->route('dashboard')->with('success', 'image à jour');
            
        } else {
            
            return redirect()->back()->withErrors(['image'=>'non mise à jour']);
        }   
        
    }
    //

    public function delete (Request $request)
    {
        $request->image;
        
        $user = Auth::user();
        $images = storage::disk('public')->files('blog');

        if ($request->image == $user->image)
        {
            storage::disk('public')->delete($user->image);

            $user->save();

            return redirect()->route('profil.edit')->with('success', 'vous avez supprimé votre profil success');
        }
        else
        {
            foreach ($images as $image)
            {
                if ($request->image == $image)
                {
                    storage::disk('public')->delete($image);

                    return redirect()->route('profil.edit')->with('success', 'image supprimée avec success');
                }
            }
        }

        return redirect()->back()->withErrors(['image'=>'non supprimé']);
    }
}
