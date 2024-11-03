<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisualGuideline extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $fillable = [
        'client_id',
        'file_logo',
        'palet_warna',
        'nada_suasana',
        'tipografi',
        'ikon_elemen',
        'preset_filter',
        'gaya_fotografi',
        'konsistensi_platform',
        'ringkasan'
    ];

    public function client()
    {
        return $this->belongsTo(ClientM::class);
    }
}
