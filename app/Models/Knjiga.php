<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knjiga extends Model
{
    use HasFactory;

    protected $fillable=[
        'naslov',
        'zanr',
        'godina_izdanja',
        'autor_id'
    ];

    public function vlasnik()
    {
        return $this->belongsTo(Autor::class);
    }
}
