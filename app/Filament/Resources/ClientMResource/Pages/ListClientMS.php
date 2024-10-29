<?php

namespace App\Filament\Resources\ClientMResource\Pages;

use App\Filament\Resources\ClientMResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClientMS extends ListRecords
{
    protected static string $resource = ClientMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return "Data Client";
    }
}
