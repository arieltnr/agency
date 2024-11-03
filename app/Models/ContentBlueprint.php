<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContentBlueprint extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'client_id',
        'mother_content_id',
        'tanggal_post',
        'platform',
        'jenis_konten',
        'pilar_konten',
        'caption',
        'tagar',
        'kebutuhan_visual',
        'kebutuhan_teks',
        'status',
        'waktu_terbit',
    ];
    
    protected $casts = [
        'tanggal_post' => 'date',
        'waktu_terbit' => 'datetime'
    ];
    
    public function client()
    {
        return $this->belongsTo(ClientM::class);
    }
    
    public function motherContent()
    {
        return $this->belongsTo(MotherContent::class);
    }

}
