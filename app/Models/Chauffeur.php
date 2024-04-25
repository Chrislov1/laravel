<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chauffeur extends Model
{
    use HasFactory;
    protected $fillable = ['id_chauffeur', 'nom', 'prenoms', 'telephone', 'sexe', 'disponible'];
    public function courses()
    {
        return $this->hasMany(Course::class, 'id_course');
    }
}
