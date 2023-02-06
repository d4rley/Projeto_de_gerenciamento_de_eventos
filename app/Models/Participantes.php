<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participantes extends Model
{
    use HasFactory;
    protected $table = "participantes";
    protected $fillable=[
        'nome',
        'email',
        'numero',
        'evento_id'

    ];
    public function events()
    {
        return $this->belongsTo(Events::class);
    }
}
