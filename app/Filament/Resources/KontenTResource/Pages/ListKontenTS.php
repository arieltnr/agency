<?php

namespace App\Filament\Resources\KontenTResource\Pages;

use App\Filament\Resources\KontenTResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKontenTS extends ListRecords
{
    protected static string $resource = KontenTResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return "Data Konten";
    }
}
