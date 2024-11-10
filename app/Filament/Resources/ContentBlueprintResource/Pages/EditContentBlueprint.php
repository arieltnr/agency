<?php

namespace App\Filament\Resources\ContentBlueprintResource\Pages;

use App\Filament\Resources\ContentBlueprintResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContentBlueprint extends EditRecord
{
    protected static string $resource = ContentBlueprintResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
