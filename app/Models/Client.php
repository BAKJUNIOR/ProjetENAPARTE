<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['password', 'email', 'email', 'nom' , 'prenom' , 'adresse'];

    public function rendezVouse(): HasMany
    {
        return $this->hasMany(RendezVouse::class);
    }
}
