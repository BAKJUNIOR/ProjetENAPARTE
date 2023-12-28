<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listetudiants extends Model
{
    use HasFactory;
    public $table = 'Listetudiants';
    public $fillable = [
        'name',
        'email',
        'nim',
        'angkatan',
        'jurusan',

    ];
}
