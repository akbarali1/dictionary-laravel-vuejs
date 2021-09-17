<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DictionaryCat extends Model
{
    use HasFactory;
    protected $table = 'dictionary_cat';
    protected $fillable = [
        'eng',
        'uz',
        'ru',
    ];
}
