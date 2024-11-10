<?php

namespace App\Filament\Resources\VisualGuidelineResource\Pages;

use App\Filament\Resources\VisualGuidelineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVisualGuideline extends EditRecord
{
    protected static string $resource = VisualGuidelineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
