<?php
namespace App\Services;

use App\Contracts\InterfaceUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class ServiceUserInterface implements InterfaceUser
{
    /**
     * Gère l'authentification de l'utilisateur.
     * @param array $validateRequest - Les informations de connexion validées.
     * @param \Illuminate\Http\Request $request - La requête HTTP pour gérer la session.
     * @return \Illuminate\Http\RedirectResponse - Redirige vers la page précédemment demandée ou vers le tableau de bord.
     */
    public function dologinUser ($validateRequest, $request)
    {
        if(Auth::attempt($validateRequest))
        {
            $request->session()->regenerate();

            return redirect($request->session()->get('url.intended', route('dashboard')));
        }
    }

    /**
     * Déconnecte l'utilisateur actuel.
     * @return void
     */
    public function logoutUser ():void
    {
        auth::logout();
    }

    /**
     * Récupère et retourne les images de profil disponibles dans le dossier 'blog'.
     * @return array - Liste des chemins des fichiers d'images.
     */
    public function displayProfilUser ()
    {
        $images = storage::disk('public')->files('blog');

        return $images;
    }
    
    /**
     * Met à jour l'image de profil de l'utilisateur authentifié.
     * @param \Illuminate\Http\Request $request - La requête contenant le fichier image.
     * @return void
     */
    public function updateProfil ($request):void
    {
        $image = $request->file('image'); // Récupérer le fichier image depuis la requête

        $imagePath = $image->store('blog', 'public'); // Stocker l'image dans le disque public, sous le répertoire 'blog'

        $user = Auth:: user ();

        // mettre à jour l'image
        $user->image = $imagePath;
        $user->save();
    }

    /**
     * Supprime une image spécifique du dossier 'blog'.
     * @param \Illuminate\Http\Request $request - La requête contenant le nom de l'image à supprimer.
     * @return \Illuminate\Http\RedirectResponse - Redirige vers la page de modification de profil avec un message de succès.
     */
    public function deleteImage ($request)
    {
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
    }
}
?>