<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
    protected $fillable = [
        'Titre',
        'Description',
        'Date_debut',
        'Date_fin',
    ];
    public function questions()
    {
        return $this->hasMany(Question::class);
    }}
