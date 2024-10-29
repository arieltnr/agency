<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;


class KontenT extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'konten_nama',
        'konten_type',
        'copywriting',
        'caption',
        'cover',
        'gambar1',
        'gambar2',
        'gambar3',
        'gambar4',
        'konten_video',
        'tglposting',
        'aktivasi',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(ClientM::class);
    }

    protected static function booted()
    {
        static::deleting(function ($model) {
            $imageFields = ['cover', 'gambar1', 'gambar2', 'gambar3', 'gambar4'];

            foreach ($imageFields as $field) {
                if (!empty($model->$field)) {
                    $filePath = $model->$field; // Nama file saja
                    if (Storage::disk('public')->exists($filePath)) {
                        Storage::disk('public')->delete($filePath);
                    }
                }
            }
        });
    }

}
