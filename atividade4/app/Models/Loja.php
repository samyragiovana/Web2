<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LojaController extends Model
{
    protected $fillable = ['fabricante', 'marca','produto','cor','tamanho'];
    use HasFactory;
}
