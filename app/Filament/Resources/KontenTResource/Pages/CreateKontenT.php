<?php

namespace App\Filament\Resources\KontenTResource\Pages;

use App\Filament\Resources\KontenTResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateKontenT extends CreateRecord
{
    protected static string $resource = KontenTResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Konten Created')
            ->body('The konten has been created successfully.');
    }

    public function getTitle(): string
    {
        return "Tambah Konten";
    }

}
