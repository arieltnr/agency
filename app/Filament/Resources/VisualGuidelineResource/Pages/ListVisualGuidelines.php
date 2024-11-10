<?php

namespace App\Filament\Resources\VisualGuidelineResource\Pages;

use App\Filament\Resources\VisualGuidelineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVisualGuidelines extends ListRecords
{
    protected static string $resource = VisualGuidelineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
