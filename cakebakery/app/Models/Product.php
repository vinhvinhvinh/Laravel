<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //set id không phải int-> string
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    //----------------------------------------------------------------

    protected $table = 'products';

    protected $fillable = [
        'tenbanh', 'mota', 'giaban', 'hinhanh', 'tinhtrang',
    ];
}