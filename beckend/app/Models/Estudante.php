<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;

    protected $table = 'estudante';

    protected $fillabel = [

        'nome',
        'cpf',
        'email',
        // 'endereço',
        'rua',
        'bairro',
        'numero',
        'complemento'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}