<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['point_depart', 'point_arrivee', 'date_heure', 'chauffeur_id', 'statut' ];
    protected $primaryKey = 'course_id';

    public function chauffeur()
    {
       return $this->belongsTo(chauffeur::class, 'chauffeur_id');
    }
    
}
