<?php

namespace App\Filament\Resources\VoiceGuidelineResource\Pages;

use App\Filament\Resources\VoiceGuidelineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVoiceGuidelines extends ListRecords
{
    protected static string $resource = VoiceGuidelineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
