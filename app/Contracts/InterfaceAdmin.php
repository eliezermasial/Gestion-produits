<?php
namespace App\Contracts;

interface InterfaceAdmin
{
    public function delete (int $id);
    public function create (array $data);
    public function update (int $id, array $data);
}
?>