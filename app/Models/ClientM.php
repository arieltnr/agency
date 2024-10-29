<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClientM extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_nama',
        'client_toko',
        'no_hp',
        'status',
    ];

    public function konten(): HasMany
    {
        return $this->hasMany(KontenT::class);
    }

}
