<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drzava extends Model
{
    use HasFactory;
    protected $fillable=[
        'naziv',
        'broj_stanovnika'
    ];

    public function autori()
    {
        return $this->hasMany(Vlasnik::class);
    }
}
