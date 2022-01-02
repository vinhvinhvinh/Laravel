<?php

namespace App\Contracts;



interface BaseContract
{
    public function create(array $attribute);
    public function all($column = array('*'), string $orderBy = 'id', string $sortBy = 'desc');
    public function update(array $attribute, int $id);
    public function find(int $id);
    public function findOneOrFail(int $id);
    public function findBy(array $data);
    public function findOneBy(array $data);
    public function findOneByOrFail(array $data);
    public function delete(int $id);
}