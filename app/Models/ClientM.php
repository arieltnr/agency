<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClientM extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $fillable = [
        'client_nama',
        'client_toko',
        'no_hp',
        'status',
        'created_by'
    ];

    protected static function booted()
    {
        static::deleting(function ($client) {
            // Hapus user terkait berdasarkan client_id
            $client->users()->delete();
        });

        static::creating(function ($client) {
            $client->created_by = auth()->id();
        });
    }

    public function users()
    {
        return $this->hasMany(User::class, 'client_id');
    }

    public function konten(): HasMany
    {
        return $this->hasMany(KontenT::class);
    }

    public function onboarding()
    {
        return $this->hasOne(ClientOnboarding::class);
    }
    
    public function visualGuideline()
    {
        return $this->hasOne(VisualGuideline::class);
    }
    
    public function voiceGuideline()
    {
        return $this->hasOne(VoiceGuideline::class);
    }
    
    public function motherContents()
    {
        return $this->hasMany(MotherContent::class);
    }
    
    public function contentBlueprints()
    {
        return $this->hasMany(ContentBlueprint::class);
    }
    
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
