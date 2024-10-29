<?php

namespace App\Filament\Resources\ClientMResource\Pages;

use App\Filament\Resources\ClientMResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClientM extends EditRecord
{
    protected static string $resource = ClientMResource::class;

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
        return "Edit Client";
    }

}
