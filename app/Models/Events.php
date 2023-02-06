<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{    
    use HasFactory;
    protected $table = "eventos";
    protected $fillable=[
        'nome',
        'data',
        'local',
        'responsavel'

    ];

    public function Participantes()
    {
        return $this->hasMany(Participantes::class);
    }
}
