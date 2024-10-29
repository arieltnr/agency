<?php

namespace App\Filament\Resources\KontenTResource\Pages;

use App\Filament\Resources\KontenTResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKontenT extends EditRecord
{
    protected static string $resource = KontenTResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return "Edit Konten";
    }
}
