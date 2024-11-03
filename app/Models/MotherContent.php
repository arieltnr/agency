<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MotherContent extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $fillable = [
        'client_id',
        'judul',
        'tema',
        'tujuan',
        'waktu_mulai',
        'waktu_selesai',
        'pilar_konten',
        'strategi_platform',
        'target_kpi',
    ];

    protected $casts = [
        'waktu_mulai' => 'date',
        'waktu_selesai' => 'date'
    ];
    
    public function client()
    {
        return $this->belongsTo(ClientM::class);
    }
    
    public function contentBlueprints()
    {
        return $this->hasMany(ContentBlueprint::class);
    }
}
