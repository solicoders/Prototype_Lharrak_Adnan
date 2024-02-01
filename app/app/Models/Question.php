<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'Titre',
        'Option1',
        'Option2',
        'Id_examen',
    ];
    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }
}
