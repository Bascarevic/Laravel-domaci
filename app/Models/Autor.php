<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $fillable=[
        'ime',
        'prezime',
        'godina_rodjenja',
        'drzava_id'
    ];

    public function drzava()
    {
        return $this->belongsTo(Drzava::class);
    }

    public function knjige()
    {
        return $this->hasMany(Knjiga::class);
    }
}
