<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReviewM extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'konten_id',
        'komentar',
    ];

    public function client()
    {
        return $this->belongsTo(ClientM::class);
    }

    public function konten()
    {
        return $this->belongsTo(KontenT::class);
    }
}
