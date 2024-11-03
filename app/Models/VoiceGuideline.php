<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VoiceGuideline extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'client_id',
        'nada_suara',
        'gaya_bahasa',
        'intonasi_suasana',
        'kategori_konten',
        'persona_merek',
        'bahasa_visual',
        'panduan_respon',
        'kosakata',
        'kata_terlarang',
        'status',
        'adaptasi_platform',
    ];
    
    public function client()
    {
        return $this->belongsTo(ClientM::class);
    }
}
