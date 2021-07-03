<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    public $timestamps = true;
    protected $table = ['utilisateur'];
    protected $fillable = ['nom','prenom','password','email','dnais'];
    
    protected $hidden = [
        'password',
    ];
}
