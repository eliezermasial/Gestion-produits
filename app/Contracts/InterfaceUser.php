<?php
namespace App\Contracts;

interface InterfaceUser 
{
    public function dologinUser ($validateRequest, $request);
    public function logoutUser ();
    public function displayProfilUser ();
    public function updateProfil ($request);
    public function deleteImage ($request);
}

?>