<?php

namespace App\Contracts;


interface ProductContracts
{
    public function createProduct(array $params);
    public function updateProduct(array $params);
    public function deleteProduct(int $id);
    public function findProductById($id);
}