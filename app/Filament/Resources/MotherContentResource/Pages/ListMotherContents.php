<?php

namespace App\Filament\Resources\MotherContentResource\Pages;

use App\Filament\Resources\MotherContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMotherContents extends ListRecords
{
    protected static string $resource = MotherContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
