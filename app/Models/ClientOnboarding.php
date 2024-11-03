<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientOnboarding extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $fillable = [
        'client_id',
        'slogan',
        'kategori_produk',
        'produk_unggulan',
        'tujuan_sosmed',
        'target_usia',
        'target_gender',
        'target_profesi',
        'target_pendapatan',
        'platform_prioritas',
        'gaya_komunikasi',
        'gaya_visual',
        'nada_bahasa',
        'kampanye_sebelumnya',
        'perasaan_diinginkan',
        'merek_inspirasi',
        'panduan_warna',
        'representasi_visual',
        'variasi_logo',
        'elemen_grafis',
        'filter_visual',
        'konsistensi_visual',
        'nama_admin',
        'nama_audiens',
    ];

    protected $casts = [
        'kampanye_sebelumnya' => 'boolean',
        'panduan_warna' => 'boolean'
    ];

    public function client()
    {
        return $this->belongsTo(ClientM::class);
    }
}
