<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'address',
        'company',
        'phone_number',
        'cell_phone',
        'courses_id',
        'type',
        'password',
    ];

    protected $table = 'suscriptions';
}
