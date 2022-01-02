<?php

namespace App\Repositories;

use App\Contracts\ProductContracts;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductRepository extends BaseRepository implements ProductContracts
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
    public function createProduct(array $params)
    {
    }
    public function updateProduct(array $params)
    {
    }
    public function deleteProduct(int $id)
    {
        $product = $this->findProductById($id);
        // if ($product->hinhanh !== null) {
        //     $this->deleteOne($product->hinhanh);
        // }
        $product->delete();
        return $product;
    }
    public function findProductById($id)
    {
        try {
            return $this->findOneByOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
    }
}