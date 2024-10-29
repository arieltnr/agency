<?php

namespace App\Filament\Resources\ClientMResource\Pages;

use App\Filament\Resources\ClientMResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;


class CreateClientM extends CreateRecord
{
    protected static string $resource = ClientMResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Client Registered')
            ->body('The client has been created successfully.');
    }

    public function getTitle(): string
    {
        return "Tambah Client";
    }
    
}
