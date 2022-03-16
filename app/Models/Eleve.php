<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'prenom','date_nais', 'code_massar','img', 'niveau',
    ];
      /**
     * The eleve that belong to the parent.
     */
    public function Peres()
    {
        return $this->belongsToMany(Pere::class, 'EleveParent');
    }

}
