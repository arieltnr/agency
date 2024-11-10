<?php

namespace App\Filament\Resources\VoiceGuidelineResource\Pages;

use App\Filament\Resources\VoiceGuidelineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVoiceGuideline extends EditRecord
{
    protected static string $resource = VoiceGuidelineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}