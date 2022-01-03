<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;

    //set id không phải int-> string
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'accounts';

    protected $fillable = [
        'tenkh', 'username', 'password', 'diachi', 'email', 'hinhanh', 'loaitk', 'trangthai',
    ];
}