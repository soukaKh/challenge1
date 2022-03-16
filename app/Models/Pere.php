<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pere extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'prenom','adresse', 'email','img',
    ];
    /**
     * Get the DateEntres for the Parent.
     */
    public function DateEntres()
    {
        return $this->hasMany(DateEntre::class);
    }
      /**
     * Get the DateSorties for the Parent.
     */
    public function DateSorties()
    {
        return $this->hasMany(DateSortie::class);
    }
      /**
     * The roles that belong to the user.
     */
    public function eleves()
    { 
        return $this->belongsToMany(Eleve::class, 'EleveParent');
    }
}
